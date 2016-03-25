<?php 
	if(verifPost(array("email","password")))
	{
		$mail=$_POST['email'];
		$password=$_POST['password'];


		if(mailExists($db,$mail))
		{
			if(customerConnection($db,$mail,$password))
			{
				setSession($db,$mail);	
				header('location: index.php');
			}
			else//display error message
				header('location: index.php?page=view/co_page&error=true&errortype=matched');
		}
		else
			header('location: index.php?page=view/co_page&error=true&errortype=existed');	
	}
