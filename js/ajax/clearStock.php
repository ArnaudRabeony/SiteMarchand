<?php 

require("../../model/functions.php");
require("../../model/stock.php");
require("../../model/taille.php");

if(verifGet(array("id","size")))
{
	$idProduit=$_GET["id"];
	$idTaille=getIdTailleByName($db,$_GET["size"]);
deleteStockRow
	echo "deleteById and Size :".deleteStockByProductIdAndSize($db,$idProduit,$idTaille);
}
else if(verifGet(array("id")))
	echo "deleteById  :".deleteStockByProductId($db,$_GET["id"]);
?>