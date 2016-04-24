<?php 
 require_once('../../model/functions.php');
 require_once('../../model/produit.php');

	session_start();

if(verifGet(array("id","size","qty")))
{
	//get the key related to the productId and delete it

	$id=trim($_GET['id']);
	$size=trim($_GET['size']);
	$qty=trim($_GET['qty']);

	// print_r($_SESSION['basketItems']);

	// print_r($_GET);

	foreach ($_SESSION['basketItems'] as $index => $array)
	{
		if($array['idProduit']==$id)
			if($array['size']==$size)
				if($array['qty']==$qty)
					unset($_SESSION['basketItems'][$index]);
	}

	// print_r($_SESSION['basketItems']);	

	echo json_encode(array("nb" => count($_SESSION['basketItems']), "price" => strval(totalBasketPrice($db))));
}
else
{
	foreach ($_SESSION['basketItems'] as $index => $array)
		unset($_SESSION['basketItems'][$index]);
}
?>