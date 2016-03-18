<?php 
require_once('connection.php');
// Permet d'appliquer htmlentities() à toutes les variables $_POST et $_GET
function protectPostGet() {
	htmlentitiesArray($_POST);
	htmlentitiesArray($_GET);
}

function htmlentitiesArray (&$tab) {
	foreach($tab as $cle => &$value) {
		if (is_array($value))
			htmlentitiesArray($value);
		else
			$value = htmlentities($value);
	}
}

function isExisting($page)
{
	$pagesArray=array(
				 "connection",
				 "soccer",
				 "customersManagement",
				 "co_page",
				 "deco_page",
				 "welcome",
				 "createAccount",
				 "check_co",
				);

	return in_array($page,$pagesArray);
}


function addCustomer($db,$email,$lastname,$firstname,$password,$address,$phone)
{
	$req=$db->prepare('insert into client(email, nom, prenom, mdp, adresse, telephone) values(:mail,:lastname,:firstname,:password,:address,:phone)');
	$req->bindValue(':mail',$email);
	$req->bindValue(':lastname',$lastname);
	$req->bindValue(':firstname',$firstname);
	$req->bindValue(':password',$password);
	$req->bindValue(':address',$address);
	$req->bindValue(':phone',$phone);
	$req->execute();

	//check if the insert is ok
	return mailExists($db,$email);
}

function displayCustomers($db)
{
	$req=$db->prepare('select * from client');
	$req->execute();

	while($res=$req->fetch(PDO::FETCH_ASSOC))
		echo 'Nom : '.$res['nom'];
}

function customerConnection($db,$mail,$password)
{
	$req=$db->prepare('select * from client where email=:mail && mdp=:password');
	$req->bindValue(':mail',$mail);
	$req->bindValue(':password',$password);
	$req->execute();
	$res=$req->rowCount();

	return $res==1 ? true : false;
}

function mailExists($db,$mail)
{
	$req=$db->prepare('select * from client where email=:mail');
	$req->bindValue(':mail',$mail);
	$req->execute();
	$res=$req->rowCount();

	return $res==1 ? true : false;
}

function isAdmin($db,$mail)
{
	$req=$db->prepare('select type from client where email=:mail');
	$req->bindValue(':mail',$mail);
	$req->execute();
	$res=$req->fetch(PDO::FETCH_NUM);

	return $res[0]=="admin" ? true : false;
}

function setSession($db,$mail)
{
	$req=$db->prepare('select * from client where email=:mail');
	$req->bindValue(':mail',$mail);
	$req->execute();
	$res=$req->fetch(PDO::FETCH_ASSOC);

	$_SESSION['id']=$res['idClient'];
	$_SESSION['type']=$res['type'];
	$_SESSION['email']=$mail;
	$_SESSION['nom']=$res['nom'];
	$_SESSION['prenom']=$res['prenom'];
}



?>