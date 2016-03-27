<?php

require_once('./model/produit.php');
require_once('./model/connection.php');
require_once('./model/sport.php');


function getSoccerProducts($db)
{
	// getting the football id in the sport table
	$footballId = getIdSportByName($db, 'Football');
	return getProductsBySport($db, $footballId);
}

?>