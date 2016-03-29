<?php 

 include('../../model/functions.php');
 include('../../model/sql_functions.php');

if(verifPost(array("id")))
	return deleteUserById($db,$_POST["id"]);

?>