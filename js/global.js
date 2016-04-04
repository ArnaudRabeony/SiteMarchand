$(document).ready(function()
{
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
		var currentSize=parseInt($("#basketSize").text());
		// alert(currentSize);

		//TODO : get value from db ?
		$.post("js/ajax/updateBasket.php",
		{
			nb:currentSize
		},function(response)
		{
			$("#basketSize").text(response);
		});
	});

	$("#multipleDeletionButton").click(function()
	{
		$("#customersTable tr").each(function()
		{
			var checkbox=$(this).find(".checkboxContainer");
			console.log(checkbox.html());
			// var msg= checkbox.prop("checked") +"checked";
			// alert(msg);
			// if($(this).prop("checked"))
			// 	alert("ok");	

			// 	alert($(this).parent().prev().html());
		});
	});
});