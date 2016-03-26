<?php 

	$type="";
	$errorMessage="";
	$invalidMail="";
	if(isset($_GET['error']) && $_GET['error']=="true" && isset($_GET['errortype']))
	{
		$type=$_GET['errortype'];

		switch ($type) 
		{
			case 'notExists':
				$errorMessage="Erreur : impossible de trouver le client";
				break;

			case 'update':
				$errorMessage="Erreur : impossible de mettre à jour la base de données";
				break;
		}
	}
 ?>

<div class="displayContainer">
	<p>
		<h3><small>Cette page vous permet de gérer les produits</small></h3>
		 En cliquant sur les boutons de la ligne désirée, vous aurez la possibilité :
		 <ul>
		 	<li>de mettre à jour un ou plusieurs champs du produit</li>
		 	<li>de supprimer le produit</li>
		 </ul>
		 <hr>
	</p>
	<div class="tableContainer table-responsive">
		<table class="table table-hover table-condensed" id="customersTable">
			<?php echo displayProducts($db);?>
		</table>
		<div class="buttonsContainer">
			<button id="cancelButton" class="btn btn-default btn-sm" ><a href="index.php?page=view/displayCustomers">Annuler</a></button>
			<button id="saveButton" class="btn btn-default btn-sm" >Sauvegarder</button>
			<!--<button id="addCustomer" class="btn btn-default btn-sm"><i class="fa fa-user-plus" style="color:#28497D;"></i></button>-->
		</div><br>
		<hr>
		<p>
			<h3><small>Vous pouvez importer une liste de produits créée au préalable sous la forme d'un fichier csv ou xls</small></h3>
			Pour cela, il vous suffit de charger votre fichier dans le champs présent ci-dessous puis de cliquer sur le bouton d'import.
			<div class="col-md-8"><br>

			<form method="post" action="controller/importsManager.php" enctype="multipart/form-data">
			    <span class="btn btn-default btn-file">
				    Choisir un fichier
				    <input type="hidden" name="MAX_FILE_SIZE" value="1048576" />
				    <input id="productsFileChooser" accept=".csv,.xls" type="file" name="selectedFile">
				</span>
				<span id="importedFile"><i>Aucun fichier selectionné</i></span><br><br>
			    <input id="importProducts" type="submit" name="submit" value="Importer mes produits" class="btn btn-default" disabled/>
			</form>

			</div>		
		</p>
	</div>
</div>
<p class="errormessage" style="color:red"><?php echo $errorMessage; ?></p>

<script src="js/jquery.js"></script>
<script src="js/displayProducts.js"></script>