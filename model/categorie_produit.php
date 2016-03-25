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