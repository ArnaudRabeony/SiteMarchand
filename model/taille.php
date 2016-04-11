<?php

require_once(dirname(__FILE__) . '/../connection.php');

function getIdTailleByName($db, $name)
{
	$req = $db->prepare('select idTaille from taille where nomTaille = :nomTaille');
    $req->bindValue(':nomTaille', $name);
    $req->execute();
    $res = $req->fetch(PDO::FETCH_NUM);
    return $res[0];
}	

function getTailleById($db, $idTaille)
{
	$req = $db->prepare('select nomTaille from taille where idTaille = :idTaille');
    $req->bindValue(':idTaille', $idTaille);
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

function getShoeSizes($db)
{
    $id=getIdCategorieByName($db,"Chaussures");

    return getSizeByCategories($db,$id);
}

function getSizes($db)
{
    // $id=getIdCategorieByName($db,);

    return getSizeByCategories($db,1);
}