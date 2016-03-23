<div class="displayContainer" style="/*background-color: red;*/padding:10px 10px;">
<p>
	<h3><small>Cette page vous permet de gérer les informations relatives à votre compte.</small></h3>
	 Ainsi, vous avez la possibilité de mettre à jour les différents champs. Pour cela, il vous suffit de survoler le champ à modifier puis cliquer sur le bouton d'édition.
</p><br>
<?php $user=getCustomerById($db,$_SESSION["id"]);?>
	<div class="formContainer col-md-4">
		<form action="controller/myAccount.php" method="post">
			<table id="myAccountTable">
				<tbody>
					<tr>
						<td><input disabled type="text" name="firstname" class="form-control" id="firstname" placeholder="Prénom" <?php echo "value=".$user["prenom"]; ?>></td>
						<td><button class="edit btn btn-default"><i class="fa fa-pencil"></i></button></td>
					</tr>
					<tr>
						<td><input disabled type="text" name="lastname" class="form-control" id="lastname" placeholder="Nom" <?php echo "value=".$user["nom"]; ?>></td>
						<td><button class="edit btn btn-default"><i class="fa fa-pencil"></i></button></td>
					</tr>
					<tr>
						<td><input disabled type="email" name="email" class="form-control" id="email" placeholder="exemple@mail.com" <?php echo "value=".$user["email"]; ?>></td>
						<td><button class="edit btn btn-default"><i class="fa fa-pencil"></i></button></td>
					</tr>
					<tr>
						<td><input disabled type="password" name="password" class="form-control" id="password" data-minlength="5" placeholder="Mot de passe"></td>
						<td><button class="edit btn btn-default"><i class="fa fa-pencil"></i></button></td>
					</tr>
					<tr>
						<td><textarea disabled class="form-control" name="address" id="address" rows="2" placeholder="Adresse"><?php echo $user["adresse"]; ?></textarea></td>
						<td><button class="edit btn btn-default"><i class="fa fa-pencil"></i></button></td>
					</tr>
					<tr>
						<td><input disabled type="tel" class="form-control" name="phone" id="phone" placeholder="01 23 45 65 78" <?php echo "value=".$user["telephone"]; ?>></td>
						<td><button class="edit btn btn-default"><i class="fa fa-pencil"></i></button></td>
					</tr>
				</tbody>
			</table>
		</form>
		<div class="buttonsContainer">
			<button id="cancelButton" class="btn btn-default btn-sm" ><a href="index.php?page=view/displayCustomers">Annuler</a></button>
			<button id="saveButton" class="btn btn-default btn-sm" >Sauvegarder</button>
			<!--<button id="addCustomer" class="btn btn-default btn-sm"><i class="fa fa-user-plus" style="color:#28497D;"></i></button>-->
		</div>
	</div>
</div>

<script src="js/jquery.js"></script>
<script src="js/myAccount.js"></script>

