
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Insert into Rent</title>
</head>

<body>
<?php
	//include("../../Funtion/funtion.php");//include ไฟล์ที่เขียนฟังก์ชั่นไว้ใช้งาน
	$con=connect_db();
	
	/*$sql = "INSERT INTO rent (Rent_id,Rent_asset,Rent_emp,Rent_active,Rent_time) 
	VALUES 
	('',
	'$_POST[Rent_asset]'
	,'$_POST[Rent_emp]'
	,'$_POST[Rent_active]'
	,'$_POST[Rent_time]'
	)";*/
	$sql = "INSERT INTO rent (Rent_id,Rent_asset,Rent_emp,Rent_active,Rent_time,Rent_ect) 
	VALUES 
	('',
	'$_GET[Rent_asset]'
	,'$_GET[Rent_emp]'
	,'$_GET[Rent_active]'
	,'$_GET[Rent_time]'
	,'$_GET[Rent_ect]'
	)";
	mysqli_query($con, $sql) or die("Error =" .mysqli_error($con));
	
	$sql2 = "UPDATE asset SET Asset_status = '04'
	,active_point = '$_GET[Rent_active]'
	WHERE Asset_id = '$_GET[Rent_asset]' ";
	mysqli_query($con, $sql2) or die("Error Delete" . mysqli_error($con));
	
	
	mysqli_close($con);
	echo "<script>window.location='index.php?module=5&action=31'</script>";
	
    ?>
</body>
</html>