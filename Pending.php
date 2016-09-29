<?php
session_start();
?>
<!DOCTYPE HTML>
<html>
<body>
<table>
	<tr>
		<th> Item name     </th> 
		<th> Quantity      </th>
		<th> Total Price   </th>
		<th> Order Date    </th>
		</tr>
	<?php
			require("connect.php");
 	    // set the PDO error mode to exception
		//find the orders not confirmed yet
		// add each row to the table like a drop down list
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $stmt=$conn->prepare("SELECT * FROM Orders WHERE UserID=:currentuser AND Verified=1 AND Delivered=0");
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
        $dateordered=$data['OrderDate'];
        $convertdt=new DateTime("@$dateordered");
        $truedate=$convertdt->format('Y-m-d H:i:s');     
        //$dateordered=date("l jS \of F Y h:i:s A"[$data['OrderDate']]);
    	echo "<td>".$data2['Name']."</td>";
    	echo "<td>".$data['Quantity']."</td>";
    	echo "<td>".$data['Price']."</td>";
    	echo "<td>".$truedate."</td></tr>";
    }
  
	?>
</table> 

<form action="Usersplash.php">
<input type="submit" name='confirmorder' value="Back splash page">
</form>
<!-- ADD A BUTTON TO CHECK OUT AND DEDUCT FROM THEIR WALLET AND CHANGE CONFIRM VALUES -->
</body> 
</html>