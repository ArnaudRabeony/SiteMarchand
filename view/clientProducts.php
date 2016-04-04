<?php

function displayProductList($db, $dataArray)
{
	foreach($dataArray as $key)
    {
    	echo '
    	<div class="col-sm-4">
        	<div class="thumbnail">
            	<img src="./images/' . $key['photo'] . '"> 
                <div class=caption>
                   <h4 class=pull-right>' . $key['prix'] . ' €</h4>
                   <a href =index.php?page=view/productPage&ref='.$key['idProduit'].'> ' . $key['libelle'] . '</a>
                    <p>' . substr($key['description'], 0, 20) . '...</p>
                    <div class="availableSizes">
                        <i>Tailles disponibles : S, M</i>
                    </div>
                </div>
				
            </div>
        </div>';
	}
}