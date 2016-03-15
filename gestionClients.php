
Informations à entrer dans db : 

<?php 
if(isset($_GET['mail']) && trim($_GET['mail'])!="")
	echo '<br>Mail : '.$_GET['mail'];

if(isset($_GET['firstname']) && trim($_GET['firstname'])!="")
	echo '<br>firstname : '.$_GET['firstname'];

if(isset($_GET['lastname']) && trim($_GET['lastname'])!="")
	echo '<br>lastname : '.$_GET['lastname'];

if(isset($_GET['password']) && trim($_GET['password'])!="")
	echo '<br>password : '.$_GET['password'];

if(isset($_GET['address']) && trim($_GET['address'])!="")
	echo '<br>address : '.$_GET['address'];

if(isset($_GET['phone']) && trim($_GET['phone'])!="")
	echo '<br>phone : '.$_GET['phone'];
 ?>
<br>
<a class="btn btn-default" href="accueil.php">Accueil</a>