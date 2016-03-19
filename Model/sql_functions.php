<?php 
require_once('connection.php');


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
	$req=$db->prepare('select mdp from client where email=:mail');
	$req->bindValue(':mail',$mail);
	$req->execute();
	$res=$req->fetch(PDO::FETCH_NUM);

	return password_verify($password, $res[0]);
}

function mailExists($db,$mail)
{
	// echo "recherche du mail".$mail;
	$req=$db->prepare('select * from client where email=:mail');
	$req->bindValue(':mail',$mail);
	$req->execute();
	$res=$req->rowCount();

	return $res!=0 ? true : false;
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
	$_SESSION['lastname']=$res['nom'];
	$_SESSION['firstname']=$res['prenom'];
}