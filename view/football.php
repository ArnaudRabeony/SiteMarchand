<?php

require_once('clientProducts.php');
require_once(dirname(__FILE__) . '/../connection.php');
require_once(dirname(__FILE__) . '/../model/produit.php');
require_once(dirname(__FILE__) . '/../model/taille.php');
require_once(dirname(__FILE__) . '/../controller/sportController.php');

$connected = isset($_SESSION['id']) ? true : false;
$status= $connected ? 'data-status="connected"' :  'data-status="disconnected"'  ;
?>
    <div id="productsContainer">
        </div class="status" <?php echo $status ?>>
<!-- Products are displayed in this area -->

        <?php

            $psgJersey = getProductByLabel($db,"Maillot home PSG")[0];
            $mercurial = getProductByLabel($db,"Mercurial")[0];

            $images = array($mercurial["idProduit"]=>"images/Carousel/mercurialBanner.jpg",$psgJersey["idProduit"]=>"images/Carousel/psg.jpg");

            displayCarousel($db,$images);
            // echo '<div class="row" id="filtersContainer">';
            // filters('sport', getAllSports($db));
            // filters('categorie', getAllCategories($db));
            // filters('taille', getAllTaille($db));
            // echo '</div>';
        
            filters($db);
            echo '<hr>';
            $footballArray = getSportProducts($db, 'Football');
        ?>

        <div id="productList">
            <?php displayProductList($db, $footballArray); ?>
        </div>

<!-- End of product's display -->
        </div>
    </div>

<script src="js/jquery.js"></script>
<!-- <script src="js/ion.rangeSlider.min.js"></script> -->
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

        $('#expandFilters').click(function()
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
                sport:"football"
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