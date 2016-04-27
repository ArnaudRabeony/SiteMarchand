<?php

require_once(dirname(__FILE__) . '/../connection.php');
require_once('commande_etat.php');
require_once('taille.php');
require_once('produit.php');
require_once('client.php');

function getOrdersByClient($db,$idClient)
{
	$req=$db->prepare("select * from commande where idClient=:id");
	$req->bindValue(":id",$idClient);
	$req->execute();
	$res=$req->fetchAll();

	return $res;
}

function getOrderById($db,$id)
{
	$req=$db->prepare("select * from commande where idCommande=:id");
	$req->bindValue(":id",$id);
	$req->execute();
	$res=$req->fetchAll();

	return $res;
}

function getOrders($db)
{
	$req=$db->prepare("select * from commande");
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

	$statusNb=count(getAllEtat($db));

	foreach ($orders as $value)
	{
		$id=$value['idCommande'];

		$lines = getLineByOrderId($db,$id);
		$innerContent='<div class="innerContent">';
		$icone="";

		$display = $value['idEtat']==$statusNb ? 'style="display:none"' : "";
		$displayRemoveCross = $value['idEtat']==$statusNb ? ' display:none;' : "";

		switch ($value['idEtat'])
			{
				case 1:
						$icone = '<i id="payButton" class="material-icons">credit_card</i>';
					break;

				case 2:
						$icone='<i class="material-icons">local_shipping</i>';
					break;

				case 3:
						$icone='<i class="material-icons">event_available</i>';
					break;
			}

		foreach ($lines as $line)
		{
			$product=getProductById($db,$line['idProduit'])[0];

			$leftPanel = '<div class="innerLeftPanel col-sm-4 col-md-4"><a href="index.php?page=view/productPage&ref='.$product['idProduit'].'"><img class="img-responsive" src="images/'.$product['photo'].'" style="width:150px;height:100px;"></a><h4><small>'.$product['libelle'].'</small></h4></div>';

			$rightPanel= '<div class="innerLeftPanel col-sm-4 col-md-4" style="margin-top:20px;"><b>Quantité : </b><span class="qty">'.$line['quantite'].'</span><br><b>Taille : </b><span class="size">'.getTailleById($db,$line['idTaille']).'</span></div>';
			$innerContent.='<div class="row" style="margin-top:10px;"><div id="removeFromOrderContainer" data-orderid="'.$id.'" data-productid="'.$product['idProduit'].'">
					<i class="removeFromOrderButton material-icons" style="color:#ddd;float:right;cursor:pointer;'.$displayRemoveCross.'">clear</i>
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
			<td><button class="btn btn-danger btn-sm deleteOrderButton"'.$display.'>Annuler</button></td>
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

function isCommandeEmpty($db)
{
	$req=$db->prepare("select * from commande");
	$req->execute();
	$res=$req->rowCount();

	return $res==0 ? true : false;
}

function displayOrders($db)
{
	$orders = getOrders($db);
	$tbody="";

	foreach ($orders as $value)
		$tbody.=getDisplayById($db,$value["idCommande"]);

	return $tbody;
}

function getDisplayById($db,$idCommande)
{
	$order = getOrderById($db,$idCommande)[0];
	$client = getCustomerById($db,$order["idClient"]);	

	$icons=array('<i class="material-icons">credit_card</i>',
		'<i class="material-icons">local_shipping</i>',
		'<i class="material-icons">event_available</i>');

	$status = getAllEtat($db);
	$orderStatusId = $order['idEtat'];
	$orderStatus = getEtatById($db,$orderStatusId);

		$body='
		<div class="row col-md-12 orderContainer" data-orderid="'.$idCommande.'">
			<div class="customerInfo col-md-3">
				<h5>
				'.$order['idCommande'].'<br>
					<small>
						'.substr($client['nom'], 0,1).". ".$client['prenom'].'
					</small>
				</h5>

			</div>
				<div class="statusContainer">
					<div class="ui steps">';

		$statusNb = count($status);
		for($i=0;$i<$statusNb;$i++)
		{

			$divStatus="";

			if($orderStatus==$i)
				$divStatus="active";
			else if($orderStatus<$i)
				$divStatus= "disabled";

			$clickable=$divStatus=="active"&& $i+1!=$statusNb ? 'style="cursor:pointer"' : 'style="cursor:default"';

			$body.='<div class="step '.$divStatus.'" '.$clickable.'>'.$icons[$i].'
					    <div class="content">
					      <div class="title">'.$status[$i]['nomEtat'].'</div>
					    </div>
					    <div class="arrowsContainer" style="float:right;">';

					    if($status[$i]['idEtat']!=1 && $divStatus=="active")
							$body.='<i class="material-icons prevButton" style="right:100px;">navigate_before</i>';
						
						$body.='
					    </div>
					  </div>';
		}
					
					  
			$body.='</div>
				</div>
		</div>';

	return $body;
}

function updateOrderStatus($db,$idCommande)
{
	$statusNb = count(getAllEtat($db));

	$req=$db->prepare("select idEtat from commande where idCommande=:id");
	$req->bindValue(":id",$idCommande);
	$req->execute();
	$res=$req->fetch(PDO::FETCH_NUM);

	if($res[0]<$statusNb)
	{
		$req=$db->prepare("update commande set idEtat = idEtat+1 where idCommande=:id");
		$req->bindValue(":id",$idCommande);
		$req->execute();
	}
}