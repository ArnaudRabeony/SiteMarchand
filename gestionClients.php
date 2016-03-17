
<?php 

require_once('connexion.php');
require_once('fonctions.php');

if(isset($_POST['email']) && isset($_POST['firstname']) && isset($_POST['lastname']) && isset($_POST['password']) && isset($_POST['address']) && isset($_POST['phone']))
{
	$email= trim($_POST['email'])!="" ? $_POST['email'] : "undefined";
	$firstname=trim($_POST['firstname'])!="" ? $_POST['firstname'] :"undefined";
	$lastname=trim($_POST['lastname'])!="" ? $_POST['lastname'] : "undefined";
	$password= trim($_POST['password'])!="" ? $_POST['password'] : "undefined";
	$address=trim($_POST['address'])!="" ? $_POST['address'] : "undefined";
	$phone=trim($_POST['phone'])!="" ? $_POST['phone'] : "undefined";

	addCustomer($db,$_POST['email'],$_POST['lastname'],$_POST['firstname'],$_POST['password'],$_POST['address'],$_POST['phone']);	
}	

	


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
	
// displayCustomers($db);

 ?>

<br>
<a class="btn btn-default" href="accueil.php">Accueil</a>