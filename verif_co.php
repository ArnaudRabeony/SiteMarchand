<?php 

	$mail=$_POST['email'];
	$password=$_POST['password'];

	if(tryCustomerConnexion($db,$mail,$password))
		echo "connecté";
	else
		echo "déco";

	// header('Location: index.php');
?>
