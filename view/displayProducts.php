<?php

require_once('./model/connection.php');

function displayProductList($db, $dataArray)
{
	foreach($dataArray as $key)
    {
    	echo '
    	<div class=col-sm-4 col-lg-4 col-md-4>
        	<div class="thumbnail">
            	<img src="./images/' . $key['photo'] . '"> 
                <div class=caption>
                   <h4 class=pull-right>' . $key['prix'] . ' €</h4>
                   <h4><a href=#>' . $key['libelle'] . '</a>
                   </h4>
                    <p>' . $key['description'] . '</p>
                    <div class="availableSizes">
                        <i>Tailles disponibles : S, M</i>
                    </div>
                </div>
				
            </div>
        </div>';
	}
}

// function used in all the sport pages
// @param $images an array containing the images for the carousel
/*function displayCarousel($images)
{
	echo "
<div class=col-md-12>
                    <div class=row carousel-holder>
                        <div class=col-md-12>
                            <div id=carousel-example-generic class=carousel slide data-ride=carousel>
                                <ol class=carousel-indicators>
                                    <li data-target=#carousel-example-generic data-slide-to=0 class=active></li>
                                    <li data-target=#carousel-example-generic data-slide-to=1></li>
                                    <li data-target=#carousel-example-generic data-slide-to=2></li>
                                </ol>
                                <div class=carousel-inner>
                                    <div class=item active>
                                        <img class=slide-image src=http://placehold.it/800x300 alt=>
                                    </div>
                                    <div class=item>
                                        <img class=slide-image src=http://placehold.it/800x300 alt=>
                                    </div>
                                    <div class=item>
                                        <img class=slide-image src=http://placehold.it/800x300 alt=>
                                    </div>
                                </div>
                                <a class=left carousel-control href=#carousel-example-generic data-slide=prev>
                                    <span class=glyphicon glyphicon-chevron-left></span>
                                </a>
                                <a class=right carousel-control href=#carousel-example-generic data-slide=next>
                                    <span class=glyphicon glyphicon-chevron-right></span>
                                </a>
                            </div>
                        </div>
                    </div>

                    <div class=row>";
}*/