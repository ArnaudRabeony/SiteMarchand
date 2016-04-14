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
		$("#saveChanges").attr("disabled", false);
	});

	$('#saveChanges').click(function(e)
	{
			var relatedTable=$(this).parent().prev().find("table");
			var firstname=$("#newfirstname").val();
			var lastname=$("#newlastname").val();
			var email=$("#newemail").val();
			var address=$("#newaddress").val();
			var phone=$("#newphone").val();

			var noFirstname= firstname =="" ? true : false;
			var noLastname= lastname =="" ? true : false;
			var noEmail= email =="" ? true : false;
			var noAddress= address =="" ? true : false;
			var noPhone= phone =="" ? true : false;

			var phoneFilter="#^0[0-9]([ .-]?[0-9]{2}){4}$#";

			if(noFirstname || noLastname || noEmail || noAddress || noPhone)
			{
				if(noFirstname)
					$('#newfirstname').addClass("necessary");
				if(noLastname)
					$('#newlastname').addClass("necessary");
				if(noEmail)
					$('#newemail').addClass("necessary");
				if(noAddress)
					$('#newaddress').addClass("necessary");
				if(noPhone)
					$('#newphone').addClass("necessary");
			}
			else
			{
				// $(this).attr("novalidate","false");
				//send values and check conflicts

				$.get("controller/updateMyAccount.php",
				{
					id:$("#myAccountTable").attr("data-id"),
					firstname:firstname,
					lastname:lastname,
					email:email,
					address:address,
					phone:phone
				});
				relatedTable.find("input, textarea").each(function()
				{
					$(this).attr("disabled",true);
				});
			}

			e.preventDefault();

	});

	$('#changePassword').click(function(e)
	{
		$(this).parent().hide();
		$('#changePasswordContainerForm').show();
	});

	$("#deleteMyAccount").click(function()
	{
		$.post("js/ajax/deleteCustomer.php",
		{
			id:$("#myAccountTable").attr("data-id")
		},function(response)
		{
			if(response)
				document.location.href="index.php?page=controller/deco_page";
		});
	});

	$("#confirmPasswordUpdateButton").click(function(e)
	{
		var currentPassword = $("#currentPassword").val();
		var currentPasswordConfirmation = $("#currentPasswordConfirmation").val();
		var newPassword = $("#newPassword").val();
		var email=$("#newemail").val();

		if(currentPassword!=currentPasswordConfirmation)
		{
			$("#currentPassword").addClass("necessary");
			$("#currentPasswordConfirmation").addClass("necessary");
		}
		else if(newPassword!="")
		{
			$.post("js/ajax/updatePassword.php",
			{
				id:$("#myAccountTable").attr("data-id"),
				email:email,
				password:currentPassword,
				newPassword:newPassword
			},function(response)
			{
				if(response=="passwordError")
					$(".errorMessage").text("Mot de passe incorrect");
				else
					document.location.href="index.php?page=controller/deco_page";
			});

			// alert("ok pour hachage php et update");
		}

		e.preventDefault();
	});

});