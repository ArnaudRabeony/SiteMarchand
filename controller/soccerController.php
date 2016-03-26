<?php

require_once('./model/produit.php');
require('./model/connection.php');
require('./model/sport.php');


function getSoccerProducts($db)
{
	// getting the football id in the sport table
	$footballId = getIdSportByName($db, 'Football');
	return getProductsBySport($db, $footballId);
}

?>