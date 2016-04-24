<?php 
	
	require_once(dirname(__FILE__) . '/../connection.php');
	require_once(dirname(__FILE__) . '/../model/categorie_produit.php');
	require_once(dirname(__FILE__) . '/../model/marque.php');

    $images = array("Football"=>"images/Carousel/nikeFootball.jpg","Adidas"=>"images/Carousel/adidas.jpg","Nike"=>"images/Carousel/nike.png","Basketball"=>"images/Carousel/basket.jpg");

    displayCarousel($db,$images);
	 ?>
		<div id="icons">
			<div id="sportsContainer" class="col-md-12" style="text-align: center;">
			<?php 

				$sports = getAllSports($db);
				
				foreach ($sports as $value)
					echo '<a href="index.php?page=view/globalProductsPage&filter='.$value['nomSport'].'"><img src="'.$value['icone'].'" alt="'.$value['nomSport'].'"></a>';		
			?>
			</div>
			<div id="brandsContainer" class="col-md-12" style="text-align: center;">
				<?php 

					$logos = getAllMarques($db);
					
					foreach ($logos as $value)
						echo '<a href="index.php?page=view/globalProductsPage&filter='.$value['nomMarque'].'"><img src="'.$value['logo'].'" data-wow-duration=".8s" data-wow-delay=".25s" class="wow zoomIn" alt="'.$value['nomMarque'].'"></a>';		
				?>
			</div>
		</div>

<!-- </div> -->
<script src="js/jquery.js"></script>
   <script src="js/wow.min.js"></script>
