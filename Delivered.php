<?php
session_start();
	$deliveryconfirmed=$_POST['orderidtoconfirm'];
		require("connect.php");
	$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
	$stmt2=$conn->prepare("UPDATE   `Orders` SET Delivered=1 WHERE `OrderID`='$deliveryconfirmed'");
   	$stmt2->execute();
   	header("Location:deliverconfirm2.php");
?>