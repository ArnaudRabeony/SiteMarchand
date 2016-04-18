<?php

require_once('clientProducts.php');
require_once(dirname(__FILE__) . '/../connection.php');
require_once(dirname(__FILE__) . '/../model/produit.php');
require_once(dirname(__FILE__) . '/../model/taille.php');
require_once(dirname(__FILE__) . '/../controller/sportController.php');

$connected = isset($_SESSION['id']) ? true : false;
$status= $connected ? 'data-status="connected"' :  'data-status="disconnected"'  ;
?>
                <div id="productsContainer">
                    </div class="status" <?php echo $status ?>>
<!-- Products are displayed in this area -->

                    <?php
                     $images = array("Football"=>"images/Carousel/nikeFootball.jpg","Adidas"=>"images/Carousel/adidas.jpg","Nike"=>"images/Carousel/nike.png","Basketball"=>"images/Carousel/basket.jpg");

                        displayCarousel($images);
                        echo '<div class="row" id="filtersContainer">';
                        filters('taille', getAllTaille($db));
                        filters('sport', getAllSports($db));
                        filters('categorie', getAllCategories($db));
                        echo '</div>';
                        $footballArray = getSportProducts($db, 'Football');
                        displayProductList($db, $footballArray);
                    ?>

<!-- End of product's display -->
                    </div>
                </div>
