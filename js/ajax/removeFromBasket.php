<?php 
 require_once('../../model/functions.php');

if(verifGet(array("id")))
{
	session_start();
	//get the key related to the productId and delete it
	unset($_SESSION['basketItems'][array_search($_GET['id'], $_SESSION['basketItems'])]);
}
?>