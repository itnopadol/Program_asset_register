<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>Untitled Document</title>
</head>
<body>
<?php
include("../function/db_function.php");
	$con=connect_db();
	
	$result="UPDATE asset SET status = '$_POST[status]'";
	
mysqli_query($con,	$result)or die ("edit".mysqli_error($con));
mysqli_close($con);
echo "<script>alert('แก้ไขข้อมูลเรียบร้อยแล้ว')</script>";
echo "<script>window.location='list_status.php'</script>";
?>
</body>
</html>