<!DOCTYPE HTML>
<html>
<body>
<form action="Addnewuser.html">
<input type="submit" value="back to enter data page">
</form>
      <?php
	$username=$_POST["username"];
	$initialwallet=$_POST["initialwallet"];
	$pword=$_POST["pword"]; 
	try {
   require("connect.php");
    // set the PDO error mode to exception
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $sql = "INSERT INTO Users (UserID, Wallet, Username, Password)
    VALUES (NULL,'$initialwallet', '$username', '$pword')";
    // use exec() because no results are returned
    $conn->exec($sql);
    echo "New User added successfully";
    }
catch(PDOException $e)
    {
    echo $sql . "<br>" . $e->getMessage();
    }
?> 
<form method="post" action="Adminsplash.php">
    <input type="submit" name="gohome" value="Back to Splash Page">
</form>

    </body>
</html>