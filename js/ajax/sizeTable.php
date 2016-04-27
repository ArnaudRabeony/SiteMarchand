<?php 

require_once("../../connection.php");
require_once("../../model/categorie_produit.php");
require_once("../../model/taille.php");

$category = $_GET['category'];

$returned = getSizeByCategories($db,$category);
// $arrayName = array('test' => "value");
echo json_encode($returned);
// echo json_encode($arrayName);
 ?>