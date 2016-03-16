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
                    <!-- <li style="margin-left: 150px">
                        <a href="#">Connexion</a>
                    </li> -->
                </ul>
            </div>
            <!-- /.navbar-collapse -->
        <!-- /.container -->
        </div>
        
        <div id="customerContainer" class="navbar-text navbar-right col-xm-2 col-sm-2 col-md-2" style="">
            
        <?php 

                
        if($connected)
        {   
            echo '<div class="dropdown">
                <button class="btn btn-default dropdown-toggle" type="button" id="customerMenu" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true">
                    <i class="fa fa-user"></i>Prénom N.
                    <span class="caret"></span>
                </button>';

            if($isAdmin)
            {
                /*
                 * gestion des produits : liste/ajout/suppression des produits des différentes catégories
                 * gestion des utilisateurs : liste/modification/suppression des utilisateurs
                 */

                echo '<ul class="dropdown-menu">
                    <li><a href="#">Gestion des produits</a></li>
                    <li><a href="#">Gestion des utilisateurs</a></li>
                    <div class="divider"></div>
                    <li><a href="index.php?page=page_deco">Se déconnecter</a></li>
                </ul>
                </div>
                </div>';
            }
            else
            {
                echo '<ul class="dropdown-menu">
                    <li><a href="#">Mon compte</a></li>
                    <li><a href="#">Mes commandes <span id="currentCommand"></span></a></li>
                    <li><a href="#">Mon panier</li>
                    <div class="divider"></div>
                    <li><a href="index.php?page=page_deco">Se déconnecter</a></li>
                </ul>
                </div>
                </div>';
            }                    
        }
        else
        {
            echo '
            <div id="connexionButtonDiv" class="nav navbar-right col-xm-2 col-sm-2 col-md-2">
                <button id="connexionButton" class="btn btn-default"><a href="index.php?page=page_co">Connexion</a></button>
            </div>
            </div>';
        }

        ?>
        
    </nav>