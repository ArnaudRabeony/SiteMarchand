<?php 

require_once("../../model/functions.php");
require_once("../../model/produit.php");
require_once("../../model/commande.php");
require_once("../../model/taille.php");
require_once("../../model/ligne_commande.php");


session_start();

	$orderId=addOrder($db,$_SESSION['id']);
	echo $orderId;