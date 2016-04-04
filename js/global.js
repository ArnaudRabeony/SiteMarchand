$(document).ready(function()
{

	$('.client-filters').change(function()
	{
		$(".client-side").html("");
		$.get("ajax/filteredProducts", 
			{
				nb:"ok"	
			});
	});

	$('.curtain').mouseover(function()
		{
			$(this).find("img").css({ opacity: 0.4 });
			$(this).find("p").show();
		});

	$('.curtain').mouseout(function()
		{
			$(this).find("img").css({ opacity: 1 });
			$(this).find("p").hide();
		});


	// $('#createAccoundContent form').validator();
	// $('#continueShopping').click(function()
	// {
	// 	$("#shoppingCart").show();
	// })

	$("#basketNotification a").click(function(e)
	{
		// e.preventDefault();
		alert("TODO : preview article images");
		// $(this).hide();
		// $('#basketSize').hide();
	});

	$(".thumbnail").mouseenter(function()
	{	
		var isConnected = $(".status").attr("data-status") == "connected" ? true : false;
		
		if(isConnected)
			$(this).find(".toCartThumbnail").show();
	});

	$(".thumbnail").mouseleave(function()
	{
		$(this).find(".toCartThumbnail").hide();
	});


	$(".toCartThumbnail,#addToBasket").click(function()
	{
			$("#basketNotification").show();
			$("#basketNotification a").show();

			if($('#basketSize')!=0)
				$('#basketSize').show();
	});

	$("body").on("click","#addToBasket,.toCartThumbnail",function()
	{
		var productId=$("#displayProductContainer").attr("data-productId");
		console.log(productId);

		//TODO : add productId to the cart
		$.get("js/ajax/updateBasket.php",
		{
			id:productId
		},function(response)
		{
			$("#basketSize").text(response);
		});
	});

	$("#multipleDeletionButton").click(function()
	{
		$("#customersTable .productLine").each(function()
		{
			var checkbox=$(this).find(".deleteCheckbox");
			var isChecked = checkbox.prop("checked");
			var id=checkbox.val().replace("delete","");
				// console.log("delete product : "+ id );	

			if(isChecked)
				$(this).find(".deleteButton").click();
		});
	});

	$(".removeFromBasketButton").click(function()
	{
		$(this).parent().parent().hide();

		var productId=$(this).parent().parent().attr("data-productid");
		// console.log(productId);
		$.get("js/ajax/removeFromBasket.php",
		{
			id:productId
		});

		if($("#basketItemsContainer basketItem").length==0)
		{
			$('#notEmptyBasket').hide();
			$('#emptyBasket').show();
			$('#basketSize').hide();
		}
	})
});