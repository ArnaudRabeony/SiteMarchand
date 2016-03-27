<?php 
    include('../model/functions.php');
    include('../model/produit.php');

if(verifGet(array("id","libelle","description","prix")))
{
	$id=$_GET['id'];
	$libelle=$_GET['libelle'];
	$description=$_GET['description'];
	$prix=$_GET['prix'];

	updateProduct($db,$id,$libelle,$description,$prix);
}

?>