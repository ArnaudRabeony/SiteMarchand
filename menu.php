<?php 


$connected = isset($_SESSION['id']) ? true : false;
$isAdmin = isset($_SESSION['type']) && $_SESSION['type']=="admin" ? true : false;
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
            echo '<li class="dropdown-toggle" data-toggle="dropdown"><a><span class="glyphicon glyphicon-user"></span>';

            if($isAdmin)
            {
                /*
                 * gestion des produits : liste/ajout/suppression des produits des différentes catégories
                 * gestion des utilisateurs : liste/modification/suppression des utilisateurs
                 */

                echo 'Prénom N. (Admin) <span class="caret"></span></a></li>
                <ul class="dropdown-menu">
                    <li><a href="#">Gestion des produits</a></li>
                    <li><a href="#">Gestion des utilisateurs</a></li>
                    <li><a href="index.php?page=deco_page"><span class="glyphicon glyphicon-log-out"></span> Déconnexion</a></li>
                </ul>
                </div>
                </div>
                </li>';
            }
            else
            {
                echo 'Prénom N. <span class="caret"></span></a></li>
                <ul class="dropdown-menu">
                    <li><a href="#">Mon compte</a></li>
                    <li><a href="#">Mes commandes <span id="currentCommand"></span></a></li>
                    <li><a href="#">Mon panier</li>
                    <li><a href="index.php?page=deco_page"><span class="glyphicon glyphicon-log-out"></span> Déconnexion</a></li>
                </ul>
                </div>
                </div>
                </li>';
            }                    
        }
        else
        {
            echo '
              <li><a href="index.php?page=co_page"><span class="glyphicon glyphicon-user"></span> Connexion</a></li>';
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
                    <li class="list-group-item"><a href="index.php?page=soccer"style="padding: 0px 0px">Football</a></li>
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