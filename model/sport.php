<?php

require_once('connection.php');

function getIdSportByName($db, $name)
{
	$req = $db->prepare('select idSport from sport where nomSport = :nomSport');
    $req->bindValue(':nomSport', $name);
    $req->execute();
    $res = $req->fetch(PDO::FETCH_NUM);
    return $res[0];
}	