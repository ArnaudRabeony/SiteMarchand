<?php 

require_once("../../model/functions.php");
require_once("../../model/stock.php");
require_once("../../model/taille.php");

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
		<td class='availableQtyCell' style='margin-left:2px;'>".$value."</td>
		<td><i id='deleteStockRow' class='material-icons' style='float: right; color: rgb(221, 221, 221);cursor:pointer'>clear</i></td>
		</tr>";
	}	

	echo $tableBody;
}
?>