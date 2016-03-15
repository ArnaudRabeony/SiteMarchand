<?php 

// Permet d'appliquer htmlentities() à toutes les variables $_POST et $_GET
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

 ?>