<?php 

 include('../../model/functions.php');
 include('../../model/sql_functions.php');

if(verifPost(array("id")))
	echo deleteUserById($db,$_POST["id"]);

?>