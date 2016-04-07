<?php 
    include('../model/functions.php');
    include('../model/client.php');

if(verifGet(array("id","type","lastname","firstname","email")))
{
	$id=$_GET['id'];
	$type=$_GET['type'];
	$firstname=$_GET['firstname'];
	$lastname=$_GET['lastname'];
	$email=$_GET['email'];

	// if($id=="new")//new customer to add
	// 	if(!mailExists($db,$mail))
	// 		addCustomer($db,$type,$lastname,$firstname,$email);
	// else if(!mailExists($db,$mail))
	// 	updateCustomer($db,$id,$type,$lastname,$firstname,$email);

	if(!mailExists($db,$mail))
		updateCustomer($db,$id,$type,$lastname,$firstname,$email);
}

?>