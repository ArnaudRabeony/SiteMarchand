<?php 
require_once("../../model/functions.php");

session_start();
//add productId to session
if(verifGet(array("id","size","qty")))
		echo updateSessionBasket($_GET['id'],$_GET["size"],$_GET["qty"]);
	// print_r($_SESSION['basketItems'])
?>
