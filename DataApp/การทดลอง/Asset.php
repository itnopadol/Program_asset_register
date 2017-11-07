<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Asset Register</title>
</head>

<body>
<?php
	include("Funtion/funtion.php");
	$con = connect_db();
	
	
	$resulf = mysqli_query($con,"SELECT * FROM active_point")or die 
	("MYSQL Error".mysqli_error($con));
	
	echo "<table border = 1>";
	echo "<TH>รหัสจุดใช้งาน </TH>";
	echo "<TH>ชื่อจุดใช้งาน</TH>";

	while(list($Active_id , $Active_name) = mysqli_fetch_row($resulf)){
		
		echo "<TR>";
		echo "<TD>$Active_id</TD>";
		echo "<TD>$Active_name</TD>";
		echo "</TR>";
		echo "</table>";
	}

?>
</body>
</html>