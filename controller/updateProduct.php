<?php

require_once(dirname(__FILE__) . '/../model/functions.php');
require_once(dirname(__FILE__) . '/../model/produit.php');

if(verifGet(array("id","libelle","description","prix")))
{
	$id=$_GET['id'];
	$libelle=$_GET['libelle'];
	$description=$_GET['description'];
	$prix=$_GET['prix'];

	updateProduct($db,$id,$libelle,$description,$prix);
}

?>