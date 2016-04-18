<?php
    ob_start();
    session_start();
    //Info site
    $title = 'Site marchand';

    require_once("connection.php");
    include('model/functions.php');
    include('model/client.php');
    // include('model/marque.php');
    // include('model/taille.php');
    // include('model/categorie_produit.php');
    // include('model/sport.php');
    include('model/produit.php');
    protectPostGet();

    // $containedPage = isset($_GET['page']) && trim($_GET['page'])!="" && isExisting($_GET['page']) ? $_GET['page'] : "welcome";
    $containedPage = isset($_GET['page']) && trim($_GET['page'])!="" ? $_GET['page'] : "view/welcome";
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
    <link href="css/global.css" rel="stylesheet">

    <!-- Font Awesome -->
    <link href="//maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css" rel="stylesheet">

    <!-- Material Icons -->
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons"
      rel="stylesheet">
    <!-- Malihu Scrollbar -->
    <link rel="stylesheet" href="css/jquery.mCustomScrollbar.css" />

</head>

<body>
    <?php include('view/menu.php'); ?>
    <!-- Page Content -->
    <div class="container">
            <div id="containedPage" class="col-md-9">
                <?php include($containedPage.'.php');
                ob_end_flush() ?>
                    <i id="top" class="fa fa-3x fa-arrow-circle-up" style="color:#888 ;display : none;bottom:20px;right:20px;height:2cm;width:2cm;position:fixed;cursor:pointer"></i>
            </div>

        </div>
    <!-- /.container -->

    <div class="container">

        <!-- Footer -->
        <!-- <footer>
            <div class="row">
                <div class="col-lg-12">
                    <p>Copyright &copy; Site Marchand MIAGE 2016</p>
                </div>
            </div>
        </footer> -->

    </div>
    <!-- /.container -->

    <!-- jQuery -->
    <script src="js/jquery.js"></script>

    <!-- Bootstrap Core JavaScript -->
    <script src="js/bootstrap.min.js"></script>

    <!-- Custom JS -->
    <script src="js/global.js"></script>

    <!-- Malihu ScrollBar -->
    <script src="js/jquery.mCustomScrollbar.concat.min.js"></script>

     <!-- ElevateZoom -->
    <script src="js/jquery.elevatezoom.js"></script>
</body>

</html>
