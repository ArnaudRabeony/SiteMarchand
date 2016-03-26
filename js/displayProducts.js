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
				// alert("TODO: Update product");
			
				row.find('input, select').each(function()
				{
					$(this).attr("disabled",true);
				});

				row.addClass("secured");
				$(this).html('<i class="fa fa-pencil"></i>').css("color","#333");
				// alert("Changement ok ");
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

        // $.get("/controller/importExcel.php",
        // {
        // 	ext:fileExt,
        // 	fileName:fileName
        // });
    });

    $("#importProducts").submit(function()
    {
    	e.preventDefault();

    	alert("TODO : csv/PHPExel ajax management --> Delete * from produit + insert all");
    });
});