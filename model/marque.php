<?php

require_once(dirname(__FILE__) . '/../connection.php');

function getIdMarqueByName($db, $name)
{
	$req = $db->prepare('select idMarque from marque where nomMarque = :nomMarque');
    $req->bindValue(':nomMarque', $name);
    $req->execute();
    $res = $req->fetch(PDO::FETCH_NUM);
    return $res[0];
}	

function getMarqueById($db, $idMarque)
{
	$req = $db->prepare('select nomMarque from marque where idMarque = :idMarque');
    $req->bindValue(':idMarque', $idMarque);
    $req->execute();
    $res = $req->fetch(PDO::FETCH_NUM);
    return $res[0];
}	

function getAllBrandsName($db)
{
    $req = $db->prepare('select nomMarque from marque');
    $req->execute();
    $res = $req->fetchAll();
    return $res;
}

function getAllMarques($db)
{
    $req = $db->prepare('select * from marque');
    $req->execute();
    $res = $req->fetchAll();
    return $res;
}