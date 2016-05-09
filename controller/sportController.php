<?php

require_once(dirname(__FILE__) . '/../model/produit.php');
require_once(dirname(__FILE__) . '/../model/sport.php');
require_once(dirname(__FILE__) . '/../connection.php');

function getSportProducts($db, $sport)
{
	// getting the id of the sport that we wont to display the products
	$sportId = getIdSportByName($db, $sport);
	return getProductsBySport($db, $sportId);
}

?>