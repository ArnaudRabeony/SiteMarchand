# SiteMarchand

# PRB
* Undefined total price when an article is removed from the basket
* Can't display product libelle with composed label
* Customer should be disconnected when he changes his password
* Display the carousel from the views/displayProducts file
* Create an account with a non email format value
* [Resolved] Create an account : mail already exists isn't taken into account
* [Resolved] Update users fields : sets type value to 0
* [Resolved] Auto connection after account creation


## TODO :
* XLS IMPORT WON'T WORK ! The db structure has changed -> no more idTaille in Produit
* Delete idTaille from produit table
* basketItems number : increment regarding products or qty ?
* Connection on the fly -> add product to basket
* Connection on the fly -> show the modal before selections checking
* create an icon menu regarding the scrollTop position
* Display all products on a page and use a string filter
* Manage long description display (substr ?)
* Q : Creation of the filter section

#### Done
* Use the carousel as a product filter (by brand, sport...)
* hide table container if the ordering page is empty (after deletion)
* create a new mapping table for etat in table Commande
* gather same products in the basket
* Get price, qty, size in the basket
* addToBasket via thumbnail
* Stock management
* productManagement : string filter
* quick add to cart
* Export Csv
* Zoom on images
* myBasket management
* Multiple deletion product
* Change selected values : remove cptr (update product)
* Include co_page in addToBasket modal
* Display preview images
* Add to cart icon in article thumbnail div
* Update password
* Oneself Update (customer)
* Add Quantity field in product
* Admin : Delete product
* Admin : display products
* Multiple updates by clicking on "Sauvegarder"
* Add/display products
* Display users (for admin accounts)
* Encrypted password
* Test co/deco
* Create admin account
* Check custom menu
* Add customers in DB (pma)
* UI form Validation
* DB form Validation
* Manage header redirect (connection failure)
* Insert customers

# MVC Architecture
* Controller
	* Pages which contain redirections
	* Forms managers
* Model
	* DB access functions
* View
	* Display
