<?php 
	include("../../Funtion/funtion.php");
	$con = connect_db();
?>
<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>แสดงรายละเอียดของสินทรัพย์</title>
</head>

<body>
<?php
	
	$Asset_id=$_GET['id']; 
	$result=mysqli_query($con,"SELECT * FROM asset WHERE 
	 Asset_id='$Asset_id'") or die("SQL Error=>".mysqli_error($con));

	list($Asset_id,$Asset_code,$Asset_seria,$Asset_name,$mac_address,$computer_name,$brand,$Asset_date,$Asset_company,$Asset_price,$Asset_barcode,$Asset_Category,$Asset_photo,$Asset_time,$detail	)=mysqli_fetch_row($result);


    echo"รหัสสินทรัพย์ : $Asset_id";
	echo"<p><img src='../img/$Asset_photo'></p>";
	echo"เลขทะเบียนสินทรัพย์ : $Asset_code</p>";
	echo"Serial Number : $Asset_seria</p>";
	echo"ชื่อสินทรัพย์ : $Asset_name</p>";
	echo"Mac Address : $mac_address</p>";
	echo"Computer name : $computer_name</p>";
	echo"รุ่น / ยี่ห้อ : $brand </p>";
	echo"วันที่ซื้อ : $Asset_date</p>";
	echo"ซื้อจาก : $Asset_company</p>";
	echo"ราคา : $Asset_price</p>";
	echo"Barcode: $Asset_barcode</p>";
	echo"ประเภท : $Asset_Category</p>";
	echo"รายละเอียด : $detail</p>";
 	echo"บันทักข้อมูลเมื่อ : $Asset_time</p>";
	echo"</hr>";
	
	
	mysqli_free_result($result);
	mysqli_close($con); //ปิดฐานข้อมูล
?>
</body>
</html>