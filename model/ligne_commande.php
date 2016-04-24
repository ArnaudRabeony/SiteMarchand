<?php

require_once(dirname(__FILE__) . '/../connection.php');
require_once('produit.php');

function getLineByOrderId($db,$id)
{
	$req=$db->prepare("select * from ligne_commande where idCommande=:id");
	$req->bindValue(":id",$id);
	$req->execute();
	$res=$req->fetchAll();

	return $res;
}

function addLine($db,$idCommande,$idProduit,$uprix,$quantite,$idTaille)
{
	$req=$db->prepare("insert into ligne_commande(idCommande,idProduit,quantite,idTaille) values(:commande,:produit,:quantite,:taille)");
	$req->bindValue(":produit",$idProduit);
	$req->bindValue(":commande",$idCommande);
	$req->bindValue(":quantite",$quantite);
	$req->bindValue(":taille",$idTaille);
	$req->execute();

	$req=$db->prepare("update commande set prixCommande = prixCommande + :uprix*:quantite where idCommande=:idCommande");
	$req->bindValue(":uprix",$uprix);
	$req->bindValue(":quantite",$quantite);
	$req->bindValue(":idCommande",$idCommande);
	return $req->execute();
}

function deleteLinesByOrder($db,$orderId)
{
	$req=$db->prepare('delete from ligne_commande where idCommande=:id');
   	$req->bindValue(':id',$orderId);
   	return $req->execute();
}

function removeProductFromLine($db,$productId,$quantite,$orderId)
{

	$price = getProductPrice($db,$productId);

	$req=$db->prepare('delete from ligne_commande where idCommande=:orderId and idProduit=:productId');
   	$req->bindValue(':orderId',$orderId);
   	$req->bindValue(':productId',$productId);
   	$req->execute();

   	$req=$db->prepare("update commande set prixCommande = prixCommande - :uprix*:quantite where idCommande=:idCommande");
	$req->bindValue(":uprix",$price);
	$req->bindValue(":quantite",$quantite);
	$req->bindValue(":idCommande",$orderId);
	return $req->execute();
}