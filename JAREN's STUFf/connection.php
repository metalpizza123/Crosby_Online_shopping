<?php
	$host = 'localhost';
	$username = 'root';
	$password = 'raspberry';
	$database = 'test';

	$connection = new mysqli($host, $username, $password, $database);

if (mysqli_connect_errno()) {
	printf("Connect failed: %s/n", mysqli_connect_error());
	exit();
	}


	//$db = new PDO("mysql:host=$host; dbname=$database",'$username','$password')
  ?>
