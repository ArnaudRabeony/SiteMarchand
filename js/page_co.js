$(document).ready(function()
	{
		//UI form validation
		$('form button').click(function(e)
		{
			var noPassword=$("#password").val()=="" ? true : false;
			var noEmail=$("#email").val()=="" ? true : false;

			if(noPassword || noEmail)
			{
				e.preventDefault();
				if(noPassword)
					$('#password').addClass("necessary");
				if(noEmail)
					$('#email').addClass("necessary");
			}
			else
			{
				$(this).attr("novalidate","false");
				$(this).click();
			}	
		});
	});