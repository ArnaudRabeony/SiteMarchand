<?php 

require_once("../../model/functions.php");
require_once("../../model/stock.php");
require_once("../../model/taille.php");

if(verifGet(array("id","size")))
{
	$idProduit=$_GET["id"];
	$idTaille=getIdTailleByName($db,$_GET["size"]);

	$options="";

	$sizes = getQtyByProductIdAndSize($db,$idProduit,$idTaille);
	// print_r($sizes);
	// $options.='<option value="notSelected">Qté</option>';

	for ($i=1; $i <= $sizes; $i++)
		$options.='<option value="'.$i.'">'.$i.'</option>';

	echo $options;
}
?>