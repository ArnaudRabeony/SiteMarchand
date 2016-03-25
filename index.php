<?php 
    ob_start();
    session_start();
    //Info site
    $title = 'Site marchand';
    
    require_once("model/connection.php");
    include('model/functions.php');
    include('model/sql_functions.php');
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

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
        <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->

</head>

<body>
    <?php include('view/menu.php'); ?> 
    <!-- Page Content -->
    <div class="container">
            <div id="containedPage" class="col-md-9">
                <?php include($containedPage.'.php');   
                ob_end_flush() ?> 
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
    
    <!-- Custom JS -->
    <script src="js/global.js"></script>
</body>

</html>
