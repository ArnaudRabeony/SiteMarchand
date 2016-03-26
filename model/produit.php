<?php

require_once('connection.php');

function addProduct($db, $dataArray)
{

	// echo "id Categorie : ".$dataArray['categorie']."<br>";

	$req = $db->prepare('insert into produit(libelle, description, prix, photo, idTaille, idCategorie, idSport, idMarque)
							values(:libelle, :description, :prix, :photo, :idTaille, :idCategorie, :idSport, :idMarque)');
	$req->bindValue(':libelle', $dataArray['libelle']);
	$req->bindValue(':description', $dataArray['description']);
	$req->bindValue(':prix', $dataArray['prix']);
	$req->bindValue(':photo', $dataArray['photo']);
	$req->bindValue(':idTaille', $dataArray['taille']);
	$req->bindValue(':idCategorie', 3);
	$req->bindValue(':idSport', 1);
	$req->bindValue(':idMarque', 1);
	$req->execute();

	$req=$db->prepare('select * from produit where libelle=:libelle and description=:description and prix=:prix and photo=:photo and idTaille=:idTaille and idCategorie=:idCategorie and idSport=:idSport and idMarque=:idMarque');
	$req->bindValue(':libelle', $dataArray['libelle']);
	$req->bindValue(':description', $dataArray['description']);
	$req->bindValue(':prix', $dataArray['prix']);
	$req->bindValue(':photo', $dataArray['photo']);
	$req->bindValue(':idTaille', $dataArray['taille']);
	$req->bindValue(':idCategorie', 3);
	$req->bindValue(':idSport', 1);
	$req->bindValue(':idMarque', 1);
	$req->execute();
	$res=$req->rowCount();

	return $res==1 ? true : false;
}

function deleteProductTable($db)
{
	$req = $db->prepare('delete from produit');
	$req->execute();
}

function getProductsBySport($db, $sport)
{
	$req = $db->prepare('select * from produit where idSport = :idSport');
	$req->bindValue(':idSport', $sport);
	$req->execute();
	$res = $req->fetchAll(PDO::FETCH_ASSOC);
    return $res;
}

function displayProducts($db)
{

	$head="<thead class='thead-default'>
		<tr>
			<th>Categorie</th>
			<th>Sport</th>
			<th>Ref</th>
			<th>Libellé</th>
			<th>Description</th>
			<th>Prix</th>
			<th>Photo</th>
			<th>Marque</th>
		</tr>
	</thead>";

	$req=$db->prepare('select * from produit');
	$req->execute();
	
	$body='<tbody>';
	$cptr=0;
	while($res=$req->fetch(PDO::FETCH_ASSOC))
	{
		$body.='<tr id="row'.$cptr++.'" class="secured">
		<td>
		<select disabled class="form-control" id="selectType">
		    <option value="1">Categorie</option>
		</select></td>
		<td>
		<select disabled class="form-control" id="selectType">
		    <option value="1">Sport</option>
		</select></td>
		<td><input id="ref" disabled class="form-control" type="text" value="REF'.$res['idProduit'].'"</td>
		<td><input id="label" disabled class="form-control" type="text" value="'.$res['libelle'].'"</td>
		<td><input id="description" disabled class="form-control" type="text" value="'.$res['description'].'"</td>
		<td><input id="price" disabled class="form-control" type="text" value="'.$res['prix'].'"</td>
		<td><input id="photo" disabled class="form-control" type="text" value="'.$res['photo'].'"</td>
		<td><input id="brand" disabled class="form-control" type="text" value="'.$res['idMarque'].'"</td>
		<td><button class="editButton btn btn-default btn-sm"><i class="fa fa-pencil"></i></button></td>
		<td><button class="deleteButton btn btn-default btn-sm"><i class="fa fa-close"></i></button></td>
		</tr>';
	}

	$tableContent=$head.$body.'</tbody>';

	return $tableContent;
	// while($res=$req->fetch(PDO::FETCH_ASSOC))
	// 	echo 'Nom : '.$res['nom'];
}