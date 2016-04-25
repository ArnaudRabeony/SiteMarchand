<?php

require_once(dirname(__FILE__) . '/../connection.php');
require_once('commande_etat.php');
require_once('taille.php');
require_once('produit.php');

function getOrdersByClient($db,$idClient)
{
	$req=$db->prepare("select * from commande where idClient=:id");
	$req->bindValue(":id",$idClient);
	$req->execute();
	$res=$req->fetchAll();

	return $res;
}

function addOrder($db,$idClient)
{
	$req=$db->prepare("insert into commande(idClient) values(:client)");
	$req->bindValue(":client",$idClient);
	$req->execute();

	return $db->lastInsertId();
}

function getProductsNumber($db,$idCommande)
{
	$req=$db->prepare("select sum(quantite) from ligne_commande where idCommande=:idCommande");
	$req->bindValue(":idCommande",$idCommande);
	$req->execute();
	$res=$req->fetch(PDO::FETCH_NUM);
	
	return $res[0];
}

function displayOrdersByClient($db,$idClient)
{
	$orders = getOrdersByClient($db,$idClient);
	$tbody="";

	foreach ($orders as $value)
	{
		$id=$value['idCommande'];

		$lines = getLineByOrderId($db,$id);
		$innerContent='<div class="innerContent">';
		$icone="";

		switch ($value['idEtat'])
			{
				case 1:
						$icone = '<i id="payButton" class="material-icons">credit_card</i>';
					break;

				case 2:
						$icone='<i class="material-icons">local_shipping</i>';
					break;

				case 3:
						$icone='<i class="fa fa-check-square" style="color: red;"></i>';
					break;
			}

		foreach ($lines as $line)
		{
			$product=getProductById($db,$line['idProduit'])[0];

			$leftPanel = '<div class="innerLeftPanel col-sm-4 col-md-4"><a href="index.php?page=view/productPage&ref='.$product['idProduit'].'"><img class="img-responsive" src="images/'.$product['photo'].'" style="width:150px;height:100px;"></a><h4><small>'.$product['libelle'].'</small></h4></div>';

			$rightPanel= '<div class="innerLeftPanel col-sm-4 col-md-4" style="margin-top:20px;"><b>Quantité : </b><span class="qty">'.$line['quantite'].'</span><br><b>Taille : </b><span class="size">'.getTailleById($db,$line['idTaille']).'</span></div>';
			$innerContent.='<div class="row" style="margin-top:10px;"><div id="removeFromOrderContainer" data-orderid="'.$id.'" data-productid="'.$product['idProduit'].'">
					<i class="removeFromOrderButton material-icons" style="color:#ddd;float:right;cursor:pointer">clear</i>
				</div>'.$leftPanel.$rightPanel.'</div><hr>';
		}
			
		$innerContent.='</div>';
		$tbody.='<tr class="mainRow" data-orderid="'.$id.'">
			<td class="expander"><span class="glyphicon glyphicon-menu-down"></span></td>
			<td>'.$id.'</td>
			<td>'.$value['dateCommande'].'</td>
			<td>'.getProductsNumber($db,$id).'</td>
			<td>'.$value['prixCommande'].'</td>
			<td>'.$icone.'</td>
			<td><button class="btn btn-danger btn-sm deleteOrderButton">Annuler</button></td>
		</tr><td colspan="12" class="hiddenRow" style="display:none;"><div id="expand'.$id.'"> 
              '.$innerContent.'</div></td>';
	}

	return $tbody;
}

function deleteOrderById($db,$orderId)
{
	$req=$db->prepare('delete from commande where idCommande=:id');
   	$req->bindValue(':id',$orderId);
   	return $req->execute();
}