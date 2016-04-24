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

                        $psgJersey = getProductByLabel($db,"Maillot home PSG")[0];
                        $mercurial = getProductByLabel($db,"Mercurial")[0];

                        $images = array($mercurial["idProduit"]=>"images/Carousel/mercurialBanner.jpg",$psgJersey["idProduit"]=>"images/Carousel/psg.jpg");

                        displayCarousel($db,$images);
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
