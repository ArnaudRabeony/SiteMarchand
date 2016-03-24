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

	$('#saveChanges').click(function(e)
	{
		var relatedTable=$(this).parent().prev().find("table");
		
			var firstname=$("#newfirstname").val();
			var lastname=$("#newlastname").val();
			// var password=$("#password").val();
			var confirmation=$("#newconfirmation").val();
			var email=$("#newemail").val();
			var address=$("#newaddress").val();
			var phone=$("#newphone").val();

			var noFirstname= firstname =="" ? true : false;
			var noLastname= lastname =="" ? true : false;
			var noPassword= password =="" ? true : false;
			var noConfirmation= confirmation =="" ? true : false;
			var noEmail= email =="" ? true : false;
			var noAddress= address =="" ? true : false;
			var noPhone= phone =="" ? true : false;

			var phoneFilter="#^0[0-9]([ .-]?[0-9]{2}){4}$#";

			if(noFirstname || noLastname || noEmail || noAddress || noPhone || noPassword || noConfirmation)
			{
				e.preventDefault();
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
				if(noPassword)
					$('#newpassword').addClass("necessary");
				if(noConfirmation)
					$('#newconfirmation').addClass("necessary");
			}
			// else if(!noPassword && !noConfirmation && password!=confirmation)
			// {
			// 	e.preventDefault();
			// 	$('#password').addClass("necessary");
			// 	$('#confirmation').addClass("necessary");
			// 	$('#mismatch').text("Le mot de passe et la confirmation sont différents");
			// }
			else
			{
				// $(this).attr("novalidate","false");
				$(this).click();
				alert("submitted");
			}	
	});

	$('#changePassword').click(function(e)
	{
		$(this).parent().hide();
		$('#changePasswordContainerForm').show();
	})

});