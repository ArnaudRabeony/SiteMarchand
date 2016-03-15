<?php 

	session_start();

	//Info site
	$title = 'Site marchand';
	require_once("connexion.php");
	include('fonctions.php');
	protectPostGet();

	$containedPage = isset($_GET['page']) && trim($_GET['page'])!="" ? $_GET['page'] : "page_co";
?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>

	<!--	bootstrap		-->
	<link rel="stylesheet" href="CSS/bootstrap.min.css" /> 


	<title><?php echo $title ?></title>
</head>
<body>
	<div id="container">
		<header>
			<nav id="menu" class='navbar navbar-default'>
				<?php include("menu.php"); ?> 
			</nav>
		</header>
		<div class="content" align="center">
			<h2><small>Contenu de la page</small></h2>
			<?php include($containedPage.'.php'); ?>
			<img src="images/fleche.png" alt="top" id="top" style="display : none;bottom:20px;right:20px;height:2cm;width:2cm;position:fixed;cursor:pointer" />
		</div>
	</div>
<script type="text/javascript" src="JS/jquery.min.js"></script>
<script src="JS/top.js"></script>
</body>


</html>