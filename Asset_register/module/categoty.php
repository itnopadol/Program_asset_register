<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Category</title>
</head>

<body>
<?php
	include("../Funtion/funtion.php");
	$con = connect_db();
	
	$resulf = mysqli_query($con,"SELECT * FROM category")
	or die ("MySQL Error =>".mysqli_errno($con));
	
	echo "<table border = 1 >";
	echo "<TH>รหัสประเภท</TH>";
	echo "<TH>ชื่อประเภท</TH>";
	
	while(list($Category_id , $Category_name) = mysqli_fetch_row($resulf)){
		
		echo "<TR>";
		echo "<TD>$Category_id</TD>";
		echo "<TD>$Category_name</TD>";
		echo "</TR>";		

	}
	echo "</table>";
?>
</body>
</html>