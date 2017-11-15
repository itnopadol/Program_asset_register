<?php
	//include("../../Funtion/funtion.php");
	$con = connect_db();
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Asset Total</title>
</head>
<style type="text/css">
.edittotal{
	font-size:18px;
	font-family:"TH Sarabun New", "Tw Cen MT";
	color:#000;
}
</style>
<body class="edittotal">
<?php
	$sql = "SELECT * FROM asset ORDER BY Asset_id ASC";
	$resulf = mysqli_query($con,$sql) or die ("MySQL =>".mysqli_error($con));	
	
	echo "<table border = 1 align='center' class='editbody'>";
	echo "<TH>รหัสสินทรัพย์</TH>";
	echo "<TH>หมายเลขทะเบียน</TH>";
	echo "<TH>Serial Number</TH>";
	echo "<TH>ชื่อสินทรัพย์</TH>";
	//echo "<TH>จำนวน</TH>";
	echo "<TH>หน่วยนับ</TH>";
	echo "<TH>วัน/เดือน/ปี</TH>";
	echo "<TH>บริษัท</TH>";
	echo "<TH>ราคา</TH>";
	echo "<TH>ประเภท</TH>";
	echo "<TH>ไฟล์รูปภาพ</TH>";
	echo "<TH>เวลาแก้ไข</TH>";
	while(list($Asset_id , $Asset_code ,$Asset_serial ,$Asset_name ,$Asset_receivr_amout ,$Asset_unit ,$Asset_date ,$Asset_company,
	$Asset_price,$Asset_barcode ,$Asset_category ,$Asset_photo ,$Asset_time) = mysqli_fetch_row($resulf)){
	$sql2 = "SELECT Category_name FROM category WHERE Category_id = $Asset_category";
		$Asset_category = mysqli_query($con,$sql2);
		list($Asset_category) = mysqli_fetch_row($Asset_category);
		echo "<TR align='center'>";
		echo "<TD>$Asset_id</TD>";
		echo "<TD>$Asset_code</TD>";
		echo "<TD>$Asset_serial</TD>";
		echo "<TD>$Asset_name</TD>";
		//echo "<TD>$Asset_receivr_amout</TD>";
		echo "<TD>$Asset_unit</TD>";
		echo "<TD>$Asset_date</TD>";
		echo "<TD>$Asset_company</TD>";
		echo "<TD>$Asset_price</TD>";
		echo "<TD>$Asset_category</TD>";
		echo "<TD>$Asset_photo</TD>";
		echo "<TD>$Asset_time</TD>";
		echo "</TR>";
	}
	echo "</table>";	
?>
</body>
</html>