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