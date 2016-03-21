<?php 

$type="";
$errorMessage="";
$invalidMail="";
if(isset($_GET['error']) && $_GET['error']=="true" && isset($_GET['errortype']))
{
	$type=$_GET['errortype'];

	switch ($type) 
	{
		case 'existed':
			$errorMessage="Aucun utilisateur n'existe avec cette adresse";
			break;

		case 'matched':
			$errorMessage="Erreur mot de passe";
			break;
	}
}

 ?>

<div id="connectionContainer" class="col-md-offset-2">
	<div id="connectionContent" class="row">
		<h3><small>Saisissez vos identifiants</small></h3>

		<form action="index.php?page=controller/check_co" method="post" class="col-md-5 col-sm-3" novalidate>
		    <input type="email" class="form-control" name="email" id="email" placeholder="exemple@mail.com">
		    <input type="password" class="form-control" name="password" id="password" placeholder="Mot de passe">	
		   	<button class="btn btn-default" type="submit">Connexion</button>
		</form>
	</div>
<br>
<p class="errormessage" style="color:red"><?php echo $errorMessage; ?></p>
		<a href="#">Mot de passe oublié ?</a><br>
		<a href="index.php?page=view/createAccount">Vous n'avez pas encore de compte ?</a>
</div>

<script src="js/jquery.js"></script>
<script src="js/page_co.js"></script>
