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

		$encryptedPassword = password_hash($password,PASSWORD_BCRYPT) ;

		if(mailExists($db,$email))
			header('location: index.php?page=createAccount&&error=true&&errortype=usedEmail&&firstname='.$firstname.'&&lastname='.$lastname.'&&address='.$address.'&&phone='.$phone);
			
		if(addCustomer($db,$email,$lastname,$firstname,$encryptedPassword,$address,$phone))
		{
			//Auto connection
			setSession($db,$email);	
			print_r($_SESSION);
			header('location: index.php');
		}
		else
			header('location: index.php?page=createAccount&&error=true&&errortype=insert');
		
	}
}
?>
