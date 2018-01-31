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
    <!-- Portfolio Grid Section -->
    <br>
    <section id="portfolio">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 text-center">
                <br>
                    <?php
                    echo '<h2>'."Welcome, ".$_SESSION['username'].'</h2>';
                    ?>
                    <hr class="star-primary">
                </div>
            </div>
            <div>
                <div class="col-sm-4 portfolio-item">
                    <a href="buypage2.php" class="portfolio-link" >
                             <img src="img/portfolio/CatalogIcon.png" class="img-responsive" alt="">
                             <p class='skills'> Catalog </p>
                        </a>
                </div>
                <div class="col-sm-4 portfolio-item">
                    <a href="checkout2.php" class="portfolio-link" >
                             <img src="img/portfolio/ShoppingBasketIcon.png" class="img-responsive" alt="">
                             <p class='skills'> Basket </p>
                        </a>
                </div>
                <div class="col-sm-4 portfolio-item">
                    <a href="pending2.php" class="portfolio-link" >
                             <img src="img/portfolio/TruckIcon.png" class="img-responsive" alt="">
                             <p class='skills'> Pending Orders </p>
                        </a>
                </div>
                <div class="col-sm-4 portfolio-item">
                    <a href="history2.php" class="portfolio-link" >
                             <img src="img/portfolio/HistoryIcon.png" class="img-responsive" alt="">
                             <p class='skills'> Order History </p>
                        </a>
                </div>
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
