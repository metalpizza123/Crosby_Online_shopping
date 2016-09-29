<?php
session_start();
?>
<!DOCTYPE HTML>
<html>
<body>
<form action="Usersplash.php">
<input type="submit" value="back to shopping page">
</form>
      <?php
   require("connect.php");
       // set the PDO error mode to exception
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $tim=time();
    $stmt=$conn->prepare("UPDATE Orders SET Verified=1, OrderDate=:tim WHERE UserID=:currentuser AND Verified=0");
    $stmt->bindParam(":tim", $tim);
    $stmt->bindParam(":currentuser", $_SESSION['username']);
    $stmt->execute();
    print_r($stmt->errorInfo());
    echo "Order successfully completed";
?> 
    </body>
</html>