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
			echo displayProducts($db,"natural join marque where libelle like :param0 or idProduit like :param1 or description like :param2 or marque.nomMarque like :param3",array($str),true);
			break;

		case 'ref':
			echo displayProducts($db,"where idProduit like :param0",array(str_replace ("REF", "", $str)),true);
			break;

		case 'description':
			echo displayProducts($db,"where description like :param0",array($str),true);
			break;

		case 'label':
			echo displayProducts($db,"where libelle like :param0",array($str),true);
			break;
	}
}
else
	echo displayProducts($db,"",null,null);
?>