<?php 
    require_once("connection.php");
    require_once('fonctions.php');

if(isset($_POST['email']) && isset($_POST['firstname']) && isset($_POST['lastname']) && isset($_POST['password']) && isset($_POST['address']) && isset($_POST['phone']))
{
	if(!empty($_POST['email']) && !empty($_POST['firstname']) && !empty($_POST['lastname']) && !empty($_POST['password']) && !empty($_POST['address']) && !empty($_POST['phone']))
	{
		$email= $_POST['email'];
		$firstname=$_POST['firstname'];
		$lastname=$_POST['lastname'];
		$password=$_POST['password'];
		$address=$_POST['address'];
		$phone=$_POST['phone'];

		if(mailExists($db,$email))
			header('location: index.php?page=createAccount&&error=true&&errortype=usedEmail');
			
		if(addCustomer($db,$email,$lastname,$firstname,$password,$address,$phone))
		{
			setSession($db,$email);		
			header('location: index.php');
		}
		else
			header('location: index.php?page=createAccount&&error=true&&errortype=insert');
		

	}
}
?>
