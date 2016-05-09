<?php

require_once(dirname(__FILE__) . '/../model/stock.php');
// require_once("./model/stock.php");

// function filters($filterName, $filter)
// {
//     echo '<div class = "col-sm-4 client-filters"><select class = "form-control" name = ' . $filterName . '><option value="-1">'.ucfirst($filterName).'</option>';

//     foreach ($filter as $key => $value) 
//         echo '<option value="' . $value['id' . ucfirst($filterName)] . '">' . $value['nom' . ucfirst($filterName)] . '</option>';

//     echo '</select></div>';
// }

function displayProductList($db, $dataArray)
{
	foreach($dataArray as $key)
    {
        $photo= strpos($key['photo'], "./images/") !== false ? $key['photo'] : "./images/".$key['photo'];

        $sizesList="";
        $availableSizes = getStockByProductId($db,$key['idProduit']);
        // print_r($availableSizes);
        $cpt = 1;
        $sizesNb = count($availableSizes);  
        $displayCartIcon = true;

        if($sizesNb==0)
        {
            $sizesList="Aucune taille disponible";
            $displayCartIcon=false;
        }
        else
        {
            //$sizesList="S, M, L, XL";

            foreach ($availableSizes as $k => $value)
            {
                if($cpt != $sizesNb)
                    $sizesList.=$k.", ";
                else
                    $sizesList.=$k." ";

                $cpt++;
            }   
        }

        $selectSize='<select name="selectedSize" class="form-control col-md-6" id="selectedSize" style="margin-left:10px;padding:5px">';
        $sizes=getStockByProductId($db,$key['idProduit']);
        $selectSize.='<option value="notSelected">Taille</option>';
        foreach ($sizes as $sizeK => $value)
            $selectSize.='<option value="'.$sizeK.'">'.$sizeK.'</option>';
        $selectSize.='</select>';

        $selectQty='<select name="selectedQty" class="form-control col-md-6" id="selectedQty" style="margin-left:10px;padding:5px"><option value="notSelected">Qté</option>';
        $selectQty.='</select>';


        echo '
        <div class="col-xs-6 col-sm-4 client-side">
        	<div class="thumbnail" data-productid="'.$key['idProduit'].'">
               <img src="' . $photo . '"> 
               <div class="caption">
                 <h4 class="pull-right">' . $key['prix'] . ' €</h4>
                 <a href =index.php?page=view/productPage&ref='.$key['idProduit'].'> ' . $key['libelle'] . '</a>
                 <p>' . substr($key['description'], 0, 20) . '...</p>
                 <div class="availableSizes" style="margin-top:10px;">
                    <i>'.$sizesList.'</i>
                </div>';

                if($displayCartIcon && isset($_SESSION["id"]))
                    echo '<i class="toCartThumbnail fa fa-shopping-cart" style="cursor: pointer;color: rgb(150, 150, 150);margin-right: 55px;position: relative;top: 10px;"></i>';
                
                echo '
            </div>
            <div id="thumbnailOrder" style="height:100px;display:none">
                <div id="thumbnailOrderContainer" class="row col-md-12">
                    <div class="col-xs-6 col-md-6">'
                        .$selectSize.'
                    </div>
                    <div class="col-xs-6 col-md-6">'
                        .$selectQty.'
                    </div>
                    <button id="thumbnailOrderButton" class="btn btn-sm btn-success" style="margin:20px 60px;">Ajouter au panier</button>
                </div>
            </div>
            
        </div>
    </div>
    ';
}
}