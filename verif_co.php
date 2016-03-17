<?php 

	if(isset($_POST['email']) && !empty($_POST['email']) && isset($_POST['password']) &&!empty($_POST['password']) )
	{
		$mail=$_POST['email'];
		$password=$_POST['password'];

		if(customerConnexion($db,$mail,$password))
		{
			setSession($db,$mail);	
			header('location: index.php');
		}	
		else//display error message
			header('location: index.php?page=page_co');
	}

	header('location: index.php');

?>
