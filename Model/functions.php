<?php 
require_once('connection.php');
// htmlentities() on all $_POST/$_GET variables
function protectPostGet() 
{
	htmlentitiesArray($_POST);
	htmlentitiesArray($_GET);
}

function htmlentitiesArray (&$tab) 
{
	foreach($tab as $cle => &$value) {
		if (is_array($value))
			htmlentitiesArray($value);
		else
			$value = htmlentities($value);
	}
}

 //Check that $_POST contains keys from $keys without empty values
function verifPost ($keys) 
{
	foreach($keys as $v) {
		if (!(isset($_POST[$v]) and trim($_POST[$v]) != '')) {
			return false;
		}
	}
	return true;
}

 //Check that $_GET contains keys from $keys without empty values
function verifGet ($keys) 
{
	foreach($keys as $v) {
		if (!(isset($_GET[$v]) and trim($_GET[$v]) != '')) {
			return false;
		}
	}
	return true;
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

