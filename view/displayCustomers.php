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

<div class="displayContainer" style="/*background-color: red;*/padding:10px 10px;">
<p>
	<h3><small>Cette page vous permet de gérer les clients.</small></h3>
	 En cliquant sur les boutons de la ligne désirée, vous aurez la possibilité :
	 <ul>
	 	<li>de mettre à jour un ou plusieurs champs d'un client</li>
	 	<li>de supprimer un client</li>
	 </ul>
</p>
	<div class="tableContainer table-responsive" style="/*background-color: blue;*/">
		<table class="table table-hover table-condensed table-striped" id="customersTable">
			<?php echo displayCustomers($db,$_SESSION['id']);?>
		</table>
		<button id="saveButton" class="btn btn-default btn-sm" style="float:right">Sauvegarder</button>
		<button id="cancelButton" class="btn btn-default btn-sm" style="float:right;margin-right: 5px;"><a href="index.php?page=view/displayCustomers">Annuler</a></button>
	</div>
</div>
<p class="errormessage" style="color:red"><?php echo $errorMessage; ?></p>


<script src="js/jquery.js"></script>
<script src="js/displayCustomers.js"></script>
