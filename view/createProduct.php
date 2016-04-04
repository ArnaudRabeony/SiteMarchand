<?php 
    require('./connection.php');
   
$price="";
$libelle="";
$price="";
$brandId="";
$categoryId="";
$sportId="";
$description="";
$photo="#";

    if(verifGet(array('id')))
    {
    	$product=getProductById($db,$_GET['id']);
    	$libelle=$product[0]['libelle'];
    	$price=$product[0]['prix'];
    	$brandId=$product[0]['idMarque'];
    	$categoryId=$product[0]['idCategorie'];
    	$sportId=$product[0]['idSport'];
    	$description=$product[0]['description'];
    	$photo="images/".$product[0]['photo'];
    }

	$categorySelection='<select class="form-control" name="category" id="selectCategory"><option value="-1">Choisir une catégorie</option>';
	$categories=getAllCategories($db);

	$categoryCptr=1;
	foreach ($categories as $key => $value)
		if($value['idCategorie'] == $categoryId)
			$categorySelection.='<option value="'.$value['idCategorie'].'" selected>'.$value['nomCategorie'].'</option>';
		else
			$categorySelection.='<option value="'.$value['idCategorie'].'">'.$value['nomCategorie'].'</option>';
	
	$categorySelection.='</select>';


	$sportSelection='<select class="form-control" name="sport" id="selectSport"><option value="-1">Choisir un sport</option>';
	$sports=getAllSports($db);

	$sportCptr=1;
	foreach ($sports as $key => $value)
		if($sportCptr == $sportId)
			$sportSelection.='<option value="'.$sportCptr++.'" selected>'.$value['nomSport'].'</option>';
		else
			$sportSelection.='<option value="'.$sportCptr++.'">'.$value['nomSport'].'</option>';
	
	$sportSelection.='</select>';


	$brandSelection='<select class="form-control" name="brand" id="selectBrand"><option value="-1">Choisir une marque</option>';
	$brands=getAllMarques($db);

	$brandCptr=1;
	foreach ($brands as $key => $value)
		if($brandCptr == $brandId)
			$brandSelection.='<option value="'.$brandCptr++.'" selected>'.$value['nomMarque'].'</option>';
		else
			$brandSelection.='<option value="'.$brandCptr++.'">'.$value['nomMarque'].'</option>';
	
	$brandSelection.='</select>';

	$sizeTable='<div id="sizeTable" class="col-md-11" style="margin:10px;display:none;"></div>';
 ?>

<div id="createProduct" class="col-md-offset-2">
	<div id="createProductContent" class="row">
<h3><small>Enregistrement d'un produit</small></h3>
<h4><small>Tous les champs sont requis</small></h4>
		<form action="index.php?page=controller/productsManagement" method="post" class="col-md-6 col-sm-3" enctype="multipart/form-data" novalidate>
		    <?php echo $categorySelection; ?>
		    <?php echo $sizeTable; ?>
		    <?php echo $sportSelection; ?>
		    <?php echo $brandSelection; ?>
		    <input type="text" name="price" class="form-control" id="price" placeholder="20" <?php echo "value=".$price ?>>
		    <input type="text" name="label" class="form-control" id="label" placeholder="Libellé" <?php echo "value=".$libelle ?>>
			<textarea class="form-control" name="description" id="description" rows="2" placeholder="Description"><?php echo $description ?></textarea>
			<span class="btn btn-default btn-file">
			    Choisir un fichier
			    <input type="hidden" name="MAX_FILE_SIZE" value="1048576" />
			    <input id="imageFileChooser" accept=".jpg,.jpeg,.png" type="file" name="selectedImage">
			</span>
			<span id="importedImageFile"><i style="font-size: 13px;">Aucun fichier selectionné</i></span><br>
			
			<?php 
				if($photo=="#")
					echo '<img id="preview" src="'.$photo.'" alt="preview" style="display: none"/><br>';
				else
					echo '<img id="preview" src="'.$photo.'" alt="preview" style="display: block"/><br>';
			 ?>
		    <button class="btn btn-default" id="createProductButton">Enregistrer le produit</button>
		</form>
	</div>
	<div class="buttons" style="margin-top: 5px">
			<a class="btn btn-default btn-sm" href="index.php?page=view/manageProducts">Annuler</a></button>
	</div>
</div>

<script src="js/jquery.js"></script>
<script src="js/createProduct.js"></script>

