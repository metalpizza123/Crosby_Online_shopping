<!DOCTYPE HTML>
<html>
<body>
<form action="Dropdown.php">
<input type="submit" value="back to edit data page">
</form>
      <?php
//echo "jkj";
//header('Content-Type: application/json');
//	ini_set('display_errors', 1);
//	ini_set('display_startup_errors', 1);
//	error_reporting(E_ALL);
    $productid=$_POST["uniqueid"];
	$pname=$_POST["pname"];
	$foodprice=$_POST["price"];
	$foodstock=$_POST["stock"]; 
	//header('Content-Type: application/json');
	//ini_set('display_errors', 1);
	//ini_set('display_startup_errors', 1);
	//error_reporting(E_ALL);
try {
   require("connect.php");
        echo $productid;
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