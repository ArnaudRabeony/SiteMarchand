<?php 

require_once("../../model/functions.php");
require_once("../../model/client.php");

if(verifPost(array("id")))
	echo deleteUserById($db,$_POST["id"]);

?>