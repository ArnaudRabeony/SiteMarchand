<?php 

require_once(dirname(__FILE__) . '/../model/sport.php');
require_once(dirname(__FILE__) . '/../model/produit.php');
require_once(dirname(__FILE__) . '/../controller/sportController.php');
require_once(dirname(__FILE__) . '/../view/clientProducts.php');

?>
			<form class="form-inline">
			<div id="searchContainer" class="form-inline col-md-6">
				<div class="form-group ">
					<select class="form-control col-md-2" name="searchBy" id="searchBy">
						<option value="all">Tout</option>
						<option value="ref">Référence</option>
						<option value="brand">Marque</option>
						<option value="label">Libelle</option>
					</select>
				</div>
				<div class="form-group">
					<input type="text" class="form-control" id="searchInBase" name="searchInBase" placeholder="Nike, 45, Maillot...">
			    </div>
			</div><br><br>
			</form>
<?php 
	// $footballArray = getSportProducts($db, 'Football');
 //    displayProductList($db, $footballArray);
 //    $basketballArray = getSportProducts($db, 'Basketball');
 //    displayProductList($db, $basketballArray);

if(verifGet(array("filter")))
{
	$brands = getAllMarques($db);
	$sports = getAllSports($db);

	$filterType="N/A";

	foreach ($brands as $value)
	{
		if(trim($value['nomMarque']) === trim($_GET['filter']))
			$filterType="brand";
	}

	foreach ($sports as $value)
	{
		if(trim($value['nomSport']) === trim($_GET['filter']))
			$filterType="sport";
	}

	$array=[];

	switch ($filterType)
	{
		case 'brand':
				$brand = $_GET['filter'];
				$brandId = getIdMarqueByName($db,$brand);
				$array = getProductByBrandId($db, $brandId);
			break;

		case 'sport':
				$sport = $_GET['filter'];
				$sportId = getIdSportByName($db,$sport);
				$array = getProductBySportId($db, $sportId);
			break;
	}

	displayProductList($db, $array);

}
?>