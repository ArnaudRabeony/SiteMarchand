<?php 

$type="";
$errorMessage="";
$invalidMail="";
$firstname="";
$lastname="";
$address="";
$phone="";
if(isset($_GET['error']) && $_GET['error']=="true" && isset($_GET['errortype']))
{
	// print_r($_GET);
	$type=$_GET['errortype'];

	switch ($type) 
	{
		case 'usedEmail':
			$errorMessage="Cette adresse mail est déjà utilisée";
			break;

		case 'insert':
			$errorMessage="Erreur : Problème d'insertion dans la base de données";
			break;
	}


	$firstname=$_GET['firstname']!="" ? $_GET['firstname'] :"";
	$lastname=$_GET['lastname']!="" ? $_GET['lastname'] :"";
	$address=$_GET['address']!="" ? $_GET['address'] :"";
	$phone=$_GET['phone']!="" ? $_GET['phone'] :"";
}
?>


<div id="createAccount" class="col-md-offset-2">
	<div id="createAccountContent" class="row">
<h3><small>Veuillez remplir le formulaire d'inscription suivant</small></h3>

		<form action="index.php?page=controller/customersManagement" method="post" class="col-md-5 col-sm-3">
		    <input type="text" name="firstname" class="form-control" id="firstname" placeholder="Prénom" <?php echo "value=".$firstname; ?>>
		    <input type="text" name="lastname" class="form-control" id="lastname" placeholder="Nom" <?php echo "value=".$lastname; ?>>
		    <input type="email" name="email" class="form-control" id="email" placeholder="exemple@mail.com">
		    <input type="password" name="password" class="form-control" id="password" data-minlength="5" placeholder="Mot de passe">
		    <input type="password" name="confirmation" class="form-control" id="confirmation" data-minlength="5" data-match="#password" placeholder="Confirmation mot de passe"><span id="mismatch"></span>
			<textarea class="form-control" name="address" id="address" rows="2" placeholder="Adresse"><?php echo $address; ?></textarea>
		    <input type="tel" class="form-control" name="phone" id="phone" placeholder="01 23 45 65 78" <?php echo "value=".$phone; ?>>
		    <button class="btn btn-default" id="createAccountButton">Créer mon compte</button>
		</form>
	</div>
			<h4><small><i>Tous les champs sont requis</i></small></h4>
			<p class="errorMessage"><?php echo $errorMessage; ?></p>
</div>

<script src="js/jquery.js"></script>
<script src="js/createAccount.js"></script>

