<?php

require_once('connection.php');

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
	$req = $db->prepare('select nomCategorie from categorie_produit');
	$req->execute();
	$res = $req->fetchAll();
    return $res;
}

function getSizeByCategories($db,$idCategorie)
{
	$req = $db->prepare('select t.nomTaille from categorie_produit c join taille t on t.idCategorie=c.idCategorie where t.idCategorie=:id');
	$req->bindValue(':id', $idCategorie);
	$req->execute();

	$returned=array();

	while($res = $req->fetch(PDO::FETCH_NUM))
		$returned[]=$res[0];

    return $returned;
}