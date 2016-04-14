$(document).ready(function()
{
	var filledSizesTable=true;
	
	$("#clearStock").click(function(e)
	{
		e.preventDefault();
		$.get('js/ajax/clearStock.php',
		{
			id:$("#createProductContent").attr("data-productid")
		},function(response)
		{
			$("#stockTable tbody").html(response);
			$("#stock").hide();

		});
	});

	$("body").on("click","#deleteStockRow",function()
	{
		$.get('js/ajax/clearStock.php',
		{
			id:$("#createProductContent").attr("data-productid"),
			size:$(this).parent().parent().find(".availableSizeCell").text()
		},function(response)
		{
			$("#stockTable tbody").html(response);
			if(response==="")
				$("#stock").hide();
		});

		// alert("ok");
	});

	//UI form validation
	$('form button').click(function(e)
	{

		// $("#toFillRow input").each(function()
		// {
		// 	// alert($(this).attr("id")+ "| val:"+$(this).val());
		// 	if(filledSizesTable && $(this).val()=="")
		// 		filledSizesTable=false;
		// });

		var selectCategory=$("#selectCategory").val();
		var selectSport=$("#selectSport").val();
		var selectBrand=$("#selectBrand").val();
		var price=$("#price").val();
		var label=$("#label").val();
		var description=$("#description").val();
		var image=$("#importedImageFile i").text();

		// var noSize=filledSizesTable;
		var noCategpory= selectCategory == -1 ? true : false;
		var noSport= selectSport == -1 ? true : false;
		var noBrand= selectBrand == -1 ? true : false;
		var noPrice= price =="" ? true : false;
		var noLabel= label =="" ? true : false;
		var noDescription= description =="" ? true : false;
		var noImage= image =="Aucun fichier selectionné" ? true : false;

		if(noCategpory || noSport || noBrand || noPrice || noLabel || noDescription || noImage)// || noSize)
		{
			e.preventDefault();
			if(noCategpory)
				$('#selectCategory').addClass("necessary");
			if(noSport)
				$('#selectSport').addClass("necessary");
			if(noBrand)
				$('#selectBrand').addClass("necessary");
			if(noPrice)
				$('#price').addClass("necessary");
			if(noLabel)
				$('#label').addClass("necessary");
			if(noDescription)
				$('#description').addClass("necessary");
			if(noImage)
				$('#importedImageFile i').css('color',"#843534");
			// if(noSize)
			// 	$('#sizeTable').show().append("<span style='color:#843534;font-size:13px;'>Veuillez saisir une taille</span>");
		}
		else
		{
			$(this).attr("novalidate","false");
			$(this).click();
		}	
	});

	$('#imageFileChooser').change(function()
	{
		var selectedFilePath = $(this).val().split("\\");
		var selectedFile = selectedFilePath[selectedFilePath.length-1];
		// var fileExtArray = selectedFile.split(".");
		// var fileName = fileExtArray[0];
		// var fileExt = fileExtArray[fileExtArray.length-1];

        $("#importedImageFile i").text(selectedFile);
        $("#preview").show();
    });

	$("#imageFileChooser").change(function(){
	    readURL(this);
	});

	$("#stockPanel").click(function(e)
	{
		e.preventDefault();
		$("#hiddenEditStock").hide();
		$("#editStock").show();
	});

	$('#selectedSize').change(function()
	{
		$("#selectedSize").removeClass("necessary").removeClass("success");
		$("#qty").removeClass("necessary").removeClass("success");
	});

	$("#addToStock").click(function(e)
	{	
		var size=$("#selectedSize").val();
		var qty=$("#qty").val();
		// alert($("#createProductContent").attr("data-productid"));
		
		if(size=="notSelected" || qty=="")
		{
			e.preventDefault();
			if(size=="notSelected")
				$("#selectedSize").addClass("necessary");
			if(qty=="")
				$("#qty").addClass("necessary");
		}
		else
		{
			$("#selectedSize").removeClass("necessary");
			$("#qty").removeClass("necessary");

			$.get('js/ajax/stockManager.php',
				{
					id:$("#createProductContent").attr("data-productid"),
					size:size,
					qty:qty
				},function(response)
				{
					$('#stockTable tbody').html(response);
					$("#stock").show();
				});
		}
	});
});

$(document).load(function()
{
	if($("#preview").attr("src") == "#")
		$("#preview").hide();
});

function readURL(input) 
{
    if (input.files && input.files[0]) 
    {
        var reader = new FileReader();

        reader.onload = function (e) 
        {
            $('#preview').attr('src', e.target.result);
        }

        reader.readAsDataURL(input.files[0]);
    }
}
