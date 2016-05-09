<?php 

require_once(dirname(__FILE__) . '/../connection.php');
require_once(dirname(__FILE__) . '/../model/functions.php');
require_once(dirname(__FILE__) . '/../model/produit.php');

header("Content-Type: text/csv; charset=UTF-8");
header('Content-Disposition: attachment; filename="produits.csv"');

if(verifGet(array("str","filter")))
{
	$filter=$_GET['filter'];
	$str=$_GET['str'];

	switch ($filter) {
		case 'all':
			productsToCsv($db,array("libelle","idProduit","description","marque.nomMarque"),array($str),true);//.$lastRow;
			break;

		case 'ref':
			productsToCsv($db,array("idProduit"),array(str_replace ("REF", "", $str)),true);//.$lastRow;
			break;

		case 'description':
			productsToCsv($db,array("description"),array($str),true);//.$lastRow;
			break;

		case 'label':
			productsToCsv($db,array("libelle"),array($str),true);//.$lastRow;
			break;

		case 'brand':
			productsToCsv($db,array("marque.nomMarque"),array($str),true);//.$lastRow;
			break;
	}
}
else
	productsToCsv($db,null,null,null);

?>

