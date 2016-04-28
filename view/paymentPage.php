<?php 

require_once(dirname(__FILE__) . '/../model/commande.php');
require_once(dirname(__FILE__) . '/../model/ligne_commande.php');

if(pageRestriction(array("admin","client")))
{

$idClient=$_SESSION["id"];
$orderid=$_GET["orderid"];
?>
<hr>
		<div id="paymentContainer" class="row" <?php echo 'data-orderid="'.$orderid.'"'?>>
			<h2><small>Paiement de la commande <?php echo $orderid ?></small></h2>
			Cette page vous permet de procéder au paiement de votre commande
			<br>
			<table id="sumupTable" class="table table-condensed table-hover">
				<thead>
					<tr>
						<th>N° Produit</th>
						<th>Libelle</th>
						<th>Quantité</th>
						<th>Taille</th>
						<th>Prix Unitaire</th>
					</tr>
				</thead>
				<tbody>
				<?php echo recapCommande($db,$orderid) ?>
				</tbody>
			</table>
		</div>
		<div class="paymentFormContainer row">
			<div class="shadow paymentForm">
				<div id="address" style="text-align:left;" class="hidden-xs col-md-6">
					<h3><small>Votre adresse de facturation</small></h3><br>
					
					<?php 
					
					$client = getCustomerById($db,$idClient);	

					echo $client['adresse']

					 ?><br><br>
					 <div id="shippingAddress" style="position:relative;top:80px;text-align: left">
					 Utiliser cette adresse pour la livraison
					 <input type="checkbox" checked>
					 	
					 </div>
				</div>
				<div id="creditCard" class="hidden-xs col-md-6">
					<img src="images/creditCards.jpg" class="img-responsive" style="width:40%;float:right;margin-top: -8px;" alt="">
					<form action="#">
						<div class="form-group" style="margin-top: 20px;text-align: left;">
							<label for="owner">Titulaire de la carte</label>
							<input type="text" class="form-control" id="owner" name="owner" placeholder="Jean Dupond...">
							<label for="cardNumber">Numéro de la carte</label>
							<input type="text" class="form-control" name="cardNumber" id="cardNumber" placeholder="1234 5678 9012 3456">
							<label for="crypto">Cryptogramme visuel</label>
							<input type="text" class="form-control" name="crypto" id="crypto" placeholder="123">
						</div>
						<a href="#"><button class="btn btn-sm btn-success" id="pay" style="margin-top: -8px;float:right;margin-right:30px;width:20%">
							Payer
						</button></a>
					</form>
				</div>
				<div id="address" style="text-align:center;" class="visible-xs col-md-6">Taille de l'écran non adaptée</div>
			</div>
		</div>

<script src="js/jquery.js"></script>
<?php } ?>