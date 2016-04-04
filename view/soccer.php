<?php
    require_once('./controller/sportController.php');
    require_once('./connection.php');
    require_once('./model/produit.php');
    require_once('clientProducts.php');

$connected = isset($_SESSION['id']) ? true : false;
$status= $connected ? 'data-status="connected"' :  'data-status="disconnected"'  ;

?>

<div class="status col-md-12" <?php echo $status ?>>
                    <div class="row carousel-holder">
                        <div class="col-md-12">
                            <div id="carousel-example-generic" class="carousel slide" data-ride="carousel">
                                <ol class="carousel-indicators">
                                    <li data-target="#carousel-example-generic" data-slide-to="0" class="active"></li>
                                    <li data-target="#carousel-example-generic" data-slide-to="1"></li>
                                    <li data-target="#carousel-example-generic" data-slide-to="2"></li>
                                </ol>
                                <div class="carousel-inner">
                                    <div class="item active">
                                        <img class="slide-image" src="http://placehold.it/800x300" alt="">
                                    </div>
                                    <div class="item">
                                        <img class="slide-image" src="http://placehold.it/800x300" alt="">
                                    </div>
                                    <div class="item">
                                        <img class="slide-image" src="http://placehold.it/800x300" alt="">
                                    </div>
                                </div>
                                <a class="left carousel-control" href="#carousel-example-generic" data-slide="prev">
                                    <span class="glyphicon glyphicon-chevron-left"></span>
                                </a>
                                <a class="right carousel-control" href="#carousel-example-generic" data-slide="next">
                                    <span class="glyphicon glyphicon-chevron-right"></span>
                                </a>
                            </div>
                        </div>
                    </div>

                    <div class="row">

<!-- Products are displayed in this area -->

                    <?php
                        //displayCarousel();
                        $footballArray = getSportProducts($db, 'Football');
                        displayProductList($db, $footballArray);
                    ?>

<!-- End of product's display -->
                    </div>
                </div>
