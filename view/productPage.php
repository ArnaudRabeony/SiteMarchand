<?php

require_once(dirname(__FILE__) . '/../connection.php');
require_once(dirname(__FILE__) . '/../model/categorie_produit.php');

$connected = isset($_SESSION['id']) ? true : false;

$productData = getProductById($db, $_GET['ref']);

$imagePath=strpos($productData[0]['photo'], "images/") !== false ? $productData[0]['photo']: "images/".$productData[0]['photo'];


$ref="REF".$productData[0]['idProduit'];
$label=$productData[0]['libelle'];
$category=getCategorieById($db,$productData[0]['idCategorie']);
$sport=getSportById($db,$productData[0]['idSport']);
$price=$productData[0]['prix'];
$description=$productData[0]['description'];

$status= $connected ? 'data-status="connected"' :  'data-status="disconnected"'  ;
// the product doesn't exist

// $sizes=getSizeByCategories($db,$productData[0]['idCategorie']);

?>
<div id="displayProduct" class="shadow450 row" <?php echo $status ?>>
	<div id="displayProductContainer" <?php echo 'data-productid="'.$productData[0]['idProduit'].'"' ?>>
	<div id="productHeadingDiv">
		<h1><small><?php echo $label ?></small><i id="closeIcon" class="material-icons" style="float: right;color:#ddd;">clear</i></h1>
	</div>
		<div id="imageContainer" class="col-md-6 col-xs-6">
			<img id="productImage" <?php echo "data-zoom-image='".$imagePath."' src=".$imagePath ?> alt="preview" /><br>
		</div>
		<div id="descriptionContainer" <?php echo "data-category='".$productData[0]['idCategorie']."'" ?>class="col-md-5 col-sm-5">
		<h4 style="margin-bottom: -10px;"><small id="categoryNsport"><?php echo $category." de ".$sport ?> <br></small></h4 style="margin-bottom: -10px;">
		<h5><small><i>Référence : <?php echo $ref ?></i></small></h5>
			<ul class="nav nav-tabs">
			  <li class="active"><a data-toggle="tab" href="#mainProductTab">Info</a></li>
			  <li><a data-toggle="tab" href="#descriptionTab">Description</a></li>
			</ul>
			
			<div class="tab-content">
			  <div id="mainProductTab" class="tab-pane fade in active">
			   <h3><small>Info</small></h3>
			    <p>
					<span id="priceSpan"><b><?php echo $price."€" ?></b></span>
					<hr>
					<div id="ordering">

					<select name="sizeSelector" class="form-control col-md-2" id="sizeSelector">
					<?php 

						$sizes=getStockByProductId($db,$productData[0]['idProduit']);

		    			echo '<option value="notSelected">Taille</option>';
						foreach ($sizes as $key => $value)
		    				echo '<option value="'.$key.'">'.$key.'</option>';
					 ?>
					</select>
						<select name="quantitySelector" id="quantitySelector" class="col-md-1 form-control"><option value="-1">Quantité</option></select>
						<button id="addToBasket" class="btn btn-default btn-sm btn-primary" data-toggle="modal" style="float: right;">Ajouter au panier</button>
					</div>
			    </p>
			  </div>
			  <div id="descriptionTab" class="tab-pane fade">
			    <h3><small>Description</small></h3>
			    <p><?php echo $description ?></p>
			  </div>
			</div>
		</div>
	</div>
</div>


<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="myModalLabel">Ajouter au panier</h4>
      </div>
      <div id="modalBody" class="modal-body">
       	Vous venez d'ajouter un article à votre panier. <br>Souhaitez vous voir votre panier ou bien continuer vos achats ?
      </div>
      <div id="modalButtons" class="modal-footer">
      </div>
    </div>
  </div>
</div>

<script src="js/jquery.js"></script>
<script src="js/productPage.js"></script>
