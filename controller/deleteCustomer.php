<?php 

 include('../model/functions.php');
 include('../model/sql_functions.php');

if(verifPost(array("id")))
{
	if(deleteUserById($db,$_POST["id"]))
	{
		session_destroy();
		header('Location: index.php?page=view/co_page');
	}
	else
		echo "error";
}
?>