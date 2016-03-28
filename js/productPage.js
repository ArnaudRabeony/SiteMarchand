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
});