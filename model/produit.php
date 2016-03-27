<?php

require_once('connection.php');
include('./model/categorie_produit.php');
include('./model/sport.php');
include('./model/marque.php');

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
	$req->bindValue(':idCategorie', $dataArray['categorie']);
	$req->bindValue(':idSport', $dataArray['sport']);
	$req->bindValue(':idMarque', $dataArray['marque']);
	$req->execute();

	$req=$db->prepare('select * from produit where libelle=:libelle and description=:description and prix=:prix and photo=:photo and idTaille=:idTaille and idCategorie=:idCategorie and idSport=:idSport and idMarque=:idMarque');
	$req->bindValue(':libelle', $dataArray['libelle']);
	$req->bindValue(':description', $dataArray['description']);
	$req->bindValue(':prix', $dataArray['prix']);
	$req->bindValue(':photo', $dataArray['photo']);
	$req->bindValue(':idTaille', $dataArray['taille']);
	$req->bindValue(':idCategorie', $dataArray['categorie']);
	$req->bindValue(':idSport', $dataArray['sport']);
	$req->bindValue(':idMarque', $dataArray['marque']);
	$req->execute();
	$res=$req->rowCount();

	return $res==1 ? true : false;
}

function addNewSingleProduct($db, $dataArray)
{
	$req = $db->prepare('insert into produit(libelle, description, prix, photo, idCategorie, idSport, idMarque)
							values(:libelle, :description, :prix, :photo, :idCategorie, :idSport, :idMarque)');
	$req->bindValue(':libelle', $dataArray['libelle']);
	$req->bindValue(':description', $dataArray['description']);
	$req->bindValue(':prix', $dataArray['prix']);
	$req->bindValue(':photo', $dataArray['photo']);
	$req->bindValue(':idCategorie', $dataArray['categorie']);
	$req->bindValue(':idSport', $dataArray['sport']);
	$req->bindValue(':idMarque', $dataArray['marque']);
	$req->execute();

	$req=$db->prepare('select * from produit where libelle=:libelle and description=:description and prix=:prix and photo=:photo and idCategorie=:idCategorie and idSport=:idSport and idMarque=:idMarque');
	$req->bindValue(':libelle', $dataArray['libelle']);
	$req->bindValue(':description', $dataArray['description']);
	$req->bindValue(':prix', $dataArray['prix']);
	$req->bindValue(':photo', $dataArray['photo']);
	$req->bindValue(':idCategorie', $dataArray['categorie']);
	$req->bindValue(':idSport', $dataArray['sport']);
	$req->bindValue(':idMarque', $dataArray['marque']);
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
	$res = $req->fetchAll();
    return $res;
}

function displayProducts($db)
{

	//------------------- /populates the categorie field -------------------
	$categorySelection='<select disabled class="form-control" id="selectType">';
	$categories=getAllCategories($db);

	$categoryCptr=1;
	foreach ($categories as $key => $value)
		$categorySelection.='<option value="'.$categoryCptr++.'">'.$value['nomCategorie'].'</option>';
	
	$categorySelection.='</select>';
	//------------------- populates the categorie field/ -------------------

	//------------------- /populates the sport field -------------------
	$sportSelection='<select disabled class="form-control" id="selectType">';
	$sports=getAllSports($db);

	$sportCptr=1;
	foreach ($sports as $key => $value)
		$sportSelection.='<option value="'.$sportCptr++.'">'.$value['nomSport'].'</option>';
	
	$sportSelection.='</select>';
	//------------------- populates the sport field/ -------------------


	$head="<thead class='thead-default'>
		<tr>
			<th></th>
			<th class='col-md-2 col-sm-2'>Catégorie</th>
			<th class='col-md-2 col-sm-2'>Sport</th>
			<th class='col-md-1 col-sm-1'>Ref</th>
			<th class='col-md-2 col-sm-2'>Marque</th>
			<th class='col-md-2 col-sm-1'>Libellé</th>
			<th class='col-md-1 col-sm-1'>Prix</th>
		</tr>
	</thead>";

	$req=$db->prepare('select * from produit');
	$req->execute();
	
	$body='<tbody>';
	$cptr=0;
	while($res=$req->fetch(PDO::FETCH_ASSOC))
	{
		$brand=getMarqueLabelByName($db,$res['idMarque']);
		$body.='<tr id="row'.$cptr++.'" class="secured">
		<td><a class="moreInfo btn btn-default btn-sm" style="display:none" href="index.php?page=view/createProduct&id='.$res['idProduit'].'"><i class="fa fa-ellipsis-h"></i></a></td>
		<td data-selection="'.$res['idCategorie'].'">'.$categorySelection.'</td>
		<td data-selection="'.$res['idSport'].'">'.$sportSelection.'</td>
		<td><input id="ref" disabled class="form-control" type="text" value="REF'.$res['idProduit'].'"</td>
		<td><input id="brand" disabled class="form-control" type="text" value="'.$brand.'"</td>
		<td><input id="label" disabled class="form-control" type="text" value="'.$res['libelle'].'"</td>
		<td><input id="price" disabled class="form-control" type="text" value="'.$res['prix'].'"</td>
		<td><button class="editButton btn btn-default btn-sm"><i class="fa fa-pencil"></i></button></td>
		<td><button class="deleteButton btn btn-default btn-sm"><i class="fa fa-close"></i></button></td>
		</tr>';
	}

	$tableContent=$head.$body.'</tbody>';

	return $tableContent;
	// while($res=$req->fetch(PDO::FETCH_ASSOC))
	// 	echo 'Nom : '.$res['nom'];
}

function getProductById($db,$id)
{
	$req = $db->prepare('select * from produit where idProduit = :id');
	$req->bindValue(':id', $id);
	$req->execute();
	$res = $req->fetchAll();
    return $res;
}