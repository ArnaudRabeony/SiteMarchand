<?php 

require("../../model/functions.php");
require("../../model/produit.php");
require("../../model/commande.php");
require("../../model/taille.php");
require("../../model/ligne_commande.php");


session_start();

	$orderId=addOrder($db,$_SESSION['id']);
	echo $orderId;