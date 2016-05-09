<?php 

require_once("../../model/functions.php");
require_once("../../connection.php");
require_once("../../model/categorie_produit.php");
require_once("../../model/taille.php");

	$category = $_GET['category'];

	// $arrayName = array('test' => "value");
	echo json_encode(getSizeByCategories($db,$category));
	// echo json_encode($arrayName);

 ?>