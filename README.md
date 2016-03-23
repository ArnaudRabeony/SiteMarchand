# SiteMarchand

# BUGS
* Create an account with a non email format value
* [Resolved] Create an account : mail already exists isn't taken into account
* [Resolved] Update users fields : sets type value to 0 
* [Resolved] Auto connection after account creation


## TODO :
* Q : Add/display products
* A : Project structure (organize files and foldes)
* A : Mon compte -> update fields
* Manage update errors (check fields formats, email already exists...)
* Add customer (which fields ?)
* Delete customer ?
* User settings panel (update phone, address...)
* Create 
* Admin : deletion ? 


#### Done
* Multiple updates by clicking on "Sauvegarder"
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