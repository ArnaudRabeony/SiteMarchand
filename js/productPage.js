$(document).ready(function()
{
	$("#productImage").elevateZoom({zoomType: "lens",borderSize:1,lensSize:150,lensShape:"round", containLensZoom: true, cursor: 'pointer',});

	$.get('js/ajax/sizeTable.php',
				{category:$("#descriptionContainer").attr("data-category")},
			function(response)
			{
				console.log(response);
				// for(i=0;i<response.length-1;i++)
				// {
				// 	$('#sizeRow').append("<td>"+response[i]+"</td>");
				// 	$('#toFillRow').append("<td><input id='qty"+response[i]+"' class='form-control' type='text' placeholder='Qté'/></td>");
				// }

			}, "json");

	$('#closeIcon').mouseover(function()
	{
		$(this).css("color","black");
	});

	$('#closeIcon').mouseleave(function()
	{
		$(this).css("color","#ddd");
	});

	// $('#closeIcon').click(function()
	// {
	// 	var categoryNsport=$("#categoryNsport").text().split(" ");
	// 	var sport = categoryNsport[categoryNsport.length-2];
	// 	var viewPage= sport.toLowerCase()=="football" ? "soccer" : "welcome";
	// 	document.location.href="index.php?page=view/"+viewPage;
	// });

	$('#closeIcon').click(function(){
		parent.history.back();
		return false;
	});

	$('#addToBasket').click(function()
	{
		var status=$("#displayProduct").attr("data-status");

		if(status=="connected")
			$('#modalButtons').html('<button id="continueShopping" type="button" class="btn btn-default" data-dismiss="modal">Je poursuis mes achats</button><button type="button" class="btn btn-primary"><a href="index.php?page=view/myBasket" id="toBasket" style="text-decoration:none;color:white;">Voir mon panier</a></button>');
		else
		{
			$("#modalBody").css("height","200px");
			var coForm='<form action="index.php?page=controller/check_co" method="post" class="col-md-5 col-sm-3" novalidate>'
		    +'<input type="email" class="form-control" name="email" id="email" placeholder="exemple@mail.com">'
		    +'<input type="password" class="form-control" name="password" id="password" placeholder="Mot de passe">'	
		   	+'<button class="btn btn-default" type="submit">Connexion</button></form>';

		$("#modalBody").html("Vous devez être connecter pour ajouter cet article à votre panier."+'<div style="margin-left:180px;margin-top:30px;">'+coForm+"</div>");
		}
	});
});