
<?php 

require_once('connexion.php');
require_once('fonctions.php');

	$email= isset($_GET['email']) && trim($_GET['email'])!="" ? $_GET['email'] : NULL;
	$firstname= isset($_GET['firstname']) && trim($_GET['firstname'])!="" ? $_GET['firstname'] : NULL;
	$lastname= isset($_GET['lastname']) && trim($_GET['lastname'])!="" ? $_GET['lastname'] : NULL;
	$password= isset($_GET['password']) && trim($_GET['password'])!="" ? $_GET['password'] : NULL;
	$address= isset($_GET['address']) && trim($_GET['address'])!="" ? $_GET['address'] : NULL;
	$phone= isset($_GET['phone']) && trim($_GET['phone'])!="" ? $_GET['phone'] : NULL;

	

	// addCustomer($db,$_POST['email'],$_POST['lastname'],$_POST['firstname'],$_POST['password'],$_POST['address'],$_POST['phone']);

// echo 'Ajout bd';


// $req=$db->prepare('insert into client(type, email, nom, prenom, mdp, adresse, telephone) values("client",:email,:lastname,:firstname,:password,:address,:phone)');
// $req->execute(array(
// 	'email'=>$email,
// 	'lastname'=>$lastname,
// 	'firstname'=>$firstname,
// 	'password'=>$password,
// 	'address'=>$address,
// 	'phone'=>$phone,
// 	));
	
displayCustomers($db);

 ?>

<br>
<a class="btn btn-default" href="accueil.php">Accueil</a>