<?php 

 include('../../model/functions.php');

//increase nb in db
if(verifPost(array("nb")))
	//$_SESSION["basketItemsNumber"]++;
	echo $_POST["nb"]+1;
?>
