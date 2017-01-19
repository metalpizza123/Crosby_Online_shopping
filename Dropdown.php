<!DOCTYPE HTML>
<html>
<body>
    <form method="post" action="<?php echo $_SERVER['PHP_SELF'];?>">
    <p> What do you want to edit?</p>
    <select name="formproduct" id="formproduct">
    <?php

    ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

try {   require("connect.php");
    // set the PDO error mode to exception
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
     $stmt = $conn->prepare("SELECT Name FROM products"); 
     $stmt->execute();
     // set the resulting array to associative
     //$result = $stmt->setFetchMode(PDO::FETCH_ASSOC); 
     $data=$stmt->fetchAll(PDO::FETCH_ASSOC);
     foreach ($data as $key => $value) {
         if($_POST['formproduct']==$value['Name']){
            echo( '<option selected value="'.$value['Name'].'">'.$value['Name']."</option>");
         } 
         else {
            echo( '<option value="'.$value['Name'].'">'.$value['Name']."</option>");
         }     
     }
 }
       catch(PDOException $e) {
     echo "Error: " . $e->getMessage();
}
 ?>        
    </select>
   <br>
<input type="submit" name="refreshtable" value="check item">
            </form>
    <?php
    //isset is a command to check if anything is currently assigned to the variable name
        if ( isset ($_POST['refreshtable'])){
        echo $_POST['formproduct'] ;
            //grabbing the relevant info for the table itself
            $stmt2=$conn->prepare( "SELECT * FROM `products` WHERE `Name` = :item");
            $stmt2->bindParam(":item", $_POST['formproduct']);
            $stmt2->execute();
            $data2=$stmt2->fetch(PDO::FETCH_ASSOC);                    
           echo '<br>
           <table>
           <form method="post" action="edititem.php">
<tr><td>Product ID</td><td><input type="int" name="uniqueid" value="'.$data2['ID'].'" readonly></td></tr>
<tr><td>Product Name</td><td><input type="text" name="pname" value="'.$data2['Name'].'"></td></tr>
<tr><td>Product Price</td><td><input type="int" name="price" value="'.$data2['Price'].'"></td></tr>
<tr><td>Product Stock</td><td><input type="int" name="stock" value="'.$data2['Stock'].'"></td></tr>
</table>
<input type="submit" value="Send Data">
</form> ';                               
            //need to convert this to reflect the get command from the mysql database
        }
        ?>
<form method="post" action="Adminsplash.php">
    <input type="submit" name="gohome" value="Back to Splash Page">
</form>
    </body>
</html>