<?php 

require_once("../../model/functions.php");
require_once("../../model/client.php");

session_start();

if(verifPost(array("id")))
{
	deleteUserById($db,$_POST["id"]);
	echo displayCustomers($db,$_SESSION['id'],null,null,null);
}

?>