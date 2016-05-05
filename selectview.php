<!DOCTYPE HTML>
<html>
<header>
</header>
<body>
            <form method="post" action="#">

	Cheese: <select name = "chosenfood" onclick="pi(this.value)"> 
	<option value =" selected disabled">Please select a FOOD...</option>
	
<?php

try {require("connect.php"); 
     
     $stmt = $conn->prepare("SELECT * FROM Drinks"); 
     $stmt->execute();
        // set the resulting array to associative
	$result = $stmt->setFetchMode(PDO::FETCH_ASSOC);
	while ($row = $stmt->fetch()) {
	//while($row = $stmt->setFetchMode(PDO::FETCH_ASSOC)){
		echo "<option value=" . $row['Name'] . ">" . $row['Name'] . "</option>";
	}
}
    catch(PDOException $e) {
     echo "Error: " . $e->getMessage();
}
$conn = null;
    ?>



</select>
    </form>
    <p id="1">Selected Food</p>
        
        <script>
            
        function pi(chosenfood){
          //  alert("this works");
        document.getElementById(1).innerHTML = chosenfood}
        </script>
</body>
</html>