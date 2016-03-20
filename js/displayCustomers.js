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
			else if($row.hasClass("editButton"))
			{
				$row.find('input, select').each(function()
				{
					$(this).attr("disabled",false);
				});
			}
			else //create the update link
			{	
				var id=$row.attr("id").replace('row','');
				var type=$row.find("#selectType option:selected").text();
				var lastname=$row.find("#newLastname").val();
				var fistname=$row.find("#newFirstname").val();
				var email=$row.find("#newEmail").val();
				// alert("id :"+id+"   |   "+type+" |   "+lastname);
				var newLink='index.php?page=Controller/updateCustomers&id='+id+'&type='+type+'&nom='+lastname+'&prenom='+fistname+'&email='+email;
				// alert(newLink);
				$row.find(".editButton a").attr("href",newLink);
			}
		});

		$('#saveButton').on("click",function()
		{
			$('.editButton').each(function()
			{
				$(this).click();
				$row.find(".editButton a").attr("href",newLink);
			});
		});

		$('#cancelButton').on("click",function()
		{
			// alert("hide");
			$("tr").each(function()
				{
					if($(this).hasClass("editRow"))
					{
						$(this).hide();
						$(this).next().show();
					}
				});
		});

	
	});