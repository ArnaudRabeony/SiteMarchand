$(document).ready(function()
	{
		$('.editButton').on("click",function()
		{
			$row=$(this).parent().parent();
			$row.find('input, select').each(function()
				{
					$(this).attr("disabled",false);
				});
		});

		$('#saveButton').on("click",function()
		{
			$('#customersTable').find('input, select').each(function()
				{
					$(this).attr("disabled",true);
				});
		});

	});