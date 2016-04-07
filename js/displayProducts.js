$(document).ready(function()
{
	if($('#searchInBase').val()=="")
		$.get("js/ajax/searchProduct.php")

	$("#searchBy").change(function()
	{
		// alert($(this).find("option:selected").val());
		switch($(this).find("option:selected").val())
		{
			case "ref":
					$("#searchInBase").val("REF").attr("placeholder","REF...");
					break;

			case "all":
					$("#searchInBase").val("").attr("placeholder","Nike, 45, Maillot...");
					break;

			case "brand":
					$("#searchInBase").val("").attr("placeholder","Nike...");
					break;

			case "label":
					$("#searchInBase").val("").attr("placeholder","Maillot...");
					break;
		}	
		// $('#searchInBase').val("");
	});

	$("#searchInBase").keyup(function(e)
	{	
		var str=$(this).val();
		// console.log(str);

		var filter=$("#searchBy").val();
		// console.log(filter);

		$.get("js/ajax/searchProduct.php",
		{
			str:str,
			filter:filter
		},function(response)
		{
			$("#productsTable tbody").html(response);
		});
	});

	$("body").on("click",'.editButton',function()
		{
			var row=$(this).parent().parent();
			var id=row.attr("id").replace('row','');
			var type=row.find("#selectType option:selected").text();
			var lastname=row.find("#newLastname").val();
			var firstname=row.find("#newFirstname").val();
			var email=row.find("#newEmail").val();
			
			if(row.hasClass('secured'))
			{
				row.find('input, select, textarea').each(function()
				{
					$(this).attr("disabled",false);
				});

				row.removeClass("secured");
				// $(this).attr("aria-pressed","false");
				$(this).html('<i class="fa fa-check"></i>').css("color","#286B0E");
				row.find(".moreInfo").show();
			}
			// else if()//check types
			// {

			// }
			else
			{
				// alert("TODO: Update product");
			
				row.find('input, select, textarea').each(function()
				{
					$(this).attr("disabled",true);
				});

				row.find(".moreInfo").hide();

				row.addClass("secured");
				$(this).html('<i class="fa fa-pencil"></i>').css("color","#333");

				$.get('controller/updateProduct.php',
				{
					id:id,
					libelle:row.find("#label").val(),
					prix:row.find("#price").val(),
					description:row.find("#description").val()
				});
				alert("Changement ok ");
			}
		});

	$('#productsFileChooser').change(function()
	{
		var selectedFilePath = $(this).val().split("\\");
		var selectedFile = selectedFilePath[selectedFilePath.length-1];
		// var fileExtArray = selectedFile.split(".");
		// var fileName = fileExtArray[0];
		// var fileExt = fileExtArray[fileExtArray.length-1];

        $("#importedFile i").text(selectedFile);
        $("#importProducts").attr("disabled",false);
    });

    $(".deleteButton").click(function()
    {
    	var row=$(this).parent().parent();
		var id=row.attr("id").replace('row','');
		row.hide();

		$.get('js/ajax/deleteProduct.php',
		{
			id:id
		});
    });
});