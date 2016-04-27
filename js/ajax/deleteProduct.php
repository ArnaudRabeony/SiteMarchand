<?php 

require_once("../../model/functions.php");
require_once("../../model/produit.php");

if(verifGet(array("id")))
	if(!deleteProduct($db,$_GET["id"]))
		echo "error";

?>