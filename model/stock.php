<?php

require_once(dirname(__FILE__) . '/../connection.php');

// require_once('./connection.php');

function addToStock($db,$idProduit,$idTaille,$qty)
{
	$insertReq = $db->prepare('insert into stock values(:idProduit,:idTaille,:quantite)');
	$insertReq->bindValue(":idProduit",$idProduit);
	$insertReq->bindValue(":idTaille",$idTaille);
	$insertReq->bindValue(":quantite",$qty);
	$insertReq->execute();

	$req = $db->prepare('select * from stock where idProduit=:id');
	$req->bindValue(':id', $idProduit);
 	$req->execute();
 	$res = $req->rowCount();

 	return $res == 1 ? true : false;
}

function getStockByProductId($db,$idProduit)
{
   	$req = $db->prepare('select t.nomTaille, s.quantite from stock s join taille t on t.idTaille=s.idTaille where s.idProduit=:id');
    $req->bindValue(':id', $idProduit);
    $req->execute();

    $returned=array();

    while($res = $req->fetch(PDO::FETCH_NUM))
    	 $returned[$res[0]] = $res[1];
    	
    	// $returned=array_merge(array($res[0] => $res[1]),$returned);

         // $returned += [$res[0] => $res[1]];

    // print_r($returned);
    return $returned;
}

function getQtyByProductIdAndSize($db,$idProduit,$idTaille)
{
   	$req = $db->prepare('select s.quantite from stock s join taille t on t.idTaille=s.idTaille where s.idProduit=:id and s.idTaille=:idTaille');
    $req->bindValue(':id', $idProduit);
    $req->bindValue(':idTaille', $idTaille);
    $req->execute();
    $res =  $req->fetch(PDO::FETCH_NUM);

    return $res[0];
}

function updateStock($db,$idProduit,$idTaille,$qtyToAdd)
{
	$currentQty = getQtyByProductIdAndSize($db,$idProduit,$idTaille);
	$newQty=$currentQty+$qtyToAdd;

	$req = $db->prepare('update stock set quantite=:qty where idProduit=:id and idTaille=:idTaille');
	$req->bindValue(':id', $idProduit);
	$req->bindValue(':idTaille', $idTaille);
	$req->bindValue(':qty', $newQty);
 	$req->execute();

 	$req = $db->prepare('select quantite from stock where idProduit=:id');
	$req->bindValue(':id', $idProduit);
 	$req->execute();
 	$res = $req->rowCount();

    return $res == 1 ? true : false;
}

function sizeExists($db,$idProduit,$idTaille)
{
	$req = $db->prepare('select * from stock where idProduit=:id and idTaille=:idTaille');
	$req->bindValue(':id', $idProduit);
	$req->bindValue(':idTaille', $idTaille);
 	$req->execute();
 	$res = $req->rowCount();

    return $res == 1 ? true : false;
}

function deleteStockByProductId($db,$idProduit)
{
    $req = $db->prepare('delete from stock where idProduit=:id');
    $req->bindValue(':id', $idProduit);
    $req->execute();
    $res = $req->rowCount();

    return $res == 1 ? true : false;
}

function deleteStockByProductIdAndSize($db,$idProduit,$idTaille)
{
    $req = $db->prepare('delete from stock where idProduit=:id and idTaille=:idTaille');
    $req->bindValue(':id', $idProduit);
    $req->bindValue(':idTaille', $idTaille);
    $req->execute();
    $res = $req->rowCount();

    return $res == 1 ? true : false;
}