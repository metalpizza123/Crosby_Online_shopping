<?php
session_start();
if (empty($_SESSION['username']) or empty($_SESSION['walletvalue']) or empty($_SESSION['userid'])){
 header("Location: login2.php");
}
?>
<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Crosby Online Webshop</title>

    <!-- Bootstrap Core CSS -->
    <link href="vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">

    <!-- Theme CSS -->
    <link href="css/freelancer.min.css" rel="stylesheet">

    <!-- Custom Fonts -->
    <link href="vendor/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/css?family=Montserrat:400,700" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/css?family=Lato:400,700,400italic,700italic" rel="stylesheet" type="text/css">

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
        <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->

</head>

<body id="page-top" class="index">

    <!-- Navigation -->
    <nav id="mainNav" class="navbar navbar-default navbar-fixed-top navbar-custom">
        <div class="container">
            <!-- Brand and toggle get grouped for better mobile display -->
            <div class="navbar-header page-scroll">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
                    <span class="sr-only">Toggle navigation</span> Menu <i class="fa fa-bars"></i>
                </button>
                <a class="navbar-brand" href="usersplash2.php">Home</a>
            </div>

            <!-- Collect the nav links, forms, and other content for toggling -->
            <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                <ul class="nav navbar-nav navbar-right">
                    <li class="hidden">
                        <a href="usersplash2.php"></a>
                    </li>
                    <li class="page-scroll">
                        <a href="buypage2.php">Catalog</a>
                    </li>
                    <li class="page-scroll">
                        <a href="checkout2.php">Basket</a>
                    </li>
                    <li class="page-scroll">
                        <a href="pending2.php">Pending Orders</a>
                    </li>
                    <li class="page-scroll">
                        <a href="history2.php">Order History</a>
                    </li>
                    <li class="page-scroll">
                        <a href="login2.php">Log Out</a>
                    </li>

                </ul>
            </div>
            <!-- /.navbar-collapse -->
        </div>
        <!-- /.container-fluid -->
    </nav>

    

    <!-- Contact Section -->
    <br>
    <section id="contact">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 text-center">
                                <br>

                    <h2>Catalog</h2>
                    <hr class="star-primary">
                </div>
            </div>
            <div class="row">
                <div class="col-lg-8 col-lg-offset-2">

<?php
echo '<p class="name">'.'You currently have £'.($_SESSION['walletvalue']).' in your wallet.'.'</p>';
?>
    <form method="post" action="<?php echo "#" ?>">
    <p>Please Select a Product</p>
    <select class="form-control" name="formproduct" id="formproduct">
    <?php
try {   require("connect.php");
    // set the PDO error mode to exception
     $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
     $stmt = $conn->prepare("SELECT Name FROM products"); 
     $stmt->execute();
     // set the resulting array to associative
     //$result = $stmt->setFetchMode(PDO::FETCH_ASSOC); 
      $data=$stmt->fetchAll(PDO::FETCH_ASSOC);
    //this is where the table is actually produced
    //echo( '<option value="'.$data['Name'].'">'.$data['Name']."</option>");
      foreach ($data as $key => $value) {
         if($_POST['formproduct']==$value['Name']){
            echo( '<option selected value="'.$value['Name'].'">'.$value['Name']."</option>");
         } 
         else {
            echo( '<option value="'.$value['Name'].'">'.$value['Name']."</option>");
         }     
     }

 }
       catch(PDOException $e) {
     echo "Error: " . $e->getMessage();
}
        ?>  
    </select>
    
   <br>
   <input class="btn btn-success btn-lg" type="submit" name="refreshtable" value="check item">
