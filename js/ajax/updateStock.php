<?php 





require("../../model/functions.php");
require("../../model/stock.php");
require("../../model/taille.php");

if(verifGet(array("id","size","qty")))
{
	$idProduit=$_GET["id"];
	$idTaille=getIdTailleByName($db,$_GET["size"]);
	$qty=$_GET["qty"];

	// print_r($_GET);
	if(sizeExists($db,$idProduit,$idTaille))
	{
		echo "Taille existe deja";
		echo updateStock($db,$idProduit,$idTaille,$qty);
	}
	else
	{
		echo "Ajout de la taille";
		echo addToStock($db,$idProduit,$idTaille,$qty);
	}
}
?>