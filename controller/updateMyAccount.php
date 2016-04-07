<?php 
 include('../model/functions.php');
 include('../model/client.php');

if(verifGet(array("id","address","phone","lastname","firstname","email")))
{
	$id=$_GET['id'];
	$address=$_GET['address'];
	$phone=$_GET['phone'];
	$firstname=$_GET['firstname'];
	$lastname=$_GET['lastname'];
	$email=$_GET['email'];

	//verifier si mail existe
	oneselfUpdate($db,$id,$lastname,$firstname,$email,$address,$phone);
}
 ?>