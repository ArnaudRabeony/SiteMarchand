<?php 

require("../../model/functions.php");
require("../../model/stock.php");
require("../../model/taille.php");

if(verifGet(array("id")))
{
	if(verifGet(array("size")))
	{
		$idProduit=$_GET["id"];
		$idTaille=getIdTailleByName($db,$_GET["size"]);
		deleteStockByProductIdAndSize($db,$idProduit,$idTaille);
	}
	else
		deleteStockByProductId($db,$_GET["id"]);

	$body="";

	$availableSizes = getStockByProductId($db,$_GET["id"]);
						
	foreach ($availableSizes as $key => $value)
	{
		$body.="<tr>
		<td class='availableSizeCell'>".$key."</td>
		<td class='availableQtyCell'>".$value."</td>
		<td><i id='deleteStockRow' class='material-icons' style='float: right; color: rgb(221, 221, 221);cursor:pointer'>clear</i></td>
		</tr>";
	}	

	echo $body;
}


