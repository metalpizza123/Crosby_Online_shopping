<?php
session_start();
	$theorderthatwasgoinggone=$_POST['formproduct'];
	$quantityrefundamount=$_POST['orderquantity'];
 	$theoneweneedtodelete=$_POST['foodrefundname'];
	require("connect.php");
	$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
	$stmt=$conn->prepare("SELECT * FROM products WHERE `ID`='$theorderthatwasgoinggone'");
	$stmt->execute();
	$oldstock=$stmt->fetch(PDO::FETCH_ASSOC);
	$refundorder=$oldstock['Quantity']+$quantityrefundamount;
	$stmt1=$conn->prepare("UPDATE products SET Stock='$refundorder' WHERE `Name`='$theoneweneedtodelete'");
	$stmt1->execute();
    $stmt2=$conn->prepare("DELETE FROM  `Orders` WHERE `UserID`=:currentuser AND `OrderID`=$theorderthatwasgoinggone");
   	$stmt2->bindParam(":currentuser",$_SESSION['username']);
   	$stmt2->execute();
   	header("Location:Checkout.php");
?>