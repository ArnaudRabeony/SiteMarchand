<?php

require_once('./connection.php');

function getIdTailleByName($db, $name)
{
	$req = $db->prepare('select idTaille from taille where nomTaille = :nomTaille');
    $req->bindValue(':nomTaille', $name);
    $req->execute();
    $res = $req->fetch(PDO::FETCH_NUM);
    return $res[0];
}	

function getAllTaille($db)
{
	$req = $db->prepare('select * from taille');
	$req->execute();
	return $req->fetchAll();
}