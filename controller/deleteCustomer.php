<?php 

 include('../../model/functions.php');
 include('../../model/client.php');

if(verifPost(array("id")))
{
	if(deleteUserById($db,$_POST["id"]))
	{
		session_destroy();
		header('Location: index.php?page=view/co_page');
	}
}
?>