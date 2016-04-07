<?php 

 include('../../model/functions.php');
 include('../../model/client.php');

if(verifPost(array("id")))
	echo deleteUserById($db,$_POST["id"]);

?>