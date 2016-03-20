<div class="displayContainer col-md-12" style="/*background-color: red;*/padding:10px 10px;">
<p>
	<h3><small>Cette page vous permet de gérer les clients.</small></h3>
	 En cliquant sur les boutons de la ligne désirée, vous aurez la possibilité :
	 <ul>
	 	<li>d'éditer les différents champs d'un client</li>
	 	<li>de supprimer un client</li>
	 </ul>
</p>
	<div class="tableContainer" style="/*background-color: blue;*/">
		<table class="table table-hover table-condensed" id="customersTable">
			<?php echo displayCustomers($db);?>
		</table>
		<button id="saveButton" class="btn btn-default btn-sm" style="float:right" novalidate>Sauvegarder</button>
	</div>
</div>

<script src="js/jquery.js"></script>
<script src="js/displayCustomers.js"></script>
