<?php 

require("../../model/functions.php");
require("../../model/commande.php");
require("../../model/ligne_commande.php");

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
else if(verifGet(array("productId","orderId","quantity")))
{
	$orderId=$_GET['orderId'];
	$productId=$_GET['productId'];
	$quantity=$_GET['quantity'];
	$customerId=$_SESSION['id'];

	if(removeProductFromLine($db,$productId,$quantity,$orderId))
		if(!getProductsNumber($db,$orderId))
			deleteOrderById($db,$orderId);

	$orders=count(getOrdersByClient($db,$customerId));

	echo json_encode(array("text"=>displayOrdersByClient($db,$customerId),"nb"=>$orders));
}


