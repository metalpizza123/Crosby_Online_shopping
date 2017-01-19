<!DOCTYPE HTML>
<html>
<body>
<form action="Dropdown.php">
    <input type="submit" value="back to edit data page">
</form>
<form method="post" action="Adminsplash.php">
    <input type="submit" name="gohome" value="Back to Splash Page">
</form>
      <?php
    $productid=$_POST["uniqueid"];
	$pname=$_POST["pname"];
	$foodprice=$_POST["price"];
	$foodstock=$_POST["stock"];
try {
   require("connect.php");
    // set the PDO error mode to exception
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $sql = "UPDATE products SET Name='$pname', Price='$foodprice', Stock='$foodstock' where ID='$productid'";
    // use exec() because no results are returned
    $conn->exec($sql);
    echo "record edited successfully";
    }
catch(PDOException $e)
    {
    echo $sql . "<br>" . $e->getMessage();
    }

$conn = null;
	
?> 
    </body>
</html>