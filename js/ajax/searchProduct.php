<?php 

require_once("../../connection.php");
require("../../model/functions.php");
require("../../model/produit.php");

$lastRow = '<tr>
						<td></td>
						<td><button id="downloadButton" class="btn btn-primary btn-sm"><a href="controller/download.php"><i class="fa fa-download"></i></a></button></td>
						<td></td>
						<td></td>
						<td></td>
						<td></td>
						<td></td>
						<td></td>
						<td><div class="multipleDeletion" style="float: right;">
								<button class="btn btn-sm" id="multipleDeletionButton" style="background-color: #A90000"><i class="fa fa-close" style="color:white;"></i></button>
							</div></td>
					</tr>';

if(verifGet(array("str","filter")))
{
	$filter=$_GET['filter'];
	$str=$_GET['str'];

	switch ($filter) {
		case 'all':
			echo displayProducts($db,array("libelle","idProduit","description","marque.nomMarque"),array($str),true).$lastRow;
			break;

		case 'ref':
			echo displayProducts($db,array("idProduit"),array(str_replace ("REF", "", $str)),true).$lastRow;
			break;

		case 'description':
			echo displayProducts($db,array("description"),array($str),true).$lastRow;
			break;

		case 'label':
			echo displayProducts($db,array("libelle"),array($str),true).$lastRow;
			break;

		case 'brand':
			echo displayProducts($db,array("marque.nomMarque"),array($str),true).$lastRow;
			break;
	}
}
else
	echo displayProducts($db,null,null,null).$lastRow;
?>