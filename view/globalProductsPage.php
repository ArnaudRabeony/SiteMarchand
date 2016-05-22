<?php 

require_once(dirname(__FILE__) . '/../model/sport.php');
require_once(dirname(__FILE__) . '/../model/produit.php');
require_once(dirname(__FILE__) . '/../controller/sportController.php');
require_once(dirname(__FILE__) . '/../view/clientProducts.php');
require_once(dirname(__FILE__) . '/../model/functions.php');


	// $footballArray = getSportProducts($db, 'Football');
 //    displayProductList($db, $footballArray);
 //    $basketballArray = getSportProducts($db, 'Basketball');
 //    displayProductList($db, $basketballArray);

if(verifGet(array("filter")))
{
	$brands = getAllMarques($db);
	$sports = getAllSports($db);

	$filterType="N/A";

	foreach ($brands as $value)
	{
		if(trim($value['nomMarque']) === trim($_GET['filter']))
			$filterType="brand";
	}

	foreach ($sports as $value)
	{
		if(trim($value['nomSport']) === trim($_GET['filter']))
			$filterType="sport";
	}

	$array=[];

	switch ($filterType)
	{
		case 'brand':
				$brand = $_GET['filter'];
				$brandId = getIdMarqueByName($db,$brand);
				$array = getProductByBrandId($db, $brandId);
			break;

		case 'sport':
				$sport = $_GET['filter'];
				$sportId = getIdSportByName($db,$sport);
				$array = getProductBySportId($db, $sportId);
			break;
	}
	// filters($db);
	displayProductList($db, $array);
}
?>
<script src="js/jquery.js"></script>
<script>
	$(function()
    {

       $("#slider-range" ).slider({
          range: true,
          min: 0,
          max: 250,
          values: [ 0, 250 ],
          slide: function( event, ui ) 
          {
            $( "#amount" ).val(ui.values[ 0 ] + "€ - " + ui.values[ 1 ]+"€");

            $(".thumbnail").each(function()
            {
                $(this).parent().show();
                
                var price = $(this).find('.caption h4').text().trim().replace("€","");

                // alert(price);
                var show = false;

                if(price>=ui.values[0] && price<=ui.values[1])
                    show=true;

                if(!show)
                    $(this).parent().hide();
            });
          }
        });

       $( "#amount" ).val($( "#slider-range" ).slider( "values", 0 ) +
      "€ - " + $( "#slider-range" ).slider( "values", 1 )+"€" );

       	$('body').on("click",'#expandFilters',function()
        {
            $('#filtersGrid').toggle("fast");
        });

        $('body').on("click","#categoryFiltersContainer label",function()
        {
            var checked = $(this).attr("data-selected")=="true";

            if(!checked)
                $(this).attr("data-selected","true").addClass("filterShadow");
            else
                $(this).attr("data-selected","false").removeClass("filterShadow");


            var filtersArray = [];

            $('#categoryFiltersContainer label').each(function()
            {
                // alert($(this).text()+" : "+$(this).attr("data-selected"));

                if($(this).attr("data-selected")=="true")
                    filtersArray.push($(this).text());
            });

            // alert(filtersArray);

            $.get("js/ajax/filteredProducts.php",
            {
                filters:JSON.stringify(filtersArray),
                sport:"basketball"
            },function(response)
            {  
                $("#productList").html(response);
            });
        });

        $('body').on("click","#sizeFiltersContainer label",function()
        {
            var checked = $(this).attr("data-selected")=="true";

            if(!checked)
                $(this).attr("data-selected","true").addClass("filterShadow");
            else
                $(this).attr("data-selected","false").removeClass("filterShadow");

            var filtersArray = [];

            $('#sizeFiltersContainer label').each(function()
            {
                if($(this).attr("data-selected")=="true")
                    filtersArray.push($(this).text());
            });

            // alert(filtersArray);

            $(".thumbnail").each(function()
            {
                $(this).parent().show();
                
                var sizes = $(this).find('.availableSizes').text().trim();

                var availableSizes=sizes.split(",");

                for (var i = 0; i < availableSizes.length; i++) {
                    availableSizes[i] = availableSizes[i].trim();
                }

                var show = false;

                if(filtersArray.length == 0)
                    $(this).parent().show();
                else
                {
                    for(var i = 0; i<filtersArray.length;i++)
                    {
                        // alert("search "+filtersArray[i]+" in ["+availableSizes+ "]   :  "+ $.inArray( filtersArray[i], availableSizes));
                        for (var j = 0; j < availableSizes.length; j++)
                        {
                            // alert(availableSizes[j]+"("+availableSizes[j].length+")==="+filtersArray[i]+"("+filtersArray[i].length+")");
                            if(availableSizes[j].trim()===filtersArray[i].trim())
                                show = true;
                        }
                    }

                    if(!show)
                        $(this).parent().hide();
                }
            });
        });
    });
</script>