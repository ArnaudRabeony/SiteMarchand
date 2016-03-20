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

	$head="<thead>
		<tr>
			<th>Type</th>
			<th>Nom</th>
			<th>Prénom</th>
			<th>Mail</th>
			<th></th>
			<th></th>
		</tr>
	</thead>";

	$cptr=0;
	$req=$db->prepare('select * from client');
	$req->execute();
	
	$body='<tbody>';

	while($res=$req->fetch(PDO::FETCH_ASSOC))
	{
		$initWithClient = $res['type']=="client" ? "selected" : "";
		$initWithAdmin = $res['type']=="admin" ? "selected" : "";

		$lineNumber=$cptr++;
		$body.='<tr id="row'.$lineNumber.'" class="editRow" style="display:none">
		<td>
		<select disabled class="form-control" id="selectType">
		    <option '.$initWithAdmin.' >admin</option>
		    <option '.$initWithClient.' >client</option>
		</select></td>
	<td><input disabled class="form-control" type="text" value="'.$res['nom'].'"</td>
	<td><input disabled class="form-control" type="text" value="'.$res['prenom'].'"</td>
	<td><input disabled class="form-control" type="text" value="'.$res['email'].'"</td>
	<td><button class="editButton btn btn-default btn-sm">Éditer</button></td>
	<td><button class="deleteButton btn btn-default btn-sm">Supprimer</button></td>

	</tr>
	<tr id="row'.$lineNumber.'" class="displayRow">
		<td>'.$res['type'].'</td>
	<td>'.$res['nom'].'</td>
	<td>'.$res['prenom'].'</td>
	<td>'.$res['email'].'</td>
	<td><button class="editButton btn btn-default btn-sm">Éditer</button></td>
	<td><button class="deleteButton btn btn-default btn-sm">Supprimer</button></td>
	</tr>';
	}
	

	$tableContent=$head.$body.'</tbody>';

	return $tableContent;
	// while($res=$req->fetch(PDO::FETCH_ASSOC))
	// 	echo 'Nom : '.$res['nom'];
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