<?php 

    session_start();

    //Info site
    $title = 'Site marchand';
    require_once("connexion.php");
    include('fonctions.php');
    protectPostGet();

    $containedPage = isset($_GET['page']) && trim($_GET['page'])!="" ? $_GET['page'] : "page_co";
?>

<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title><?php echo $title ?></title>

    <!-- Bootstrap Core CSS -->
    <link href="css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom CSS -->
    <link href="css/shop-homepage.css" rel="stylesheet">

    <!-- Font Awesome -->
    <link href="//maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css" rel="stylesheet">

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
        <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->

</head>

<body>

    <!-- Navigation -->
    <nav class="navbar navbar-inverse navbar-fixed-top" role="navigation">
        <div class="container">
            <!-- Brand and toggle get grouped for better mobile display -->
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" href="#">Site Marchand</a>
            </div>
            <!-- Collect the nav links, forms, and other content for toggling -->
            <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                <ul class="nav navbar-nav">
                    <li>
                        <a href="#">About</a>
                    </li>
                    <li>
                        <a href="#">Services</a>
                    </li>
                    <li>
                        <a href="#">Contact</a>
                    </li>
                </ul>
            </div>
            <!-- /.navbar-collapse -->
        <!-- /.container -->
        </div>
        <div id="customerContainer" class="navbar-text navbar-right col-xm-2 col-sm-2 col-md-2" style="position:relative;bottom: 50px;margin-bottom: -45px;height:30px;">
            <div class="dropdown">
                <a href="#" style="float:right;margin-right: 20px"class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false"><i class="fa fa-user" style="color:#969696"></i></a>
                <ul class="dropdown-menu" style="margin-top:20px;">
                    <li><a href="#">Mon compte</a></li>
                    <li><a href="#">Mes commandes <span id="currentCommand"></span></a></li>
                    <li><a href="#">Mon panier</li>
                    <li role="separator" class="divider"></li>
                    <li><a href="index.php?page=page_co">Se déconnecter</a></li>
                </ul>
            </div>
        </div>
    </nav>
    
    <div id="categories" class="col-md-2" style="position:fixed;margin-left:90px;">
        <p class="lead">Shop Name</p>
        <div class="list-group">
            <a href="index.php?page=football" class="list-group-item">Football</a>
            <a href="#" class="list-group-item">Category 2</a>
            <a href="#" class="list-group-item">Category 3</a>
        </div>
    </div>   
    <!-- Page Content -->
    <div class="container">
            <div id="containedPage" class="col-md-9" style="background-color:red;float:right">
                <?php include($containedPage.'.php'); ?>
            </div>

        </div>
    <!-- /.container -->

    <div class="container">

        <hr>

        <!-- Footer -->
        <footer>
            <div class="row">
                <div class="col-lg-12">
                    <p>Copyright &copy; Site Marchand MIAGE 2016</p>
                </div>
            </div>
        </footer>

    </div>
    <!-- /.container -->

    <!-- jQuery -->
    <script src="js/jquery.js"></script>

    <!-- Bootstrap Core JavaScript -->
    <script src="js/bootstrap.min.js"></script>

</body>

</html>
