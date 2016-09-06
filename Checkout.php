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
	session_start();

	set int $totalprice =0;
		try {   require("connect.php");
 	    // set the PDO error mode to exception
		//find the orders not confirmed yet
		// add each row to the table like a drop down list
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $stmt=$conn-> prepare("SELECT * FROM 'products' WHERE 'UserID'=$_SESSON['username'] AND 'confirmed'= FALSE ");

    //find the products that have been ORDERED but not confirmed 
    //loop to spawn the tabele
    //Name, quantity, total price, remove button
    //Last row needs to  add a sum of all prices
	?>
</table> 
<form action="Checkedout.php">
<input type="submit" name='confirmorder' value="Checkout">
</form>
<!-- ADD A BUTTON TO CHECK OUT AND DEDUCT FROM THEIR WALLET AND CHANGE CONFIRM  -->
</body> 
</html>
