<?php 
session_start();
require_once("../../connection.php");
require_once("../../model/functions.php");
require_once("../../model/client.php");

if(verifGet(array("str","filter")))
{
	$filter=$_GET['filter'];
	$str=$_GET['str'];
	$id=$_SESSION['id'];

	switch ($filter) {
		case 'all':
			echo displayCustomers($db,$id,array("type","prenom","nom","email"),array($str),true);
			break;

		case 'type':
			echo displayCustomers($db,$id,array("type"),array($str),true);
			break;

		case 'firstname':
			echo displayCustomers($db,$id,array("prenom"),array($str),true);
			break;

		case 'lastname':
			echo displayCustomers($db,$id,array("nom"),array($str),true);
			break;

		case 'mail':
			echo displayCustomers($db,$id,array("email"),array($str),true);
			break;
	}
}
else
	echo displayCustomers($db,$_SESSION['id'],null,null,null);
?>
