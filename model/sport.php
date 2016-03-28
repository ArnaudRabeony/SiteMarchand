<?php

require_once('./connection.php');

function getIdSportByName($db, $name)
{
	$req = $db->prepare('select idSport from sport where nomSport = :nomSport');
    $req->bindValue(':nomSport', $name);
    $req->execute();
    $res = $req->fetch(PDO::FETCH_NUM);
    return $res[0];
}

function getSportById($db, $id)
{
	$req = $db->prepare('select nomSport from sport where idSport = :idSport');
    $req->bindValue(':idSport', $id);
    $req->execute();
    $res = $req->fetch(PDO::FETCH_NUM);
    return $res[0];
}

function getAllSports($db)
{
	$req = $db->prepare('select nomSport from sport');
	$req->execute();
	$res = $req->fetchAll();
    return $res;
}