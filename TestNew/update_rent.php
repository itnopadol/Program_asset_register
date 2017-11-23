<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>Untitled Document</title>
</head>
<body>
<?php
	//include("../../Funtion/funtion.php");
	$con=connect_db();
	
	$result="UPDATE rent SET
				name = '$_POST[name]',
				brand = '$_POST[brand]',
				price  = '$_POST[price]', 
				stock = '$_POST[stock]' 
				WHERE  rent_id= '$_POST[Old_id]'";

	
mysqli_query($con,$result)or die ("edit".mysqli_error($con));
mysqli_close($con);
echo "<script>alert('แก้ไขข้อมูลเรียบร้อยแล้ว')</script>";
echo "<script>window.location='list_rent.php'</script>";
?>
</body>
</html>