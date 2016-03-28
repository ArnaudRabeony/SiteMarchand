<?php

require_once('./model/connection.php');



$productData = getProductById($db, $_GET['ref']);

// the product doesn't exist
if(!$productData)
	header('Location: index.php');


echo '<h2>' . $productData[0]['libelle'] . '</h2><br>';

echo '<img src = images/' .  $productData[0]['photo'] . '> &nbsp';

echo $productData[0]['prix'] . ' € <br><br>';

echo $productData[0]['description'];