$(document).ready(function()
	{
		//UI form validation
		$('form button').click(function(e)
		{
			var firstname=$("#firstname").val();
			var lastname=$("#lastname").val();
			var password=$("#password").val();
			var confirmation=$("#confirmation").val();
			var email=$("#email").val();
			var address=$("#address").val();
			var phone=$("#phone").val();


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
					$('#firstname').addClass("necessary");
				if(noLastname)
					$('#lastname').addClass("necessary");
				if(noEmail)
					$('#email').addClass("necessary");
				if(noAddress)
					$('#address').addClass("necessary");
				if(noPhone)
					$('#phone').addClass("necessary");
				if(noPassword)
					$('#password').addClass("necessary");
				if(noConfirmation)
					$('#confirmation').addClass("necessary");
			}
			else if(!noPassword && !noConfirmation && password!=confirmation)
			{
				e.preventDefault();
				$('#password').addClass("necessary");
				$('#confirmation').addClass("necessary");
				$('#mismatch').text("Le mot de passe et la confirmation sont différents");
			}
			//TODO
			// else if(!noPhone && regex)
			// {
			// 	e.preventDefault();
			// 	$("#phone").addClass("necessary");
			// }
			else
			{
				$(this).attr("novalidate","false");
				$(this).click();
			}	
		});
	});
