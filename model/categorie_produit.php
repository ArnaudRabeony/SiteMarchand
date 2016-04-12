<?php

require_once(dirname(__FILE__) . '/../connection.php');

function getIdCategorieByName($db, $name)
{
	$req = $db->prepare('select idCategorie from categorie_produit where nomCategorie = :nomCategorie');
    $req->bindValue(':nomCategorie', $name);
    $req->execute();
    $res = $req->fetch(PDO::FETCH_NUM);
    return $res[0];
}	

function getAllCategories($db)
{
	$req = $db->prepare('select * from categorie_produit');
	$req->execute();
	$res = $req->fetchAll();
    return $res;
}

function getCategorieById($db, $id)
{
	$req = $db->prepare('select nomCategorie from categorie_produit where idCategorie=:id');
    $req->bindValue(':id', $id);
    $req->execute();
    $res = $req->fetch(PDO::FETCH_NUM);
    return $res[0];
}	