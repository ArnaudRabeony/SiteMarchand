$(document).ready(function()
{
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
});