</form>
  <?php
  if (isset($_POST['eatingtable'])){
    $stmt7=$conn->prepare("SELECT * FROM `products` WHERE `Name`=:item");
       $stmt7->bindParam(":item",$_POST['formproduct']);
       $stmt7->execute();
       $data7=$stmt7->fetch(PDO::FETCH_ASSOC);
      $canibuy=$data7['Stock']-$_POST['quantity'];
      //deduct amount ordered from stock available
      //echo($canibuy);
      if ($canibuy<0){
       echo('<p class="skills">'. "not enough stock".'</p>');
                }
      else {
        echo  ( '<p class="skills">'. 'Your Order of '.($_POST['quantity']).' x '.($_POST['formproduct'].' has been placed.'.'</p>'));
        // need to add in the order.
        //I'll fetch EVERYTHING first
        //Bind everything to variables for the database entry
        //echo ($data7['ID']);
        //echo ($data7['Price']);
        $ProductID=$data7['ID'];
        $Productprice=$data7['Price']*$_POST['quantity'];
        $Newstock=$data7['Stock']-$_POST['quantity'];
        $Orderstock=$_POST['quantity'];
        $User=$_SESSION['userid'];
        $tim=time();
        //echo ("$Productprice");
        $stmt5=$conn->prepare("INSERT INTO `Orders` (OrderID,ProductID,Quantity,Price,OrderDate,UserID,Verified,Delivered) VALUES (Null,'$ProductID','$Orderstock','$Productprice','$tim','$User',0,0) ");
        $stmt5->execute();
        $stmt6=$conn->prepare("UPDATE products SET Stock='$canibuy' WHERE ID='$ProductID'");
        $stmt6->execute();
        }
      }
  if (isset($_POST['refreshtable']) and !isset($_POST['eatingtable'])){
    //so this stuff pops out when you've pressed the first button to check the product
       $stmt2=$conn->prepare("SELECT * FROM `products` WHERE `Name`=:item");
       $stmt2->bindParam(":item",$_POST['formproduct']);
         $stmt2->execute();
         $data2=$stmt2->fetch(PDO::FETCH_ASSOC);
                 $formattedprice=number_format((float)$data2['Price'],2, '.', '');

    echo ('<p class="skills">'. "There are currently " .$data2['Stock']."x ".$_POST['formproduct']." left in stock.".'<br>');
    echo ("One ".$_POST['formproduct']." costs £".$formattedprice." each.".'</p>');
          // now let them select how many they want 
             if ($data2['Stock']<1){ 
        // don't spawn the table 
        echo ('<p class="skills">'."There isn't enough stock for you to order".'</p>');
       }
       //all this stuff is for quantity, so i chose to do the whole thing in html
       else {

        echo('<form method="post" action="#">
        <input name="formproduct" value="' . $_POST['formproduct'] . '" type=hidden />
        <select name="quantity"  class="form-control" id="quantity">
        <option value="1"> 1 </option>
        <option value="2"> 2 </option>
        <option value="3"> 3 </option>
        <option value="4"> 4 </option>
        <option value="5"> 5 </option>
        <option value="6"> 6 </option>
        <option value="7"> 7 </option>
        <option value="8"> 8 </option>
        <option value="9"> 9</option>
        <option value="10"> 10 </option>
        <option value="15"> 15 </option>
        <option value="20"> 20 </option>
        <option value="25"> 25 </option>
        </select>
        <br>
        <input  class="btn btn-success btn-lg" type="submit" name="eatingtable" value="Add item to basket">
        </form>
              ') ;
      }
    
  }
?>

                <br>
            <!-- ADD A BUTTON TO CHECK OUT AND DEDUCT FROM THEIR WALLET AND CHANGE CONFIRM VALUES -->
               
            </div>
        </div>
    </section>


    <!-- jQuery -->
    <script src="vendor/jquery/jquery.min.js"></script>

    <!-- Bootstrap Core JavaScript -->
    <script src="vendor/bootstrap/js/bootstrap.min.js"></script>

    <!-- Plugin JavaScript -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-easing/1.3/jquery.easing.min.js"></script>

    <!-- Contact Form JavaScript -->
    <script src="js/jqBootstrapValidation.js"></script>
    <script src="js/contact_me.js"></script>

    <!-- Theme JavaScript -->
    <script src="js/freelancer.min.js"></script>

</body>

</html>
