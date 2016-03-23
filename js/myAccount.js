$(document).ready(function()
{

	$('#myAccountTable tr').mouseover(function()
	{
		$(this).find(".edit").show();
	});

	$('#myAccountTable tr').mouseleave(function()
	{
		$(this).find(".edit").hide();
	});

	$('.edit').click(function(e)
	{
		e.preventDefault();
		var row=$(this).parent().parent();
		row.find("input,textarea").//css("background-color","#FFECC0").
				attr("disabled",false);
	});

});