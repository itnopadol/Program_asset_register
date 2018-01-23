<?php 
	//include("../../Funtion/funtion.php");
	$con = connect_db();
?>
<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>แสดงรายละเอียดของสินทรัพย์</title>
</head>
<style>
#XD{
	color:#000;
	background-color:#FFC;
}
</style>
<body>
<?php
	
	$Asset_id=$_GET['id']; 
	$result=mysqli_query($con,"SELECT * FROM asset WHERE 
	 Asset_id = '$Asset_id' ") or die("SQL Error=>".mysqli_error($con));

	list($Asset_id,$Asset_code,$Asset_seria,$Asset_name,$mac_address,$computer_name,$brand,$Asset_date,$Asset_company,$Asset_price,$Asset_barcode,$Asset_Category,$Asset_photo,$Asset_time,$detail,$Asset_status,$active_point ,$Asset_log ,$Asset_remand	)=mysqli_fetch_row($result);
	
	$result = mysqli_query($con ,"SELECT Category_name FROM category WHERE Category_id = '$Asset_Category' ")
	or die("SQL Error2=>".mysqli_error($con)) ;
	list($Asset_Category) = mysqli_fetch_row($result);
	
	$result2 = mysqli_query($con ,"SELECT Status_name FROM status WHERE Status_id = '$Asset_status' ")
	or die("SQL Error2=>".mysqli_error($con)) ;
	list($Status_name) = mysqli_fetch_row($result2); 
	
	echo "<div align='center'><table border='1'>";
	echo "<TH id='XD'>";
    echo"รหัสสินทรัพย์ : $Asset_id";
	$Asset_photo = empty($Asset_photo)?"proflie.png":$Asset_photo;
	echo "<P><img src='img/$Asset_photo' style='width:350px;height:350px;'></P>";
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
	echo"<P>สถานะปัจจุบัน : $Status_name <img src='img/$Asset_status.png' style='width:35px;height:35px;'></p>";
 	echo"<P>แก้ไขข้อมูลล่าสุดเมื่อ : $Asset_remand </p>";
	echo"</hr>";
	echo "</div></table>";
	echo "</th>";
	mysqli_free_result($result);
	mysqli_close($con); //ปิดฐานข้อมูล
?>
</body>
</html>