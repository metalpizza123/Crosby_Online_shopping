<!DOCTYPE HTML>
<html>
<body>
	<?php
	session_start();
	echo "Welcome to your splash page";
	echo($_SESSION['username']);
	session_write_close();
	?>
	<form method="post" action="Buypage.php">
	<input type="submit" name="gobuypage" value="CATALOG">
	</form>
	<form method="post" action="Checkout.php">
	<input type="submit" name="gocheckoutpage" value="BASKET">
	</form>
	<form method="post" action="Pending.php">
	<input type="submit" name="gopendingpage" value=" PENDING ORDERS">
	</form>
	<form method="post" action="History.php">
	<input type="submit" name="gohistorypage" value="ORDER HISTORY">
	</form>
</body>
</html>
