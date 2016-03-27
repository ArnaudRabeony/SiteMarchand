<?php

$host='localhost';
$user='root';
$password='root';
$dbname='site_marchand';

/*
$dbname='a2511229_DB';
$host='mysql12.000webhost.com';
$user='a2511229_user';
$password='mdproot';
*/

	try 
	{
		$db = new PDO('mysql:host='.$host.';dbname='.$dbname,$user,$password);
		$db->query('SET NAMES utf8');
		$db->setAttribute (PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
	}
	catch(Exception $e) 
	{
		echo 'Erreur : '.$e->getMessage();
	}