<?php

require_once('connection.php');

function getIdMarqueByName($db, $name)
{
	$req = $db->prepare('select idMarque from marque where nomMarque = :nomMarque');
    $req->bindValue(':nomMarque', $name);
    $req->execute();
    $res = $req->fetch(PDO::FETCH_NUM);
    return $res[0];
}	

function getMarqueLabelByName($db, $idMarque)
{
	$req = $db->prepare('select nomMarque from marque where idMarque = :idMarque');
    $req->bindValue(':idMarque', $idMarque);
    $req->execute();
    $res = $req->fetch(PDO::FETCH_NUM);
    return $res[0];
}	

function getAllMarques($db)
{
    $req = $db->prepare('select nomMarque from marque');
    $req->execute();
    $res = $req->fetchAll();
    return $res;
}