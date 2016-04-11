<?php 

require("../../model/functions.php");
require("../../model/stock.php");
require("../../model/taille.php");

if(verifGet(array("id","size","qty")))
{
	// print_r($_GET);
	if(addToStock($db,$_GET["id"],getIdTailleByName($db,$_GET["size"]),$_GET["qty"]))
		echo true;
}
else
	echo false;
?>