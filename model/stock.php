<?php

require_once(dirname(__FILE__) . '/../connection.php');

// require_once('./connection.php');


function getStockByProductId($db,$productId)
{
	$req = $db->prepare('select * from stock where idProduit = :id');
	$req->bindValue(':id', $productId);
	$req->execute();
	$res = $req->fetchAll();
    return $res;
}

function addToStock($db,$idProduit,$idTaille,$qty)
{
	$insertReq = $db->prepare('insert into stock values(:idProduit,:idTaille,:quantite)');
	$insertReq->bindValue(":idProduit",$idProduit);
	$insertReq->bindValue(":idTaille",$idTaille);
	$insertReq->bindValue(":quantite",$qty);
	$insertReq->execute();
}