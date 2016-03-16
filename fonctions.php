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

function isExisting($page)
{
	$pagesArray=array(
				 "connexion",
				 "football",
				 "gestionClients",
				 "page_co",
				 "page_deco",
				 "welcome",
				 "creationCompte",
				 "creationCompte",
				);

	return in_array($page,$pagesArray);
}

 ?>