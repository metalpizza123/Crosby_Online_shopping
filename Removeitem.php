<?php
session_start();
	$theorderthatwasgoinggone=$_POST['formproduct'];
 	$theoneweneedtodelete=$_POST['foodrefundname'];
 	$refundorder=$_POST['orderquantity'];
	require("connect.php");
	$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
	$stmt1=$conn->prepare("UPDATE products SET Stock='$refundorder' WHERE `Name`='$theoneweneedtodelete'");
	$stmt1->execute();
    $stmt2=$conn->prepare("DELETE FROM  `Orders` WHERE `UserID`=:currentuser AND `OrderID`=$theorderthatwasgoinggone");
   	$stmt2->bindParam(":currentuser",$_SESSION['username']);
   	$stmt2->execute();
   	header("Location:Checkout.php");
?>