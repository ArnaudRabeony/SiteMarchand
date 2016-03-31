##Controller
* A unique sportController is used. It contains a method($db, $sport) that returns all the articles of one sport.

##Model

##View
* The previous displayProducts file has been renamed to manageProducts
* The new displayProducts contains two method : 
	* one to display all the articles of a sport. This method is used by all the sport view
	* the other has to display the carousel, it's the buggy one

##Database
* Photos has been added ('photoName.jpg')

##Structure
* In the images folder, a folder has been added for each sport containing the photos of the articles


--

###Import products
* import products through files
* db add check (via select query)
* 	uploaded files storage : files/

###28/03
* Update password
* Oneself Update (customer)
* Add Quantity field in product
* Admin : Delete product
* Admin : display products
* Soccer page : reorganized products div size
* Product edition 
	* single product creation/edition
	* load product by clicking on the left side button
* Change the structure : connection on the root folder (to be ignored by git)
	* Connection file is unreachable for some pages (ex : categorie_produit.php)
* Deleted displayProduct page which contained : put contained functions in model/produit.php

###28/03 Quentin
* Creation of the product page, a single page to display all the articles


###29/03
* Close button on a product page : back button
* create empty pages Mon panier, Mes commandes

###31/03
* Test : Connection redirection (to the last page)
* BasketItemNumber Label on the navbar: Variable to set in a SESSION and increase. Should be displayed at the deconnection or when the user click it