<?php 

require("../../model/functions.php");
require("../../model/produit.php");

if(verifGet(array("id")))
	if(!deleteProduct($db,$_GET["id"]))
		echo "error";

?>