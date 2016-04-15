<?php 

require_once(dirname(__FILE__) . '/../connection.php');

header("Content-Type: text/csv; charset=UTF-8");
header('Content-Disposition: attachment; filename="produits.csv"');

$req = $db->prepare('select * from produit');
$req->execute();
?>id;libelle;marque;description;sport;categorie;prix;taille;image<?php
while($res=$req->fetch(PDO::FETCH_ASSOC))
{
	echo "\n".$res['idProduit'].";".$res['libelle'].";".$res['idMarque'].";".$res['description'].";".$res['idSport'].";".$res['idCategorie'].";".$res['prix'].";".$res['idTaille'].";".$res['photo'];
}

?>