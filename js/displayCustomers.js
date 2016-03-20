$(document).ready(function()
	{
		$('.editButton').on("click",function()
		{
			$row=$(this).parent().parent();


			if($row.hasClass("displayRow"))
			{
				$row.prev().show()
							.find('input, select').each(function()
								{
									$(this).attr("disabled",false);
								});
				$row.hide();
			}
			else
			{
				$row.find('input, select').each(function()
				{
					$(this).attr("disabled",false);
				});
			}
		});

		$('#saveButton').on("click",function()
		{
			$('#customersTable').find('input, select').each(function()
				{
					$(this).attr("disabled",true);
				});
		});

	});