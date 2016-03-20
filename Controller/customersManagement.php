<?php 

if(verifPost(array("email","firstname","lastname","password","address","phone")))
{
	$email= $_POST['email'];
	$firstname=$_POST['firstname'];
	$lastname=$_POST['lastname'];
	$password=$_POST['password'];
	$address=$_POST['address'];
	$phone=$_POST['phone'];

	$encryptedPassword = password_hash($password,PASSWORD_BCRYPT);

	if(mailExists($db,$email))
		header('location: index.php?page=View/createAccount&&error=true&&errortype=usedEmail&&firstname='.$firstname.'&&lastname='.$lastname.'&&address='.$address.'&&phone='.$phone);
	else if(addCustomer($db,$email,$lastname,$firstname,$encryptedPassword,$address,$phone))
	{
		//Auto connection
		setSession($db,$email);	
		print_r($_SESSION);
		header('location: index.php');
	}
	else
		header('location: index.php?page=View/createAccount&&error=true&&errortype=insert');
	
}

