<?php 

if(verifGet(array("id","type","nom","prenom","email")))
{
	$id=$_GET['id'];
	$type=$_GET['type'];
	$firstname=$_GET['prenom'];
	$lastname=$_GET['nom'];
	$email=$_GET['email'];

	if(mailExists($db,$email))
	{
		if(updateCustomer($db,$id,$type,$lastname,$firstname,$email))
			header("location: index.php?page=View/displayCustomers");
		else
			header("location: index.php?page=View/displayCustomers&error=true&errortype=update");
	}
	else
		header("location: index.php?page=View/displayCustomers&error=true&errortype=notExists");


}

?>