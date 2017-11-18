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
	
	$result = mysqli_query($con ,"SELECT Category_name FROM category WHERE Category_id = '$Asset_Category' ")
	or die("SQL Error2=>".mysqli_error($con)) ; //เขียนเริ่มจากขวาไปซ้าย
	list($Asset_Category) = mysqli_fetch_row($result); //เขียนเริ่มจากขวาไปซ้าย
	echo "<div align='center'>";
    echo"รหัสสินทรัพย์ : $Asset_id";
	$Asset_photo = empty($Asset_photo)?"default.jpg":$Asset_photo;
	echo "<P><img src='images/$Asset_photo' style='width:350px;height:350px;'></P>";
	echo"<P>เลขทะเบียนสินทรัพย์ : $Asset_code</p>";
	echo"<P>Serial Number : $Asset_seria</p>";
	echo"<P>ชื่อสินทรัพย์ : $Asset_name</p>";
	echo"<P>Mac Address : $mac_address</p>";
	echo"<P>Computer name : $computer_name</p>";
	echo"<P>รุ่น / ยี่ห้อ : $brand </p>";
	echo"<P>วันที่ซื้อ : $Asset_date</p>";
	echo"<P>ซื้อจาก : $Asset_company</p>";
	echo"<P>ราคา : $Asset_price</p>";
	echo"<P>Barcode: $Asset_barcode</p>";
	echo"<P>ประเภท : $Asset_Category</p>";
	echo"<P>รายละเอียด : $detail</p>";
 	echo"<P>บันทักข้อมูลเมื่อ : $Asset_time</p>";
	echo"</hr>";
	echo "</div>";
	
	mysqli_free_result($result);
	mysqli_close($con); //ปิดฐานข้อมูล
?>
</body>
</html>