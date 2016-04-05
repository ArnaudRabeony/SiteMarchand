<?php 


$root = realpath($_SERVER["DOCUMENT_ROOT"]);

// include("$root/SiteMarchand/connection.php");

// include('../connection.php');
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

function updateSessionBasket($productId)
{
	$cptr=count($_SESSION['basketItems']);
	$_SESSION['basketItems'][$cptr]=$productId;
	return count($_SESSION['basketItems']);
}

function displayBasket($db)
{
	// print_r($_SESSION['basketItems']);
	foreach ($_SESSION['basketItems'] as $value) 
	{
		$product=getProductById($db,$value);
		print_r($product);

		echo '<div class="basketItem" data-productid="'.$value.'">
				<div id="removeFromBasketContainer">
					<i class="removeFromBasketButton material-icons" style="color:#ddd;float:right;cursor:pointer">clear</i>
				</div>
				<div class="row">
					<div class="col-md-4" style="text-align:center">
						<a href="index.php?page=view/productPage&ref='.$product[0]['ref'].'"><img src="images/'.$product[0]['photo'].'"></a>
						<h4><small><i>'.$product[0]['libelle'].'</i></small></h4>
					</div>
					<div class="col-md-4" id="sizeQuantityContainer">
					<table>
						<tr>
							<td><b>Taille</b></td>
							<td><i>TODO : Get Size</i></td>
						</tr>
						<tr>
							<td><b>Quantité</b></td>
							<td>TODO : Get Qty</td>
						</tr>
					</table>
					</div>
					<div class="col-md-4" id="priceContainer"><b>Prix</b> <i>TODO : price*qty</i></div>
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
