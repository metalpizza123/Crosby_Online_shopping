<!DOCTYPE HTML>
<html>
<body>
	<?php
	session_start();
	echo "Welcome to the admin splash page";
	session_write_close();
	?>
	<form method="post" action="insertnewitem.php">
	<input type="submit" name="goaddnewproduct" value="Add New Product">
	</form>
	<form method="post" action="edititem.php">
	<input type="submit" name="goeditproduct" value="Edit Current Product Details">
	</form>
	<form method="post" action="edititem.php">
	<input type="submit" name="goaddnewuser" value="Add New User">
	</form>
	<form method="post" action="edituser.php">
	<input type="submit" name="goedituser" value="Edit Current User Details">
	</form>
	<form method="post" action="Pending.php">
	<input type="submit" name="gopendingpage" value=" PENDING ORDERS">
	</form>
	<form method="post" action="History.php">
	<input type="submit" name="goreport" value="REPORT">
	</form>
</body>
</html>
