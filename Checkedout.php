<!DOCTYPE HTML>
<html>
<body>
<form action="Buypage.php">
<input type="submit" value="back to shopping page">
</form>
      <?php

   require("connect.php");
        echo $productid;
    // set the PDO error mode to exception
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $sql = "UPDATE Orders SET Confirmed='TRUE' where userID='userID' AND Confirmed='FALSE' ";
    // use exec() because no results are returned
    $conn->exec($sql);
    echo "Order successfully completed";
    }
catch(PDOException $e)
    {
    echo $sql . "<br>" . $e->getMessage();
    }

$conn = null;
	
?> 
    </body>
</html>