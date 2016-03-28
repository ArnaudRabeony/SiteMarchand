<?php

require_once('./model/produit.php');
require_once('./connection.php');
require_once('./model/sport.php');


function getSportProducts($db, $sport)
{
	// getting the id of the sport that we wont to display the products
	$sportId = getIdSportByName($db, $sport);
	return getProductsBySport($db, $sportId);
}

?>