<?php 

require_once(dirname(__FILE__) . '/../connection.php');
require_once(dirname(__FILE__) . '/../model/functions.php');
require_once(dirname(__FILE__) . '/../model/taille.php');
require_once(dirname(__FILE__) . '/../model/stock.php');

if(pageRestriction(array("admin")))
{

$price="";
$libelle="";
$price="";
$brandId="";
$categoryId="";
$sportId="";
$description="";
$photo="#";
$creation=true;

    if(verifGet(array('id')))
    {
    	$product=getProductById($db,$_GET['id']);

    	//can't get multiple words value : separate words with a special char then split them again
    	$libelle="";//str_replace(" ", ".", $product[0]['libelle']);
    	$libellePieces=explode(" ", $product[0]['libelle']);

    	foreach ($libellePieces as $value)
    		$libelle.=" ".$value;

    	// print_r($libelle);

    	$price=$product[0]['prix'];
    	$brandId=$product[0]['idMarque'];
    	$categoryId=$product[0]['idCategorie'];
    	$sportId=$product[0]['idSport'];
    	$description=$product[0]['description'];
    	$photo=strpos($product[0]['photo'], "images/") !== false ? $product[0]['photo']: "images/".$product[0]['photo'];

    	$shoeSizes= $categoryId==5 ? true : false;
    	$creation=false;
    	$idProduit=$_GET['id'];
    	$displayStock = !count(getStockByProductId($db,$idProduit)) ? "style='display:none'" : ""; 
    }


   	$displaySizesManager = $creation ? "style='display:none'" : ""; 
   	$disableField = !$creation ? " disabled " : ""; 
   	$dataId = !$creation ? "data-productid=".$idProduit : ""; 

	$categorySelection='<select class="form-control" name="category" id="selectCategory"'.$disableField.'><option value="-1">Choisir une catégorie</option>';
	$categories=getAllCategories($db);

	$categoryCptr=1;
	foreach ($categories as $key => $value)
		if($value['idCategorie'] == $categoryId)
			$categorySelection.='<option value="'.$value['idCategorie'].'" selected>'.$value['nomCategorie'].'</option>';
		else
			$categorySelection.='<option value="'.$value['idCategorie'].'">'.$value['nomCategorie'].'</option>';
	
	$categorySelection.='</select>';


	$sportSelection='<select class="form-control" name="sport" id="selectSport"'.$disableField.'><option value="-1">Choisir un sport</option>';
	$sports=getAllSports($db);

	$sportCptr=1;
	foreach ($sports as $key => $value)
		if($sportCptr == $sportId)
			$sportSelection.='<option value="'.$sportCptr++.'" selected>'.$value['nomSport'].'</option>';
		else
			$sportSelection.='<option value="'.$sportCptr++.'">'.$value['nomSport'].'</option>';
	
	$sportSelection.='</select>';


	$brandSelection='<select class="form-control" name="brand" id="selectBrand"'.$disableField.'><option value="-1">Choisir une marque</option>';
	$brands=getAllBrandsName($db);

	$brandCptr=1;
	foreach ($brands as $key => $value)
		if($brandCptr == $brandId)
			$brandSelection.='<option value="'.$brandCptr++.'" selected>'.$value['nomMarque'].'</option>';
		else
			$brandSelection.='<option value="'.$brandCptr++.'">'.$value['nomMarque'].'</option>';
	
	$brandSelection.='</select>';

	$sizeTable='<div id="sizeTable" class="col-md-11" style="margin:10px;display:none;"></div>';
 ?>

<div id="createProductPageContent" class="row col-md-12">
	<div id="createProduct" class="col-md-7">
		<div id="createProductContent" class="row" <?php echo $dataId ?> >

			<?php 
				if($creation)
				{
					echo "<h3><small>Enregistrement d'un produit</small></h3>";
					echo '<h4><small>Tous les champs sont requis</small></h4>';
				}	
				else
				{
					echo "<h3><small>Fiche produit</small></h3>";
					echo "<h5><small><i>Référence : REF".$idProduit."</i></small></h5>";
				}
			?>
			<form action="index.php?page=controller/productsManagement" method="post" class="col-md-9 col-sm-3" enctype="multipart/form-data" novalidate>
			    <?php echo $categorySelection; ?>		   
			    <?php //echo $sizeTable; ?>
			    <?php echo $sportSelection; ?>
			    <?php echo $brandSelection; ?>
			    <input <?php echo $disableField ?> type="text" name="price" class="form-control" id="price" placeholder="20 (en euros)" <?php echo "value=".$price ?>>
			    <input <?php echo $disableField ?> type="text" name="label" class="form-control" id="label" placeholder="Libellé" <?php echo "value=".$libelle ?>>
				<textarea <?php echo $disableField ?> class="form-control" name="description" id="description" rows="2" placeholder="Description"><?php echo $description ?></textarea>
				
				<?php 			

				if($creation)
				{
				?>
					<span class="btn btn-default btn-file">
					    Choisir un fichier
					    <input type="hidden" name="MAX_FILE_SIZE" value="1048576" />
					    <input id="imageFileChooser" accept=".jpg,.jpeg,.png" type="file" name="selectedImage">
					</span>
					<span id="importedImageFile"><i style="font-size: 13px;">Aucun fichier selectionné</i></span><br>
					<img id="preview" src="'.$photo.'" alt="preview" style="display: none"/><br>
					<button class="btn btn-primary btn-sm" id="createProductButton">Enregistrer</button>
				<?php 
				}
				else
					echo '<img id="preview" src="'.$photo.'" alt="preview" style="display: block"/><br>';
				 ?>
			</form>
		</div>
		<div class="buttons" style="margin-top: 5px;float: left;">
			<?php 

			if($creation)
				echo '<a class="btn btn-default btn-sm" href="index.php?page=view/manageProducts">Annuler</a></button>';
			else
				echo '<a class="btn btn-danger btn-sm" href="index.php?page=view/manageProducts">Retour</a></button>';

			 ?>

		</div>
	</div>
	<div id="rightPanel">
		<div id="stockManagement" class="shadow col-md-5" <?php echo $displaySizesManager ?>>
			<div id="editStock" style="display:none">
				<h3><small>Gestion du stock</small></h3>
				<div class="col-md-6">
				<select name="selectedSize" class="form-control col-md-2" id="selectedSize">
				<?php 


					if($shoeSizes)
						$sizes=getShoeSizes($db);
					else
						$sizes=getSizeByCategories($db,1);

	    			echo '<option value="notSelected">Taille</option>';
					foreach ($sizes as $key => $value)
	    				echo '<option value="'.$value.'">'.$value.'</option>';
				 ?>
				</select>
				</div>
				<div class="col-md-6">
					<input type="number" min="0" name="qty" id="qty" class="form-control" placeholder="3...">
				</div>
				<button id="addToStock" class="btn btn-primary btn-sm">Ajouter au stock</button>
			</div>

			<div id="hiddenEditStock" >
				<h3><small>Gestion du stock</small></h3>
				Gérez vos stocks en associant la quantité à la taille désirée <br>
				<button id="stockPanel" class="btn btn-default btn-sm">Gérer le stock</button>
			</div>	
		</div>
		<?php 	
			if(!$creation)
				$display=getStockByProductId($db,$idProduit) ? 'style=""' : 'style="display:none"';
		 ?>
		
		<div id="stock" class="shadow col-md-5" <?php if($creation)
															echo "style='display:none'";
													   else 
													   	echo $displayStock ?>>
			<h3 style="margin-top: 0px;"><small>Stock actuel</small></h3>
			<table class="table table-condensed table-hover" id="stockTable">
				<thead>
					<tr>
						<th>Taille</th>
						<th>Quantité</th>
						<th></th>
					</tr>
				</thead>
				<tbody>
				<?php 
				if(!$creation)
				{
					$availableSizes = getStockByProductId($db,$idProduit);
					
					foreach ($availableSizes as $key => $value)
					{
						echo "<tr>
						<td class='availableSizeCell'>".$key."</td>
						<td class='availableQtyCell'>".$value."</td>
						<td><i id='deleteStockRow' class='material-icons' style='float: right; color: rgb(221, 221, 221);cursor:pointer'>clear</i></td>
						</tr>";
					}	
				}
				 ?>
				</tbody>
			</table>

			<button class="btn btn-sm btn-default" id="clearStock">Détruire le stock</button>	
		</div>
	</div>
	
</div>


<script src="js/jquery.js"></script>
<script src="js/createProduct.js"></script>

<?php 
}
 ?>