<?php 

require_once(dirname(__FILE__) . '/../model/commande.php');
require_once(dirname(__FILE__) . '/../model/ligne_commande.php');

if(pageRestriction(array("admin","client")))
{ ?>
<hr>
<div id="myOrders" class="row">
	<div id="myOrdersContainer">
		<?php 

		if(!getOrdersByClient($db,$_SESSION['id']))
		{
		 ?>
		<div class="emtpyOrderList shadow450" style="text-align: center; padding:120px;">
			<p>
			<i class="material-icons" style="font-size: 3em;">format_list_bulleted</i>
				<h3>Vous n'avez aucune commande en cours</h3>
				<h5>Cette page vous permet de suivre vos l'état de vos commandes courrantes</h5>
				<button class="btn btn-sm btn-default btn-success"><a href="index.php" style="text-decoration: none;color:white;">Continuer mes achats</a></button>
			</p>
		</div>
		<?php 
		}
		else
		{
		 ?>
		<div id="OrdersList">
			<h2><small>Mes commandes</small></h2>
			Cette page vous permet de suivre l'état de vos commandes.
			<table id="ordersTable" class="table table-condensed">
				<thead>
					<tr>
						<th>N° Commande</th>
						<th>Date</th>
						<th>Nombre d'articles</th>
						<th>Prix</th>
						<th>État</th>
						<th></th>
					</tr>
				</thead>
				<tbody>
					<?php 
						$idClient=$_SESSION["id"];
						echo displayOrdersByClient($db,$idClient);
					 ?>
				</tbody>
			</table>
		</div>
		<?php } ?>
	</div>
</div>

<script src="js/jquery.js"></script>
<?php } ?>