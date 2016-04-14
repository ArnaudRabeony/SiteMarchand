<?php 


require_once(dirname(__FILE__) . '/../model/functions.php');
require_once(dirname(__FILE__) . '/../model/produit.php');

if(pageRestriction(array("admin")))
{

$emptyTable=isProduitEmpty($db);

$visibleEmptyContainer= $emptyTable ? 'style="display:block;"' : 'style="display:none;"';
$visibleContainer= $emptyTable ? 'style="display:none;"' : 'style="display:block;"';
 ?>

<div class="displayContainer">
	<p>
		<h3><small>Cette page vous permet de gérer les produits</small></h3>
		 En cliquant sur les boutons de la ligne désirée, vous aurez la possibilité :
		 <ul>
		 	<li>de mettre à jour un ou plusieurs champs du produit</li>
		 	<li>de supprimer le produit</li>
		 </ul>

		 Seuls quelques champs sont visible dans le tableau ci-dessous. Cependant, si vous désirez procéder à la mise à jour approfondie d'un produit, il vous suffit de survoler la ligne désirée puis de cliquer sur le bouton situé à gauche de celle dernière.
		 <hr>
	</p>
	<div class="tableContainer">
		<div id="notEmptyBasket" class="table-responsive" <?php echo $visibleContainer ?>>
			<form class="form-inline">
			<div id="searchContainer" class="form-inline col-md-6">
				<div class="form-group ">
					<select class="form-control col-md-2" name="searchBy" id="searchBy">
						<option value="all">Tout</option>
						<option value="ref">Référence</option>
						<option value="brand">Marque</option>
						<option value="label">Libelle</option>
					</select>
				</div>
				<div class="form-group">
					<input type="text" class="form-control" id="searchInBase" name="searchInBase" placeholder="Nike, 45, Maillot...">
			    </div>
			</div><br><br>
			</form>
			<div class="newProduct">
			<a id="addProduct" class="btn btn-default btn-sm btn-primary" href="index.php?page=view/createProduct">Ajouter un produit</a></button>
			</div>
			<div class="buttonsContainer" style="float:right">
				<a class="btn btn-default btn-sm" href="index.php?page=view/manageProducts">Annuler</a></button>
				<button id="saveButton" class="btn btn-default btn-sm" >Sauvegarder</button>
				<!--<button id="addCustomer" class="btn btn-default btn-sm"><i class="fa fa-user-plus" style="color:#28497D;"></i></button>-->
			</div><br>
			<table class="table table-hover table-condensed" id="productsTable">
			<thead class='thead-default'>
				<tr>
					<th></th>
					<th>Ref</th>
					<th>Marque</th>
					<th>Libellé</th>
					<th>Description</th>
					<th>Prix</th>
				</tr>
			</thead>
				<tbody>
					<?php echo displayProducts($db,null,null,null);?>
				</tbody>
			</table>
			<div class="buttonsContainer">
					<a class="btn btn-default btn-sm" href="index.php?page=view/manageProducts">Annuler</a></button>
					<button id="saveButton" class="btn btn-default btn-sm" >Sauvegarder</button>
				<!--<button id="addCustomer" class="btn btn-default btn-sm"><i class="fa fa-user-plus" style="color:#28497D;"></i></button>-->
			</div>
		</div>
		<div id="emptyProductTableContainer" class="shadow450" <?php echo $visibleEmptyContainer ?>>
			<div id="emptyProductTable">
				<p>
					<i class="material-icons">list</i>
					<h3>Aucun produit dans la base de données</h3>
					<h5>La base de données peut être alimentée en créant des produits ou via un fichier</h5>
					<button class="btn btn-sm btn-default btn-success"><a id="importFromCsv" href="#">Importer depuis un fichier</a></button>
					<button class="btn btn-sm btn-default btn-success"><a id="createSingleArticle" href="index.php?page=view/createProduct">Créer un article</a></button>
				</p>
			</div>
		</div>
		<br>
		<hr>
		<p>
			<h3><small>Vous pouvez importer une liste de produits créée au préalable sous la forme d'un fichier csv ou xls</small></h3>
			Pour cela, il vous suffit de charger votre fichier dans le champs présent ci-dessous puis de cliquer sur le bouton d'importation.
			<div class="fileFormat"><h4><small><i>Votre fichier devra respecter l'ordre des champs suivant : id, libelle, marque, description, sport, catégorie, prix, taille et image</i></small></h4></div>
			<div class="col-md-8"><br>

			<form method="post" action="index.php?page=controller/importsManager" enctype="multipart/form-data">
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

<script src="js/jquery.js"></script>
<script src="js/displayProducts.js"></script>

<?php } ?>