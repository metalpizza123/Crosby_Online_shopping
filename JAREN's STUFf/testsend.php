<?php

include 'connection.php';

$test = $_POST['test'];
echo $test;
$query = "INSERT INTO test (test) VALUES ($test)";
echo $query;
if(mysqli_query($connection, $query)) {
			echo '<script type="text/javascript">';
			echo ' alert("Team Added!")';
			echo '</script>';
		}	else{
	die(‘error’);
echo '<script type="text/javascript">';
			echo ' alert("test failed!")';
			echo '</script>';
}


?>
