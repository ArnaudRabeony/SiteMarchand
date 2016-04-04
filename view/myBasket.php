<?php 

$connected = isset($_SESSION['id']) ? true : false;

if($connected)
    $emptyBasket=count($_SESSION['basketItems']) == 0 ? true : false;

$visibleEmptyContainer= $emptyBasket==true ? 'style="display:block;"' : 'style="display:none;"';
$visibleContainer= $emptyBasket==true ? 'style="display:none;"' : 'style="display:block;"';
 ?>

<hr>
<div id="myBasket" class="row">
	<div id="myBasketContainer" >
		<div id="notEmptyBasket" <?php echo $visibleContainer ?>>
		<div style="margin-left: 30px;">
			<h3><small>Vous trouverez ci-dessous le contenu de votre panier.</small></h3>
		 Ce dernier vous permet de supprimer les articles présents et/ou procéder à la commande de vos articles
		</div>
		 <hr>
		 <div id="basketItemsContainer" class="mCustomScrollbar" data-mcs-theme="dark-2">
		 	<?php echo displayBasket($db) ?>
		 </div>
		 <div id="toOrderButtonsContainer">
		 	<button id="commandButton" class="btn btn-primary btn-sm"><a href="index.php?page=view/myOrders">Commander</a></button>
		 </div>
		</div>
		<div id="emptyBasket"  <?php echo $visibleEmptyContainer ?>>
			<p>
			<i class="material-icons">shopping_basket</i>
				<h3>Votre panier est vide</h3>
				<h5>Ajoutez des articles à votre panier en cliquant sur les boutons "Ajouter au panier" répartis à travers le site</h5>
				<button class="btn btn-sm btn-default btn-success"><a href="index.php">Continuer mes achats</a></button>
			</p>
		</div>
	</div>
</div>

<script src="js/jquery.js"></script>
<!-- <script src="js/myBasket.js"></script> -->
