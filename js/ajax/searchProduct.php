<?php 

require_once("../../connection.php");
require("../../model/functions.php");
require("../../model/produit.php");

if(verifGet(array("str","filter")))
{
	$filter=$_GET['filter'];
	$str=$_GET['str'];

	switch ($filter) {
		case 'all':
			echo displayProducts($db,array("libelle","idProduit","description","marque.nomMarque"),array($str),true);
			break;

		case 'ref':
			echo displayProducts($db,array("idProduit"),array(str_replace ("REF", "", $str)),true);
			break;

		case 'description':
			echo displayProducts($db,array("description"),array($str),true);
			break;

		case 'label':
			echo displayProducts($db,array("libelle"),array($str),true);
			break;

		case 'brand':
			echo displayProducts($db,array("marque.nomMarque"),array($str),true);
			break;
	}
}
else
	echo displayProducts($db,null,null,null);
?>