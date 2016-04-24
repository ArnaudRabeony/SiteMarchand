<?php 

require_once("../../model/functions.php");
require_once("../../model/produit.php");
require_once("../../model/commande.php");
require_once("../../model/taille.php");
require_once("../../model/ligne_commande.php");

session_start();

if(verifGet(array("orderId","id","size","qty","uprice")))
{
	$orderId=$_GET["orderId"];
	$id=$_GET["id"];
	$qty=$_GET["qty"];
	$uprice=$_GET["uprice"];
	$size=$_GET["size"];

	$sizeId=getIdTailleByName($db,$size);

	echo addLine($db,$orderId,$id,$uprice,$qty,$sizeId) ? "line added " : "not added";
}
else
{
	$orderId=addOrder($db,$_SESSION['id']);
	echo $orderId;
}

// header(location:"")

?>