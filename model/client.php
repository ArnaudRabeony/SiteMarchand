<?php

require_once('./connection.php');

function updatePassword($db,$id,$newPassword)
{
	$req = $db->prepare('update client set mdp=:mdp where idClient=:id');
    $req->bindValue(':mdp', password_hash($newPassword,PASSWORD_BCRYPT));
    $req->bindValue(':id', $id);
    $req->execute();
}	
