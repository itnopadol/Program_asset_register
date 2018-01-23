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
	
	$result="UPDATE category SET  Category_name = '$_POST[Category_name]'
	WHERE Category_id = '$_POST[Category_id]'";
	
	
mysqli_query($con,	$result)or die ("edit".mysqli_error($con));
mysqli_close($con);
echo "<script>alert('แก้ไขข้อมูลเรียบร้อยแล้ว')</script>";
echo "<script>window.location='list_category.php'</script>";
?>
</body>
</html>