<?php 
	if(verifPost(array("email","password")))
	{
		$mail=$_POST['email'];
		$password=$_POST['password'];


		if(mailExists($db,$mail))
		{
			if(customerConnection($db,$mail,$password))
			{
				// print_r($_SESSION);
				// print_r($_SERVER);
				setSession($db,$mail);	

				// if($_SERVER['REQUEST_URI']!="/SiteMarchand/index.php")
					// header('location: '.$_SERVER['HTTP_REFERER']);
				// else
					header('location: index.php');
			}
			else//display error message
				header('location: index.php?page=view/co_page&error=true&errortype=matched');
		}
		else
			header('location: index.php?page=view/co_page&error=true&errortype=existed');	
	}
