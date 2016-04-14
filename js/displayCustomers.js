$(document).ready(function()
{
	$("#searchBy").change(function()
	{
		// alert($(this).find("option:selected").val());
		switch($(this).find("option:selected").val())
		{
			case "type":
					$("#searchInBase").val("").attr("placeholder","client, admin...");
					break;

			case "all":
					$("#searchInBase").val("").attr("placeholder","client, Jean, Dupond...");
					break;

			case "lastname":
					$("#searchInBase").val("").attr("placeholder","Dupond...");
					break;

			case "firstname":
					$("#searchInBase").val("").attr("placeholder","Jean...");
					break;

			case "mail":
					$("#searchInBase").val("").attr("placeholder","jean@gmail.com...");
					break;
		}	
	});

	$("#searchInBase").keyup(function(e)
	{	
		var str=$(this).val();
		console.log(str);

		var filter=$("#searchBy").val();
		console.log(filter);

		$.get("js/ajax/searchCustomer.php",
		{
			str:str,
			filter:filter
		},function(response)
		{
			$("#customersTable tbody").html(response);
		});
	});

	$('body').on("click",'.editButton',function()
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
			// alert("Changement ok ");
		}
	});

	$("body").on("click",'#saveButton',function()
	{
		$('tr').each(function()
		{
			if(!$(this).hasClass("secured"))
				$(this).find(".editButton").click();
		});
	});
});