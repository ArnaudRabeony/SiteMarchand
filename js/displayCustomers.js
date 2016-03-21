$(document).ready(function()
	{
		$('.editButton').on("click",function()
		{
			var row=$(this).parent().parent();
			var id=row.attr("id").replace('row','');
			var type=row.find("#selectType option:selected").text();
			var lastname=row.find("#newLastname").val();
			var firstname=row.find("#newFirstname").val();
			var email=row.find("#newEmail").val();
			
			if(row.hasClass('secured'))
			{
				row.find('input, select').each(function()
				{
					$(this).attr("disabled",false);
				});

				row.removeClass("secured");
				// $(this).attr("aria-pressed","false");
				$(this).html('<i class="fa fa-check"></i>').css("color","#286B0E");
			}
			// else if()//check types
			// {

			// }
			else
			{
				// alert("id :"+id+"   |   "+type+" |   "+lastname);
				$.get('controller/updateCustomers.php',
				{
					id:id,
					type:type,
					lastname:lastname,                  
					firstname:firstname,                    
					email:email                    
				});

				row.find('input, select').each(function()
				{
					$(this).attr("disabled",true);
				});

				row.addClass("secured");
				$(this).html('<i class="fa fa-pencil"></i>').css("color","#333");
				alert("Changement ok ");
			}
		});

		$('#saveButton').on("click",function()
		{
			$('tr').each(function()
			{
				if(!$(this).hasClass("secured"))
					$(this).find(".editButton").click();
			});
		});

		$('#cancelButton').on("click",function()
		{

		});
	});