<!DOCTYPE HTML>
<html>
<head>
</head>
<body>
<table>
<?php 
echo $_POST["nosrow"];
for ($counter=0;$counter<$_POST["nosrow"];$counter++){
echo "<tr><td> Row</td></tr>";
}
?>
</table>
</body>
</html>

