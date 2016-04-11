<?php 

require("../../model/functions.php");
require("../../model/stock.php");
require("../../model/taille.php");

if(verifGet(array("id","size","qty")))
{
	$idProduit=$_GET["id"];
	$idTaille=getIdTailleByName($db,$_GET["size"]);
	$qty=$_GET["qty"];

	$tableBody="";
	// print_r($_GET);
	if(sizeExists($db,$idProduit,$idTaille))
		updateStock($db,$idProduit,$idTaille,$qty);
	else
		addToStock($db,$idProduit,$idTaille,$qty);

	$sizes = getStockByProductId($db,$idProduit);

	foreach ($sizes as $key => $value)
	{
		$tableBody.="<tr>
		<td class='availableSizeCell'>".$key."</td>
		<td class='availableQtyCell'>".$value."</td>
		</tr>";
	}	

	echo $tableBody;
}
?>