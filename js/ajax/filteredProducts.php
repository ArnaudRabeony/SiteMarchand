<?php

require_once("../../model/functions.php");
require_once("../../model/produit.php");
require_once("../../model/sport.php");
require_once('../../view/clientProducts.php');
require_once("../../controller/sportController.php");

if(verifGet(array("filters","sport")))
{
	$sport= ucfirst($_GET["sport"]);
	$data   = $_GET["filters"];
	$data   = json_decode("$data", true);
	//just echo an item in the array

	$where = [];
	//array("libelle","idProduit","description","marque.nomMarque")

	for ($i=0; $i < count($data); $i++) 
		array_push($where, $data[$i]);

	// print_r(getFilteredProducts($db,$where));
	// print_r(getFilteredProducts($db,$where,$sport));

	$list = getFilteredProducts($db,$where,$sport);

	$products=array();

	foreach ($list as $value)
	{
		foreach ($value as $v)
		{
			$product = array("idProduit"=>$v['idProduit'],
				"description"=>$v['description'],
				"prix"=>$v['prix'],
				"libelle"=>$v['libelle'],
				"photo"=>$v['photo']
				);

			array_push($products, $product);
		}
	}

	echo count($products) ? displayProductList($db,$products) : "Aucun résultat";
	
}

?>