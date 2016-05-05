
<!DOCTYPE HTML>
<html>
<body>
 

<form action="Enternew.html">
<input type="submit" value="back to enter data page">
</form>
      <?php
//echo "jkj";
//header('Content-Type: application/json');
//	ini_set('display_errors', 1);
//	ini_set('display_startup_errors', 1);
//	error_reporting(E_ALL);
				
	$pname=$_POST["pname"];
	$foodprice=$_POST["price"];
	$foodstock=$_POST["stock"]; 
	

//header('Content-Type: application/json');
	//ini_set('display_errors', 1);
	//ini_set('display_startup_errors', 1);
	//error_reporting(E_ALL);
				
	
	try {
   require("connect.php");
    // set the PDO error mode to exception
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $sql = "INSERT INTO products (ID,Name, Price, Stock)
    VALUES (NULL,'$pname', '$foodprice', '$foodstock')";
    // use exec() because no results are returned
    $conn->exec($sql);
    echo "New record created successfully";
    }
catch(PDOException $e)
    {
    echo $sql . "<br>" . $e->getMessage();
    }

$conn = null;
	
?> 
    </body>
</html>