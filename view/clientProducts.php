<?php

function filters($filterName, $filter)
{
    echo '<div class = "col-sm-4 client-filters"><select class = "form-control" name = ' . $filterName . '><option = 1> Sélectionnez un(e) ' . $filterName .'</option>';
    foreach ($filter as $key => $value) 
        echo '<option = ' . $value['id' . ucfirst($filterName)] . '>' . $value['nom' . ucfirst($filterName)] . '</option>';
    echo '</select></div>';
}

function displayProductList($db, $dataArray)
{
	foreach($dataArray as $key)
    {
        $photo= strpos($key['photo'], "./images/") !== false ? $key['photo'] : "./images/".$key['photo'];

    	echo '
    	<div class="col-sm-4 client-side">
        	<div class="thumbnail" data-productid="'.$key['idProduit'].'">
            	<img src="' . $photo . '"> 
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