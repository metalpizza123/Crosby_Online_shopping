<?php
session_start();
if ($_SESSION['adminloggedin']!=13484)
{
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
                <a class="navbar-brand" href="adminsplash2.php">Home</a>
            </div>

            <!-- Collect the nav links, forms, and other content for toggling -->
            <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                <ul class="nav navbar-nav navbar-right">
                    <li class="page-scroll">
                        <a href="enternew2.php">Add Product</a>
                    </li>
                    <li class="page-scroll">
                        <a href="editproduct2.php">Edit Product</a>
                    </li>
                    <li class="page-scroll">
                        <a href="addnewuser2.php">Add User</a>
                    </li>
                    <li class="page-scroll">
                        <a href="edituser2.php">Edit User</a>
                    </li>
                    <li class="page-scroll">
                        <a href="deliverconfirm2.php">Confirm Delivery</a>
                    </li>
                    <li class="page-scroll">
                        <a href="report2.php">Report</a>
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
                    <h2>Confirm Deliveries</h2>
                    <hr class="star-primary">
                </div>


            </div>
            <div class="row">
                <div class="col-lg-8 col-lg-offset-2">
                 

<table class="table table-striped">
    <tr>
        <th > Item name     </th> 
        <th > Quantity      </th>
        <th > User   </th>
        <th > Confirm delivery of order </th>
        </tr>
    <?php
        require("connect.php");
        // set the PDO error mode to exception
        //find the orders not confirmed yet
        // add each row to the table like a drop down list
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $stmt=$conn->prepare("SELECT * FROM Orders WHERE Delivered=0 AND Verified=1");
    $stmt->execute();

    while($data=$stmt->fetch(PDO::FETCH_ASSOC)){
        //find the products that have been ORDERED but not confirmed 
    //loop to spawn the tabele
    //Name, quantity, total price, remove 
        echo("<tr>");
        $stmt1=$conn->prepare("SELECT * FROM products WHERE `ID`=:itemID");
        $stmt1->bindParam(":itemID",$data['ProductID']);
        $stmt1->execute();
        $data1=$stmt1->fetch(PDO::FETCH_ASSOC);
        $stmt2=$conn->prepare("SELECT * FROM Users WHERE `UserID`=:userid");
        $stmt2->bindParam(":userid",$data['UserID']);
        $stmt2->execute();
        $data2=$stmt2->fetch(PDO::FETCH_ASSOC);
        echo "<td>".$data1['Name']."</td>";
        echo "<td>".$data['Quantity']."</td>";
        echo "<td>".$data2['Username']."</td>";
        echo "<td> <form method='post' action='Delivered.php'>";
        echo "<input name='orderidtoconfirm' value='".$data['OrderID']."'type=hidden>";
        echo "<input type='submit' class='btn btn-success btn-lg' name='deliverydone' value='Confirm Delivery'>";
        //Same thing, edit database delivered value
        echo "</form>";
        echo "</td></tr>";
    }
    echo "</table>";
    //Last row needs to  add a sum of all prices
?>
               
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
