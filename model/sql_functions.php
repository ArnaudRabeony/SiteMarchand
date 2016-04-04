<?php 

$root = realpath($_SERVER["DOCUMENT_ROOT"]);

// require_once("$root/SiteMarchand/connection.php");


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

function displayCustomers($db,$id)
{

	$head="<thead class='thead-default'>
		<tr>
			<th>Type</th>
			<th>Nom</th>
			<th>Prénom</th>
			<th>Mail</th>
			<th></th>
			<th></th>
		</tr>
	</thead>";

	$req=$db->prepare('select * from client where idClient!=:id');
	$req->bindValue(":id",$id);
	$req->execute();
	
	$body='<tbody>';

	while($res=$req->fetch(PDO::FETCH_ASSOC))
	{
		$initWithClient = $res['type']=="client" ? "selected" : "";
		$initWithAdmin = $res['type']=="admin" ? "selected" : "";

		$body.='<tr id="row'.$res['idClient'].'" class="secured">
		<td>
		<select disabled class="form-control" id="selectType">
		    <option value="admin"'.$initWithAdmin.' >admin</option>
		    <option value="client"'.$initWithClient.' >client</option>
		</select></td>
	<td><input id="newLastname" disabled class="form-control" type="text" value="'.$res['nom'].'"</td>
	<td><input id="newFirstname" disabled class="form-control" type="text" value="'.$res['prenom'].'"</td>
	<td><input id="newEmail" disabled class="form-control" type="email" value="'.$res['email'].'"</td>
	<td><button class="editButton btn btn-default btn-sm"><i class="fa fa-pencil"></i></button></td>
	<td><button class="deleteButton btn btn-default btn-sm"><i class="fa fa-close"></i></button></td>
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
	$_SESSION['basketItemsNumber']=0;
}

function updateSession()
{
	$_SESSION['basketItemsNumber']+=1;
	return $_SESSION['basketItemsNumber'];
}

function updateCustomer($db,$id,$type,$lastname,$firstname,$email)
{
	//can't add an existing email
	// if(mailExists($db,$email))
	// 	return false;

	$req=$db->prepare('update client set type=:type, nom=:lastname, prenom=:firstname, email=:email where idClient=:id');
	$req->bindValue(':type',$type);
	$req->bindValue(':lastname',$lastname);
	$req->bindValue(':firstname',$firstname);
	$req->bindValue(':email',$email);
	$req->bindValue(':id',$id);
	$req->execute();

	$req=$db->prepare('select * from client where type=:type and nom=:lastname and prenom=:firstname and email=:email and idClient=:id');
	$req->bindValue(':type',$type);
	$req->bindValue(':lastname',$lastname);
	$req->bindValue(':firstname',$firstname);
	$req->bindValue(':email',$email);
	$req->bindValue(':id',$id);
	$req->execute();
	$res=$req->rowCount();

	return $res==1 ? true : false;
}

function getCustomerById($db,$id)
{
	// echo "recherche du mail".$mail;
	$req=$db->prepare('select * from client where idClient=:id');
	$req->bindValue(':id',$id);
	$req->execute();
	$resultNb=$req->rowCount();

	if($resultNb==1)
	{
		$res=$req->fetch(PDO::FETCH_ASSOC);
		return array('nom' => $res["nom"],
						'prenom' => $res["prenom"],
						'adresse' => $res["adresse"],
						'telephone' => $res["telephone"],
						'email' => $res["email"]);

	}

	return null;
}

function deleteUserById($db,$id)	
{
	$req=$db->prepare('delete from client where idClient=:id');
	$req->bindValue(':id',$id);
	$req->execute();

	return $getCustomerById($db,$id)==null ? true : false;
}

function oneselfUpdate($db,$id,$lastname,$firstname,$email,$address,$phone)
{
	//can't add an existing email
	// if(mailExists($db,$email))
	// 	return false;

	$req=$db->prepare('update client set adresse=:address, telephone=:phone, nom=:lastname, prenom=:firstname, email=:email where idClient=:id');
	$req->bindValue(':address',$address);
	$req->bindValue(':phone',$phone);
	$req->bindValue(':lastname',$lastname);
	$req->bindValue(':firstname',$firstname);
	$req->bindValue(':email',$email);
	$req->bindValue(':id',$id);
	$req->execute();

	$req=$db->prepare('select * from client where adresse=:address and telephone=:phone and nom=:lastname and prenom=:firstname and email=:email and idClient=:id');
	$req->bindValue(':address',$address);
	$req->bindValue(':phone',$phone);
	$req->bindValue(':lastname',$lastname);
	$req->bindValue(':firstname',$firstname);
	$req->bindValue(':email',$email);
	$req->bindValue(':id',$id);
	$req->execute();
	$res=$req->rowCount();

	return $res==1 ? true : false;
}
