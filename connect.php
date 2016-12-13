<?php
ini_set('display_errors', 1);
	ini_set('display_startup_errors', 1);
	error_reporting(E_ALL); 
	$host = 'fdb5.awardspace.net';
	$user = '2068761_food';
	$password = 'julianli23';
	$dbName = '2068761_food';
	$dsn = "mysql:host=".$host.";dbname=".$dbName;
	$conn = new PDO($dsn, $user, $password);
	$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
?>