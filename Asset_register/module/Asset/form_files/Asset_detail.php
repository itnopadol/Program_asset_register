<?php
	//include("../../Funtion/funtion.php");
	$con = connect_db();
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Asset Detail</title>
</head>
<style type="text/css">
.edittotal{
	font-size:18px;
	font-family:"TH Sarabun New", "Tw Cen MT";
	color:#000;
}
</style>
<body class="edittotal">
<H2 align="center">แสดงข้อมูลรายละเอียดต่างๆ ของทะเบียนสินทรัพย์</H2>
<?php
	$Asset_id = $_GET['id'] ;
	
	$sql = "SELECT * FROM asset WHERE Asset_id = '$Asset_id' ";
	$resulf =  mysqli_query($con,$sql) or die ("MySQL Error =>".mysqli_error($con));
	
	while(list($Asset_id , $Asset_code ,$Asset_serial ,$Asset_name ,$Asset_receivr_amout ,$Asset_unit ,$Asset_date ,$Asset_company,
	$Asset_price,$Asset_barcode ,$Asset_category ,$Asset_photo ,$Asset_time) = mysqli_fetch_row($resulf)){
		$sql2 = "SELECT Category_name FROM category WHERE Category_id = $Asset_category";
		$Asset_category = mysqli_query($con,$sql2);
		list($Asset_category) = mysqli_fetch_row($Asset_category);
		
		$Asset_photo = empty($Asset_photo)?"default.jpg":$Asset_photo;
		echo "<img src='../Img/$Asset_photo'>";	
		echo "<P>No. : $Asset_id</P>";
		echo "<P>หมายเลขทะเบียน : $Asset_code</P>";
		echo "<P>Se rial : $Asset_serial</P>";
		echo "<P>ชื่อสินทรัพย์ : $Asset_name</P>";
		echo "<P>หน่วยนับ : $Asset_unit</P>";
		echo "<P>วันเดือนปีที่ซื้อ : $Asset_date</P>";
		echo "<P>บริษัทที่ซื้อ : $Asset_company</P>";
		echo "<P>ราคาที่ซื้อ : Asset_price</P>";
		echo "<P>ประสินทรัพย์ : $Asset_category</P>";
		echo "<P>รูปภาพ : $Asset_photo</P>"; 
		echo "<P>เวลาที่แก้ไขล่าสุด : $Asset_time</P>";
		}
?>
</body>
</html>