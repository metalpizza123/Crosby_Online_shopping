<?php
session_start();
?>
<!DOCTYPE HTML>
<html>
<body>
<table>
	<tr>
		<th> Item Name</th> 
		<th> Quantity </th>
		<th> Total Price </th>
		<th> Remove Order </th>
		</tr>
	<?php
		$totalprice =0;
		require("connect.php");
 	    // set the PDO error mode to exception
		//find the orders not confirmed yet
		// add each row to the table like a drop down list
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $stmt=$conn->prepare("SELECT * FROM `Orders` WHERE `UserID`=:currentuser AND 'Verified'=0");
    $stmt->bindParam(":currentuser",$_SESSION['username']);
    $stmt->execute();
    while($data=$stmt->fetch(PDO::FETCH_ASSOC)){
    	//find the products that have been ORDERED but not confirmed 
    //loop to spawn the tabele
    //Name, quantity, total price, remove 
    	echo("<tr>");
    	$stmt1=$conn->prepare("SELECT * FROM products WHERE `ID`=:itemID");
    	$stmt1->bindParam(":itemID",$data['ProductID']);
    	$stmt1->execute();
		$data2=$stmt1->fetch(PDO::FETCH_ASSOC);
		$foodid=$data['ProductID'];
    	echo ("<td>".$data2['Name']."</td>");
    	echo ("<td>".$data['Quantity']."</td>");
    	echo ("<td>".$data['Price']."</td>");
    	echo ("<td> <form method='post' action='Removeitem.php'>");
    	echo ("<input name='formproduct' value="$data['OrderID']">");    
    	echo ("<input type='submit' name='removeorder' value='Remove order'>");
    	echo ("</form>");
    	echo ("</td></tr>");


    }
    //Last row needs to  add a sum of all prices
	?>
</table> 
<form action="Checkedout.php">
<input type="submit" name='confirmorder' value="Checkout">
</form>
<!-- ADD A BUTTON TO CHECK OUT AND DEDUCT FROM THEIR WALLET AND CHANGE CONFIRM VALUES -->
</body> 
</html>