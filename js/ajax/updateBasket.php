<?php 

 include('../../model/functions.php');
session_start();
//add productId to session
if(verifGet(array("id")))
	echo updateSessionBasket($_GET['id']);
?>
