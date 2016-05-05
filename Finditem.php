<?php
header('Content-Type: application/json');
	ini_set('display_errors', 1);
	ini_set('display_startup_errors', 1);
	error_reporting(E_ALL);
				
	$var = htmlspecialchars("%" . $_GET['']. "%");
	$query = $db->prepare("SELECT * FROM `Name` WHERE `NameofItem` LIKE :itemname");
	$query->bindParam(":itemname", $var);
	$query->execute();
	$data = array();
	while($arr = $query->fetch(PDO::FETCH_ASSOC)){
		print_r($arr);
		$asdfg = $arr['NameofItem'];
		array_push($data, $asdfg);
	}
	print(json_encode($data));
	
	
catch(PDOException $e)
    {
    echo $sql . "<br>" . $e->getMessage();
    }

$conn = null;
	
?>