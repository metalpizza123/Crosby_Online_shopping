<?php
session_start();
session_destroy();
?>
<!DOCTYPE HTML>
<html>
<body>
<form method ="post" action= "Passcheck.php">    
<input type ="text" name="username" value="">
<input type="text" name="password" value="">
<input type="submit" name="truesubmit" value="Log In">
</form> 
</body>
</html>