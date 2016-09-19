<!DOCTYPE HTML>
<html>
<body>
    <form method="post" action="<?php echo $_SERVER['PHP_SELF'];?>">
    <p> What do yawffwaf?</p>
    <select name="formproduct" id="formproduct">
    <?php
try {   require("connect.php");
    // set the PDO error mode to exception
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
     $stmt = $conn->prepare("SELECT Name FROM products"); 
     $stmt->execute();
     // set the resulting array to associative
     //$result = $stmt->setFetchMode(PDO::FETCH_ASSOC); 
while($data=$stmt->fetch(PDO::FETCH_ASSOC)){ 
    //this is where the table is actually produced
    echo( '<option value="'.$data['Name'].'">'.$data['Name']."</option>");
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
           <form method="post" action="edititem.php">

<input type="int" name="uniqueid" value="'.$data2['ID'].'" readonly><br>
<input type="text" name="pname" value="'.$data2['Name'].'"><br>
<input type="int" name="price" value="'.$data2['Price'].'"><br>
<input type="int" name="stock" value="'.$data2['Stock'].'"><br>
<input type="submit" value="Send Data">
</form> ';
                                 
            //need to convert this to reflect the get command from the mysql database
        }
    else { echo ( 'NOENEOENFEONFEOFNEOFNEONF'
                );}
        ?>
    </body>
</html>