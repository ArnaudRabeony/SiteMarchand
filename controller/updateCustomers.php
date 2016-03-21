<?php 
    include('../model/functions.php');
    include('../model/sql_functions.php');

if(verifGet(array("id","type","lastname","firstname","email")))
{
	$id=$_GET['id'];
	$type=$_GET['type'];
	$firstname=$_GET['firstname'];
	$lastname=$_GET['lastname'];
	$email=$_GET['email'];

	if(!mailExists($db,$mail))
		updateCustomer($db,$id,$type,$lastname,$firstname,$email);
}

?>