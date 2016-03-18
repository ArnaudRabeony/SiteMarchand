<?php 

$type="";
$errorMessage="";
$invalidMail="";
if(isset($_GET['error']) && $_GET['error']=="true" && isset($_GET['errortype']))
{
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
}

 ?>


<div id="createAccount" class="col-md-offset-2">
	<div id="createAccountContent" class="row">
<h3><small>Veuillez remplir le formulaire d'inscription suivant</small></h3>

		<form action="customersManagement.php" method="post" class="col-md-5 col-sm-3">
		    <input type="text" name="firstname" class="form-control" id="firstname" placeholder="Prénom">
		    <input type="text" name="lastname" class="form-control" id="lastname" placeholder="Nom">
		    <input type="email" name="email" class="form-control" id="email" placeholder="exemple@mail.com">
		    <input type="password" name="password" class="form-control" id="password" data-minlength="5" placeholder="Mot de passe">
		    <input type="password" name="confirmation" class="form-control" id="confirmation" data-minlength="5" data-match="#password" placeholder="Confirmation mot de passe"><span id="mismatch" style="font-size:10px;color:red;position: relative;top: -5px;"></span>
			<textarea class="form-control" name="address" id="address" rows="2" placeholder="Adresse"></textarea>
		    <input type="tel" class="form-control" name="phone" id="phone" placeholder="01 23 45 65 78">
		    <button class="btn btn-default" id="createAccountButton">Créer mon compte</button>
		</form>
	</div>
			<h4><small><i>Tous les champs sont requis</i></small></h4>
</div>
<p class="errormessage" style="color:red"><?php echo $errorMessage; ?></p>

<script src="js/jquery.js"></script>
<script src="js/createAccount.js"></script>

