$(document).ready(function()
{
	var filledSizesTable=true;

	$("body").on("change","#selectCategory",function()
	{
		var value=$(this).val()==1 || $(this).val()==2 || $(this).val()==3 || $(this).val()==4 ? 1 : $(this).val();
		if(value!=-1)
		{
			$.get('js/ajax/sizeTable.php',
				{category:value},
			function(response)
			{
				// console.log(response);
				for(i=0;i<response.length-1;i++)
				{
					$('#sizeRow').append("<td>"+response[i]+"</td>");
					$('#toFillRow').append("<td><input id='qty"+response[i]+"' class='form-control' type='text' placeholder='Qté'/></td>");
				}

			}, "json");

			var tableToAdd='<table ><tr id="sizeRow"><td><b style="margin-right:10px;">Taille</b></td></tr>';
			tableToAdd+='<tr id="toFillRow"><td><b style="margin-right:10px;">Quantité</b></td></tr>';
			tableToAdd+='</table>';
			$('#sizeTable').html("<h4 id='sizeMessage' style='margin-top:-5px;'><small>Vous devez choisir au moins une taille</small></h4>"+tableToAdd).show();
		}
		else
			$('#sizeTable').hide();
	});

	//UI form validation
	$('form button').click(function(e)
	{

		$("#toFillRow input").each(function()
		{
			// alert($(this).attr("id")+ "| val:"+$(this).val());
			if(filledSizesTable && $(this).val()=="")
				filledSizesTable=false;
		});

		var selectCategory=$("#selectCategory").val();
		var selectSport=$("#selectSport").val();
		var selectBrand=$("#selectBrand").val();
		var price=$("#price").val();
		var label=$("#label").val();
		var description=$("#description").val();
		var image=$("#importedImageFile i").text();

		var noSize=filledSizesTable;
		var noCategpory= selectCategory == -1 ? true : false;
		var noSport= selectSport == -1 ? true : false;
		var noBrand= selectBrand == -1 ? true : false;
		var noPrice= price =="" ? true : false;
		var noLabel= label =="" ? true : false;
		var noDescription= description =="" ? true : false;
		var noImage= image =="Aucun fichier selectionné" ? true : false;

		if(noCategpory || noSport || noBrand || noPrice || noLabel || noDescription || noImage || noSize)
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
