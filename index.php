<?php 

    session_start();

    //Info site
    $title = 'Site marchand';
    require_once("connexion.php");
    include('fonctions.php');
    protectPostGet();

    $containedPage = isset($_GET['page']) && trim($_GET['page'])!="" && isExisting($_GET['page']) ? $_GET['page'] : "welcome";
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
    <?php include('menu.php'); ?>
    <div id="categories" class="col-md-2">
        <p class="lead">Shop Name</p>
            <div class="panel-group" id="collectives">
              <div class="panel panel-default">
                <div class="panel-heading">
                  <h4 class="panel-title">
                    <a data-toggle="collapse" href="#collapseCollectives">Sports collectifs</a>
                  </h4>
                </div>
                <div id="collapseCollectives" class="panel-collapse collapse">
                  <ul class="list-group">
                    <li class="list-group-item"><a href="index.php?page=football"style="padding: 0px 0px">Football</a></li>
                    <li class="list-group-item"><a href="#">Basketball</a></li>
                  </ul>
                </div>
              </div>
            </div>
            <div class="panel-group" id="individuals">
              <div class="panel panel-default">
                <div class="panel-heading">
                  <h4 class="panel-title">
                    <a data-toggle="collapse" href="#collapseIndividuals">Sports individuels</a>
                  </h4>
                </div>
                <div id="collapseIndividuals" class="panel-collapse collapse">
                  <ul class="list-group">
                    <li class="list-group-item"><a href="#">Judo</a></li>
                    <li class="list-group-item"><a href="#">Boxe</a></li>
                  </ul>
                </div>
              </div>
            </div>
    </div>   
    <!-- Page Content -->
    <div class="container">
            <div id="containedPage" class="col-md-9">
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
    
    <!-- Custom JS -->
    <script src="js/global.js"></script>
</body>

</html>
