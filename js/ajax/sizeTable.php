<?php 

require_once("../../connection.php");
require("../../model/categorie_produit.php");

$category = $_GET['category'];

$returned = getSizeByCategories($db,$category);
// $arrayName = array('test' => "value");
echo json_encode($returned);
// echo json_encode($arrayName);
// 
 ?>