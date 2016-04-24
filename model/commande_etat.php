<?php

require_once(dirname(__FILE__) . '/../connection.php');

function getIdEtatByName($db, $name)
{
	$req = $db->prepare('select idEtat from commande_etat where nomEtat = :nomEtat');
    $req->bindValue(':nomEtat', $name);
    $req->execute();
    $res = $req->fetch(PDO::FETCH_NUM);
    return $res[0];
}	

function getAllEtat($db)
{
	$req = $db->prepare('select * from commande_etat');
	$req->execute();
	$res = $req->fetchAll();
    return $res;
}

function getEtatById($db, $id)
{
	$req = $db->prepare('select nomEtat from commande_etat where idEtat=:id');
    $req->bindValue(':id', $id);
    $req->execute();
    $res = $req->fetch(PDO::FETCH_NUM);
    return $res[0];
}	
