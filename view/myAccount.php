<div class="myAccountDisplayContainer" style="/*background-color: red;*/padding:10px 10px;">
<p>
	<h3><small>Cette page vous permet de gérer les informations relatives à votre compte.</small></h3>
	 Ainsi, vous avez la possibilité de mettre à jour les différents champs. Pour cela, il vous suffit de survoler le champ à modifier puis cliquer sur le bouton d'édition.
</p><hr>
<?php $user=getCustomerById($db,$_SESSION["id"]);?>
	<div class="formContainer col-md-4">
	<h4><small>Vos informations </small></h4>
		<form action="controller/myAccount.php" method="post" novalidate>
			<table id="myAccountTable" <?php echo "data-id='".$_SESSION["id"]."'"; ?>>
				<tbody>
					<tr>
						<td><input disabled type="text" name="firstname" class="form-control" id="newfirstname" placeholder="Prénom" <?php echo "value=".$user["prenom"]; ?>></td>
						<td><button class="edit btn btn-default"><i class="fa fa-pencil"></i></button></td>
					</tr>
					<tr>
						<td><input disabled type="text" name="lastname" class="form-control" id="newlastname" placeholder="Nom" <?php echo "value=".$user["nom"]; ?>></td>
						<td><button class="edit btn btn-default"><i class="fa fa-pencil"></i></button></td>
					</tr>
					<tr>
						<td><input disabled type="email" name="email" class="form-control" id="newemail" placeholder="exemple@mail.com" <?php echo "value=".$user["email"]; ?>></td>
						<td><button class="edit btn btn-default"><i class="fa fa-pencil"></i></button></td>
					</tr>
					<tr>
						<td><textarea disabled class="form-control" name="address" id="newaddress" rows="2" placeholder="Adresse"><?php echo $user["adresse"]; ?></textarea></td>
						<td><button class="edit btn btn-default"><i class="fa fa-pencil"></i></button></td>
					</tr>
					<tr>
						<td><input disabled type="tel" class="form-control" name="phone" id="newphone" placeholder="01 23 45 65 78" <?php echo "value=".$user["telephone"]; ?>></td>
						<td><button class="edit btn btn-default"><i class="fa fa-pencil"></i></button></td>
					</tr>
				</tbody>
			</table>
		</form>
		<div class="buttonsContainer"><br>
			<button id="discardChanges" class="btn btn-default btn-sm" ><a href="index.php?page=view/myAccount">Annuler</a></button>
			<button id="saveChanges" class="btn btn-default btn-sm" disabled>Sauvegarder</button>
			<!--<button id="addCustomer" class="btn btn-default btn-sm"><i class="fa fa-user-plus" style="color:#28497D;"></i></button>-->
		</div>
	</div>
	<div class="otherChanges col-md-8">
		<div id="passwordContainer">
			<div id="changePasswordContainer">
				<p>
					<h3><small>Je souhaite changer de mot de passe</small></h3>
						<div>
							Le changement de mot de passe s'effectuera après avoir saisi et confirmé votre mot de passe actuel et renseigné un nouveau mot de passe.
						</div>
					<button id="changePassword" class="btn btn-default btn-sm col-offset-sm-3">Changer mon mot de passe</button>
				</p>
			</div>
			<div id="changePasswordContainerForm" style="display:none"><br>
				<span class="errorMessage"></span>
					<form action="controller/myAccount.php" method="post" novalidate>
						<table id="myAccountTable">
							<tbody>
								<tr>
									<td><input type="password" name="currentPassword" class="form-control" id="currentPassword" placeholder="Mot de passe"></td>
								</tr>
								<tr>
									<td><input type="password" name="currentPasswordConfirmation" class="form-control" id="currentPasswordConfirmation" placeholder="Confirmation mot de passe" ></td>
								</tr>
								<tr>
									<td><input type="password" name="newPassword" class="form-control" id="newPassword" placeholder="Nouveau mot de passe"></td>
								</tr>
							</tbody>
						</table>
					<button id="confirmPasswordUpdateButton" class="btn btn-default btn-sm col-offset-sm-3">Je change mon mot de passe</button>
					</form>
			</div>
		</div>
		
		<div id="deleteMyAccountContainer">
			<p>
				<h3><small>Je souhaite supprimer mon compte</small></h3>
					<div>
						Pour supprimer votre compte, cliquez sur le bouton ci-dessous. Vous serez alors invité(e) à confirmer cette action en renseingnant votre mot de passe.	
					</div>
			</p>
			<button id="deleteMyAccount" class="btn btn-default btn-sm" disabled>Supprimer mon compte</button>
		</div>
	</div>
	
</div>

<script src="js/jquery.js"></script>
<script src="js/myAccount.js"></script>

