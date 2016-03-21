# SiteMarchand

# BUG
* Auto connection after account creation
* [Resolved] Create an account : mail already exists isn't taken into account
* [Resolved] Update users fields : sets type value to 0 

## TODO :
* Manage update errors (check fields formats, email already exists...)
* Add customer (which fields ?)
* Delete customer ?
* User settings panel (update phone, address...)
* Create products

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