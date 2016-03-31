<?php 
// echo "session :";
// print_r($_SESSION);
$connected = isset($_SESSION['id']) ? true : false;
$isAdmin = isset($_SESSION['type']) && $_SESSION['type']=="admin" ? true : false;

if($connected)
    $basketItemsNumber=$_SESSION['basketItemsNumber'];
// $connected=true;
// $isAdmin=true;
 ?>

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
                <a class="navbar-brand" href="index.php">Site Marchand</a>
            </div>
            <!-- Collect the nav links, forms, and other content for toggling -->
            <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                <ul class="nav navbar-nav">
                    <li>
                        <a href="#">Nouveautés</a>
                    </li>
                    <li>
                        <a href="#">Meilleures ventes</a>
                    </li>
                    <li>
                        <a href="#">Promotions</a>
                    </li>
                </ul>
                <ul class="nav navbar-nav navbar-right">
        <?php 

                
        if($connected)
        {   
            echo '<li id="basketNotification"><a href="index.php?page=view/myBasket"><i class="fa fa-shopping-cart"></i><span id="basketSize" style="position:relative;font-size: 10px;top:8px;color:red"><b>'.$basketItemsNumber.'</b></span></a></li>
            <li class="dropdown-toggle" data-toggle="dropdown"><a><span class="glyphicon glyphicon-user"> </span>';

            if($isAdmin)
            {
                /*
                 * gestion des produits : liste/ajout/suppression des produits des différentes catégories
                 * gestion des utilisateurs : liste/modification/suppression des utilisateurs
                 */

                echo ' '.$_SESSION['firstname'].' '.$_SESSION['lastname']{0}.'. (Admin) <span class="caret"></span></a><i id="shoppingCart" style="display:none" class="fa fa-shopping-cart" color:white;></i></li>
                <ul class="dropdown-menu">
                    <li><a href="index.php?page=view/myAccount">Mon compte</a></li>
                    <li><a href="index.php?page=view/myOrders">Mes commandes <span id="currentCommand"></span></a></li>
                    <li><a href="index.php?page=view/myBasket">Mon panier</a></li>
                    <li><a href="index.php?page=view/manageProducts">Gestion des produits</a></li>
                    <li><a href="index.php?page=view/displayCustomers">Gestion des utilisateurs</a></li><hr>
                    <li><a href="index.php?page=controller/deco_page"><span class="glyphicon glyphicon-log-out"></span> Déconnexion</a></li>
                </ul>
                </div>
                </div>
                </li>';
            }
            else
            {
                echo ' '.$_SESSION['firstname'].' '.$_SESSION['lastname']{0}.'. <span class="caret"></span></a><i id="shoppingCart" style="display:none" class="fa fa-shopping-cart" color:white;></i></li>
                <ul class="dropdown-menu">
                    <li><a href="index.php?page=view/myAccount">Mon compte</a></li>
                    <li><a href="index.php?page=view/myOrders">Mes commandes <span id="currentCommand"></span></a></li>
                    <li><a href="index.php?page=view/myBasket">Mon panier</a></li><hr>
                    <li><a href="index.php?page=controller/deco_page"><span class="glyphicon glyphicon-log-out"></span> Déconnexion</a></li>
                </ul>
                </div>
                </div>
                </li>';
            }                    
        }
        else
        {
            echo '
              <li><a href="index.php?page=view/co_page"><span class="glyphicon glyphicon-user"></span> Connexion</a></li>';
        }

        ?>
                </ul>
            </div>
            <!-- /.navbar-collapse -->
        <!-- /.container -->
        </div>
    </nav>

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
                    <li class="list-group-item"><a href="index.php?page=view/soccer"style="padding: 0px 0px">Football</a></li>
                    <li class="list-group-item"><a href="index.php?page=view/basketball">Basketball</a></li>
                    <li class="list-group-item"><a href="index.php?page=view/rugby">Rugby</a></li>
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
                    <li class="list-group-item"><a href="#">Tennis</a></li>
                    <li class="list-group-item"><a href="#">Natation</a></li>
                  </ul>
                </div>
              </div>
            </div>
    </div>  


<script src="js/global.js"></script>