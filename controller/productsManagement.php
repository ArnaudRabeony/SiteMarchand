<?php 
require_once(dirname(__FILE__) . '/../model/sport.php');
// print_r($_FILES);
if(verifPost(array("category","sport","price","label","description","brand")))
{
	print_r($_POST);
	$category=$_POST['category'];
	$sport=$_POST['sport'];
	$price=$_POST['price'];
	$label=$_POST['label'];
	$description=$_POST['description'];
	$brand=$_POST['brand'];

	$sportLabel=getSportById($db,$sport);

	if($_FILES['selectedImage']['error']>0)
		echo "error image";
	else
	{
		// echo "TODO : add into db";
		//Save on the server
		$to ="./images/".$sportLabel."/".$_FILES['selectedImage']['name'];
		move_uploaded_file($_FILES['selectedImage']['tmp_name'], $to);	 
		echo "uploaded"; 

 		$productArray=array( 'libelle'     => $label,
                             'description' => $description,
                             'prix'        => $price,
                             'photo'       => $to,
                             'categorie'   => $category,
                             'sport'       => $sport,
                             'marque'      => $brand
                             );

 		// $sizes=array(
 		// 		''
 		// 	);

        if(addNewSingleProduct($db, $productArray/*,$sizes)*/))
			header('location: index.php?page=view/manageProducts');		
		else
			echo "error";
        // echo addNewSingleProduct($db,$productArray);
	}
}
else
	echo "error";