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
		{
			$access = false;
			echo '<div class="permissionDenied row shadow">'."<br><i class='material-icons'style='font-size:3em'>pan_tool</i>".'<br>'."Vous n'avez pas la permission d'accéder au contenu de cette page".'				
				<br><br><button class="btn btn-sm btn-primary" id="backToIndex"><a href="index.php" style="text-decoration:none;color:white;">Accueil</a></button>
			  </div>';
		}
	}
	else if (!($access) && !$connected)
	{
		echo '<div class="permissionDenied row shadow">'."<br><i class='material-icons' style='font-size:4em'>account_circle</i>".'<br>'."Vous n'êtes pas connecté(e)".'				
				<br><br><button class="btn btn-sm btn-primary" id="backToIndex"><a href="index.php" style="text-decoration:none;color:white;">Accueil</a></button>
			  </div>';
	}


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
		$product=getProductById($db,$value["idProduit"])[0];
		//print_r($product);
		$price+=$value["qty"]*$product['prix'];
	}

	return $price;
}

function displayBasket($db)
{
	// print_r($_SESSION['basketItems']);
	foreach ($_SESSION['basketItems'] as $value) 
	{
		$product=getProductById($db,$value["idProduit"])[0];
		//print_r($product);

		echo '<div class="basketItem" data-productid="'.$value["idProduit"].'">
				<div id="removeFromBasketContainer">
					<i class="removeFromBasketButton material-icons" style="color:#ddd;float:right;cursor:pointer">clear</i>
				</div>
				<div class="row">
					<div class="col-xs-4 col-md-4" style="text-align:center">
						<a href="index.php?page=view/productPage&ref='.$product['idProduit'].'"><img src="images/'.$product['photo'].'"></a>
						<h4><small><i>'.$product['libelle'].'</i></small></h4>
					</div>
					<div class="col-xs-4 col-md-4" id="sizeQuantityContainer">
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
							<td style="float:right;" class="uPrice"> '.$product['prix'].' €</i></td>
						</tr>
					</table>
					</div>
					<div class="col-xs-4 col-md-4" id="priceContainer"><b>Prix</b> <i> '.$value["qty"]*$product['prix'].' €</i></div>
				</div>
				<hr style="margin:5px 0px !important;">
			</div>';
	}
}

function filters($db)
{
	echo '<div class="row" id="filtersContainer">
            <button id="expandFilters" class="btn btn-sm btn-default">Filtres</button>
            <br>
            <i style="font-size:0.85em">Les combinaisons de filtres peuvent se faire en séléctionnant, dans un premier temps, une ou plusieurs catégories puis la ou les tailles désirées. </i>
            <div id="filtersGrid" class="col-md-12" style="margin-left:-15px;">
                <div id="categoryFiltersContainer" class="col-md-4 list-group">
                    <h4><small>Catégories</small></h4>';

                                $categories = getAllCategories($db);

                                foreach ($categories as $value)
                                	echo '<label class="list-group-item col-md-2" data-selected=false>'.$value['nomCategorie'].'</label>';

                         
                    
    echo       '</div>
                <div id="sizeFiltersContainer" class="col-md-8">
                    <h4><small>Tailles</small></h4>';

                                $sizes = getAllTaille($db);

                                foreach ($sizes as $value) 
                                	echo '<label class="list-group-item col-md-2" data-selected=false>'.$value['nomTaille'].'</label>';
                    
    echo '      </div>
    			<div id="priceFiltersContainer" class="col-md-4">
                    <h4><small>Prix</small></h4>
					  <p><input type="text" id="amount" readonly style="border:0; color:#36899E; font-weight:bold;"></p>
                   <div id="slider-range"></div>';                    
    echo '  	</div>
            </div> 
        </div>';
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
