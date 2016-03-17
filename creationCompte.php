<div id="createAccount" class="col-md-offset-2">
	<div id="createAccountContent" class="row">
<h3><small>Veuillez remplir ce formulaire d'inscription</small></h3>

		<form action="gestionClients.php" method="post" class="col-md-5 col-sm-3">
		    <input type="text" name="firstname" class="form-control" id="firstname" placeholder="Prénom">
		    <input type="text" name="lastname" class="form-control" id="lastname" placeholder="Nom">
		    <input type="email" name="email" class="form-control" id="email" placeholder="exemple@mail.com">
		    <input type="password" name="password" class="form-control" id="password" data-minlength="5" placeholder="Mot de passe">
		    <input type="password" name="confirmation" class="form-control" id="confirmation" data-minlength="5" data-match="#password" placeholder="Confirmation mot de passe">
			<textarea class="form-control" name="adresse" id="adresse" rows="2" placeholder="Adresse"></textarea>
		    <input type="tel" class="form-control" name="phone" id="phone" placeholder="01 23 45 65 78">
		    <button class="btn btn-default" id="createAccountButton" type="submit">Créer mon compte</button>
		</form>
	</div>
</div>