<?php 

require_once("../../model/functions.php");
require_once("../../model/client.php");

if(verifPost(array("id","email","password","newPassword")))
{
	//checks if the password matches
	if(customerConnection($db,$_POST['email'],$_POST["password"]))
	{
		updatePassword($db,$_POST["id"],$_POST["newPassword"]);
	}
	else
		echo "passwordError";
}
?>
