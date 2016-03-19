<?php 
require_once('connection.php');
// htmlentities() on all $_POST/$_GET variables
function protectPostGet() {
	htmlentitiesArray($_POST);
	htmlentitiesArray($_GET);
}

function htmlentitiesArray (&$tab) {
	foreach($tab as $cle => &$value) {
		if (is_array($value))
			htmlentitiesArray($value);
		else
			$value = htmlentities($value);
	}
}

// function isExisting($page)
// {
// 	$pagesArray=array(
// 				 "connection",
// 				 "soccer",
// 				 "customersManagement",
// 				 "co_page",
// 				 "deco_page",
// 				 "welcome",
// 				 "createAccount",
// 				 "check_co",
// 				);

// 	return in_array($page,$pagesArray);
// }

