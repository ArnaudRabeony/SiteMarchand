<?php 


require_once(dirname(__FILE__) . '/../connection.php');

// htmlentities() on all $_POST/$_GET variables
function protectPostGet() 
{
	htmlentitiesArray($_POST);
	htmlentitiesArray($_GET);
}

function htmlentitiesArray (&$tab) 
{
	foreach($tab as $cle => &$value) {
		if (is_array($value))
			htmlentitiesArray($value);
		else
			$value = htmlentities($value);
	}
}

// $authorizedTypes is an array which contains types that are allowed to access the page
function pageRestriction($authorizedTypes)
{
	$access = false;
	$connected=isset($_SESSION) && count($_SESSION);

	if($connected)
	{
		$access = true;
		if (!(in_array($_SESSION['type'], $authorizedTypes)))
			$access = false;
	}
	else if (!($access) && !$connected)
		echo "<div class='alert alert-danger accessMessage' role='alert'>Vous n'êtes pas connecté(e)<br> <a href='index.php'>Accueil</a></div>";
	else
		echo "<div class='alert alert-danger accessMessage' role='alert'>Vous n'avez pas la permission d'acceder à ce contenu <br> <a href='index.php'>Accueil</a></div>";

	return $access;
}

 //Check that $_POST contains keys from $keys without empty values
function verifPost($keys) 
{
	foreach($keys as $v) {
		if (!(isset($_POST[$v]) and trim($_POST[$v]) != '')) {
			return false;
		}
	}
	return true;
}

 //Check that $_GET contains keys from $keys without empty values
function verifGet($keys) 
{
	foreach($keys as $v) {
		if (!(isset($_GET[$v]) and trim($_GET[$v]) != '')) {
			return false;
		}
	}
	return true;
}

function updateSessionBasket($productId,$size,$qty)
{
	$cptr=count($_SESSION['basketItems']);
	$newItem = array ('idProduit' => $productId , 'size' => $size,'qty' => $qty);
	$_SESSION['basketItems'][$cptr]=$newItem;

	// print_r($_SESSION['basketItems']);
	return count($_SESSION['basketItems']);
}

function totalBasketPrice($db)
{
	$price=0;

	foreach ($_SESSION['basketItems'] as $value) 
	{
		$product=getProductById($db,$value["idProduit"]);
		//print_r($product);
		$price+=$value["qty"]*$product[0]['prix'];
	}

	return $price;
}

function displayBasket($db)
{
	// print_r($_SESSION['basketItems']);
	foreach ($_SESSION['basketItems'] as $value) 
	{
		$product=getProductById($db,$value["idProduit"]);
		//print_r($product);

		echo '<div class="basketItem" data-productid="'.$value["idProduit"].'">
				<div id="removeFromBasketContainer">
					<i class="removeFromBasketButton material-icons" style="color:#ddd;float:right;cursor:pointer">clear</i>
				</div>
				<div class="row">
					<div class="col-md-4" style="text-align:center">
						<a href="index.php?page=view/productPage&ref='.$product[0]['idProduit'].'"><img src="images/'.$product[0]['photo'].'"></a>
						<h4><small><i>'.$product[0]['libelle'].'</i></small></h4>
					</div>
					<div class="col-md-4" id="sizeQuantityContainer">
					<table>
						<tr>
							<td><b>Taille</b></td>
							<td style="float:right;" class="chosenSize"> '.$value["size"].'</i></td>
						</tr>
						<tr>
							<td><b>Quantité</b></td>
							<td style="float:right;" class="chosenQty"> '.$value["qty"].'</td>
						</tr>
						<tr>
							<td><b>PU</b></td>
							<td style="float:right;"> '.$product[0]['prix'].' €</i></td>
						</tr>
					</table>
					</div>
					<div class="col-md-4" id="priceContainer"><b>Prix</b> <i> '.$value["qty"]*$product[0]['prix'].' €</i></div>
				</div>
				<hr style="margin:5px 0px !important;">
			</div>';
	}
}

// function isExisting($page)
// {
// 	$pagesArray=array(
// 				 "connection",
// 				 "soccer",
// 				 "customersManagement",
// 				 "co_page",
// 				 "deco_page",
// 				 "welcome",
// 				 "createAccount",
// 				 "check_co",
// 				);

// 	return in_array($page,$pagesArray);
// }
