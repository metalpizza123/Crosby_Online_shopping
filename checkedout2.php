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
            </div>

            <!-- Collect the nav links, forms, and other content for toggling -->
            <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">

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
                    <h2>Checkout</h2>
                    <hr class="star-primary">
                </div>
            </div>
            <div class="row">
                <div class="col-lg-8 col-lg-offset-2">
                     <?php
      //print_r ($_POST);
      if ($_POST['checkoutprice']>$_SESSION['walletvalue']){
          echo "<p class='skills'>"."You don't have enough funds in your wallet"."</p>";
          echo "<form method='post' action='checkout2.php'>";
          echo "<input type='submit' class='btn btn-success btn-lg' name='gocheckoutpage' value='Back to checkout page'>";
          echo "</form>";
      }
      else { 
            require("connect.php");
            // set the PDO error mode to exception
            $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            $tim=time();
            $stmt=$conn->prepare("UPDATE Orders SET Verified=1, OrderDate=:tim WHERE UserID=:currentuser AND Verified=0");
            $stmt->bindParam(":tim", $tim);
            $stmt->bindParam(":currentuser", $_SESSION['userid']);
            $stmt->execute();
            $newwalletvalue=$_SESSION['walletvalue']-$_POST['checkoutprice'];
            //echo $newwalletvalue;
            $stmt1=$conn->prepare("UPDATE Users SET Wallet=:newvalue WHERE Username=:currentuser "); 
            $stmt1->bindParam(":newvalue",$newwalletvalue);
            $stmt1->bindParam(":currentuser",$_SESSION['username']);
            $stmt1->execute();
            $_SESSION['walletvalue']=$newwalletvalue;
            //print_r($stmt->errorInfo());
            echo "<p class='skills'>Order successfully completed</p>";
            //echo $_POST['checkoutprice'];
             echo 
                "<form method='post' action='usersplash2.php'> 
                <input class='btn btn-success btn-lg' type='submit' name='confirmorder' value='Back to homepage'>
                </form>";
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
