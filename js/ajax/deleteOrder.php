<?php 

require_once("../../model/functions.php");
require_once("../../model/commande.php");
require_once("../../model/ligne_commande.php");
require_once("../../model/taille.php");

session_start();
if(verifGet(array("id")))
{
	$orderId=$_GET['id'];
	$customerId=$_SESSION['id'];

	if(deleteLinesByOrder($db,$orderId))
		deleteOrderById($db,$orderId);

	$orders=count(getOrdersByClient($db,$customerId));

	echo json_encode(array("text"=>displayOrdersByClient($db,$customerId),"nb"=>$orders));
}
else if(verifGet(array("productId","orderId","quantity","size")))
{
	$orderId=$_GET['orderId'];
	$productId=$_GET['productId'];
	$quantity=$_GET['quantity'];
	$sizeId=getIdTailleByName($db,$_GET['size']);
	$customerId=$_SESSION['id'];

	if(removeProductFromLine($db,$productId,$quantity,$orderId))
	{
		if(!getProductsNumber($db,$orderId))
			deleteOrderById($db,$orderId);
	}

	$orders=count(getOrdersByClient($db,$customerId));

	echo json_encode(array("text"=>displayOrdersByClient($db,$customerId),"nb"=>$orders));
}
