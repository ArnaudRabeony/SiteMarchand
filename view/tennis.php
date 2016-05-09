<?php
    // require_once('./controller/sportController.php');
    // require_once('./connection.php');
    // require_once('./model/functions.php');
    require_once('clientProducts.php');
    
    require_once(dirname(__FILE__) . '/../controller/sportController.php');
    require_once(dirname(__FILE__) . '/../model/functions.php');
    require_once(dirname(__FILE__) . '/../connection.php');


$connected = isset($_SESSION['id']) ? true : false;
$status= $connected ? 'data-status="connected"' :  'data-status="disconnected"';

                        $rf = getProductByLabel($db,"Nike Team Court Polo")[0];
                        $images = array($rf["idProduit"]=>"images/Carousel/rf1.jpg");

                        displayCarousel($db,$images);
                        //displayCarousel();
                        $basketballArray = getSportProducts($db, 'Tennis');
                        displayProductList($db, $basketballArray);
                    ?>

<!-- End of product's display -->
    </div>
</div>