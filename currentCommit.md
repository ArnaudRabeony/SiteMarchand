#Controller
*A unique sportController is used. It contains a method($db, $sport) that returns all the articles of one sport.

#Model

#View
*The previous displayProducts file has been renamed to manageProducts
*The new displayProducts contains two method : 
	*one to display all the articles of a sport. This method is used by all the sport view
	*the other has to display the carousel, it's the buggy one

#Database
*Photos has been added ('photoName.jpg')

#Structure
*In the images folder, a folder has been added for each sport containing the photos of the articles


--

###Import products
*import products through files
*db add check (via select query)
*uploaded files storage : files/

###New pages 
*single product creation/edition
*load product by clicking on the left side button

###Soccer page
*reorganized products div size

Probleme d'include dans importsManager
Probleme Utilisation fonction addProduct (valeurs en dur pcq pb get ?)
    $req->bindValue(':idCategorie', 3);
    $req->bindValue(':idSport', 1);
    $req->bindValue(':idMarque', 1);