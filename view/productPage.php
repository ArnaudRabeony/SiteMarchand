<?php

require_once('./connection.php');
require_once('./model/categorie_produit.php');

$productData = getProductById($db, $_GET['ref']);
$imagePath="images/".$productData[0]['photo'];
$ref="REF".$productData[0]['idProduit'];
$label=$productData[0]['libelle'];
$category=getCategorieById($db,$productData[0]['idCategorie']);
$sport=getSportById($db,$productData[0]['idSport']);
$price=$productData[0]['prix'];
$description=$productData[0]['description'];
// the product doesn't exist

// $sizes=getSizeByCategories($db,$productData[0]['idCategorie']);

?>
<div id="displayProduct" class="row">
	<div id="displayProductContainer" class="col-md-12">
		<h1><small><?php echo $label ?></small></h1>
		<div id="imageContainer" class="col-md-6 col-sm-6">
			<img id="productImage" class="img-responsive" <?php echo "src=".$imagePath ?> alt="preview" /><br>
		</div>
		<div id="descriptionContainer" <?php echo "data-category='".$productData[0]['idCategorie']."'" ?>class="col-md-5 col-sm-5">
		<h4 style="margin-bottom: -10px;"><small><?php echo $category." de ".$sport ?> <br></small></h4 style="margin-bottom: -10px;">
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
						<select name="sizeSelector" id="sizeSelector" class="col-md-1 form-control"><option value="-1">Taille</option></select>	
						<select name="quantitySelector" id="quantitySelector" class="col-md-1 form-control"><option value="-1">Quantité</option></select>
						<button class="btn btn-default btn-sm btn-primary" style="float: right;">Ajouter au panier</button>
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

<script src="js/jquery.js"></script>
<script src="js/productPage.js"></script>
