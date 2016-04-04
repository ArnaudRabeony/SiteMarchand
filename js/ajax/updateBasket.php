<?php 

 include('../../model/functions.php');
session_start();
//increase nb in db
if(verifPost(array("nb")))
	echo ++$_SESSION["basketItemsNumber"];
?>
