$(document).ready(function()
	{
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

		/*$("#addCustomer").click(function()
		{
			newRow='<tr class="newrow"><td><select class="form-control" id="selectType"><option value="admin">admin</option><option value="client">client</option></select></td>';
			newRow+='<td><input id="newLastname" class="form-control" type="text" placeholder="Nom"></td>';
			newRow+='<td><input id="newFirstname" class="form-control" type="text" placeholder="Prénom"></td>';
			newRow+='<td><input id="newEmail" class="form-control" type="email" placeholder="Email"></td>';
			newRow+='<td><button class="editButton btn btn-default btn-sm"><i class="fa fa-pencil"></i></button></td>';
			newRow+='<td><button class="deleteButton btn btn-default btn-sm"><i class="fa fa-close"></i></button></td></tr>';
			$('#customersTable').append(newRow);
		});*/

		$("body").on("click",'#saveButton',function()
		{
			$('tr').each(function()
			{
				if(!$(this).hasClass("secured"))
					$(this).find(".editButton").click();
			});
		});

		$("body").on("click",'#cancelButton',function()
		{

		});
	});