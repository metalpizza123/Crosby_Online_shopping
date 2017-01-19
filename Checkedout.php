<?php
session_start();
?>
<!DOCTYPE HTML>
<html>
<body>
<form action="Usersplash.php">
<input type="submit" value="back to main page">
</form>
      <?php
      //print_r ($_POST);
      if ($_POST['checkoutprice']>$_SESSION['walletvalue']){
          echo "You don't have enough funds in your wallet";
          echo "<form method="post" action="Checkout.php">";
          echo "<input type="submit" name="gocheckoutpage" value="BASKET">";
          echo "</form>";
      }
      else { 
            require("connect.php");
            // set the PDO error mode to exception
            $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            $tim=time();
            $stmt=$conn->prepare("UPDATE Orders SET Verified=1, OrderDate=:tim WHERE UserID=:currentuser AND Verified=0");
            $stmt->bindParam(":tim", $tim);
            $stmt->bindParam(":currentuser", $_SESSION['username']);
            $stmt->execute();
            $newwalletvalue=$_SESSION['walletvalue']-$_POST['checkoutprice'];
            //echo $newwalletvalue;
            $stmt1=$conn->prepare("UPDATE Users SET Wallet=:newvalue WHERE Username=:currentuser "); 
            $stmt1->bindParam(":newvalue",$newwalletvalue);
            $stmt1->bindParam(":currentuser",$_SESSION['username']);
            $stmt1->execute();
            $_SESSION['walletvalue']=$newwalletvalue;
            //print_r($stmt->errorInfo());
            echo "Order successfully completed";
            //echo $_POST['checkoutprice'];
      }
?> 
    </body>
</html>