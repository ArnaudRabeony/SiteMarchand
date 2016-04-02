<?php

require_once('./connection.php');
require('categorie_produit.php');
require('sport.php');
require('marque.php');

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
	$head="<thead class='thead-default'>
		<tr>
			<th></th>
			<th>Ref</th>
			<th>Marque</th>
			<th>Libellé</th>
			<th>Description</th>
			<th>Prix</th>
		</tr>
	</thead>";

	$req=$db->prepare('select * from produit');
	$req->execute();
	
	$body='<tbody>';
	$cptr=0;
	while($res=$req->fetch(PDO::FETCH_ASSOC))
	{
		$brand=getMarqueLabelByName($db,$res['idMarque']);
		$body.='<tr id="row'.$res['idProduit'].'" class="secured">
		<td><a class="moreInfo btn btn-default btn-sm" style="display:none" href="index.php?page=view/createProduct&id='.$res['idProduit'].'"><i class="fa fa-ellipsis-h"></i></a></td>
		<td><input id="ref" disabled class="form-control" type="text" value="REF'.$res['idProduit'].'"</td>
		<td><input id="brand" disabled class="form-control" type="text" value="'.$brand.'"</td>
		<td><input id="label" disabled class="form-control" type="text" value="'.$res['libelle'].'"</td>
		<td><textarea class="form-control" name="description" id="description" rows=1 disabled style="font-size:13px;">'.$res['description'].'</textarea></td>
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

function updateProduct($db,$id,$libelle,$description,$prix)
{
	$req = $db->prepare('update produit set libelle=:libelle, description=:description, prix=:prix where idProduit=:id');
	$req->bindValue(':id', $id);
	$req->bindValue(':libelle', $libelle);
	$req->bindValue(':description', $description);
	$req->bindValue(':prix', $prix);
	$req->execute();

	$req = $db->prepare('select * from produit where libelle=:libelle and description=:description and prix=:prix and idProduit=:id');
	$req->bindValue(':id', $id);
	$req->bindValue(':libelle', $libelle);
	$req->bindValue(':description', $description);
	$req->bindValue(':prix', $prix);
	$req->execute();
	$res=$req->rowCount();

	return $res==1 ? true : false;
}

function deleteProduct($db,$id)
{
	$req=$db->prepare("delete from produit where idProduit=:id");
	$req->bindValue(":id",$id);
	$req->execute();

	$req=$db->prepare("select * from produit where idProduit=:id");
	$req->bindValue(":id",$id);
	$req->execute();
	$res=$req->rowCount();

	return $res==0 ? true : false;
}

function displayProductList($db, $dataArray)
{
	foreach($dataArray as $key)
    {
    	echo '
    	<div class="col-md-4 col-xs-6">
        	<div class="thumbnail">
            	<img src="./images/' . $key['photo'] . '"> 
                <div class=caption>
                   <h4 class=pull-right>' . $key['prix'] . ' €</h4>
                   <a href =index.php?page=view/productPage&ref='.$key['idProduit'].'> ' . $key['libelle'] . '</a>
                    <p>' . substr($key['description'], 0, 20) . '...</p>
                    <div class="availableSizes" style="margin-top:10px;">
                    	<i class="toCartThumbnail fa fa-shopping-cart" style="cursor:pointer;display:none;color:#969696;margin-right:50px;"></i>
                        <i>Tailles disponibles : S, M</i>
                    </div>
                </div>
            </div>
        </div>';
	}
}

// function used in all the sport pages
// @param $images an array containing the images for the carousel
/*function displayCarousel($images)
{
	echo "
<div class=col-md-12>
                    <div class=row carousel-holder>
                        <div class=col-md-12>
                            <div id=carousel-example-generic class=carousel slide data-ride=carousel>
                                <ol class=carousel-indicators>
                                    <li data-target=#carousel-example-generic data-slide-to=0 class=active></li>
                                    <li data-target=#carousel-example-generic data-slide-to=1></li>
                                    <li data-target=#carousel-example-generic data-slide-to=2></li>
                                </ol>
                                <div class=carousel-inner>
                                    <div class=item active>
                                        <img class=slide-image src=http://placehold.it/800x300 alt=>
                                    </div>
                                    <div class=item>
                                        <img class=slide-image src=http://placehold.it/800x300 alt=>
                                    </div>
                                    <div class=item>
                                        <img class=slide-image src=http://placehold.it/800x300 alt=>
                                    </div>
                                </div>
                                <a class=left carousel-control href=#carousel-example-generic data-slide=prev>
                                    <span class=glyphicon glyphicon-chevron-left></span>
                                </a>
                                <a class=right carousel-control href=#carousel-example-generic data-slide=next>
                                    <span class=glyphicon glyphicon-chevron-right></span>
                                </a>
                            </div>
                        </div>
                    </div>

                    <div class=row>";
}*/