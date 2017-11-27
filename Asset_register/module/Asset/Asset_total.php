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
<form method="GET">
	<input type="search" name="keyword" size="80"> 
    <input type="submit" value="ค้นหา" name="Form1">


</form>
<?php
	$sql = "SELECT * FROM asset ORDER BY Asset_id ASC";
	$resulf = mysqli_query($con,$sql) or die ("MySQL =>".mysqli_error($con));	
	$rows = mysqli_num_rows($resulf);
	
	if(empty($_GET['keyword'])){ //ถ้าไม่มีการใส่คำค้นหาจากไฟล์
		$keyword = ""; //กำหนดให้ตัวแปร $keyword ว่าง	
	}
	else{
		$keyword = $_GET['keyword']; //รับค่าคำค้นมาจากฟอร์ม
	}
	if($rows == 0){ //ถ้านับจำนวนแถวที่คิวรี่ออกมาได้เท่ากับ 0 แสดงว่าไม่มีข้อมูลที่ตรงกับคำค้น
		echo "<p>ไม่ตรวจพบข้อมูลที่ตรงกับคำค้น \"<b>$keyword</b>\"</p>";	
	}
	
	echo "<table border = 1 align='center' class='editbody'>";
	echo "<TH>รหัสสินทรัพย์</TH>";
	echo "<TH>หมายเลขทะเบียน</TH>";
	echo "<TH>Serial Number</TH>";
	echo "<TH>ชื่อสินทรัพย์</TH>";
	
	echo "<TH>Computer</TH>";
	echo "<TH>Bran</TH>";
	echo "<TH>เวลาซื้อ</TH>";
	echo "<TH>ซื้อจาก</TH>";
	echo "<TH>ประเภท</TH>";
	echo "<TH>ประเภท</TH>";
	echo "<TH>แก้ไข</TH>";
	echo "<TH>ลบ</TH>";
	echo "<TH>ไฟล์รูป</TH>";
	
	while(list($Asset_id , $Asset_code ,$Asset_serial ,$Asset_name ,$Asset_receivr_amout ,$Asset_unit ,$Asset_date ,$Asset_company,
	$Asset_price,$Asset_barcode ,$Asset_category ,$Asset_photo ,$Asset_time) = mysqli_fetch_row($resulf)){
	$sql2 = "SELECT Category_name FROM category WHERE Category_id = $Asset_category";
		$Category_id = mysqli_query($con,$sql2);
		list($Category_id) = mysqli_fetch_row($resulf);
		echo "<TR align='center'>";
		echo "<TD>$Asset_id</TD>";
		echo "<TD>$Asset_code</TD>";
		echo "<TD>$Asset_serial</TD>";
		echo "<TD><a href='index.php?module=2&action=15&id=$Asset_id'>$Asset_name</a></TD>";
		
		echo "<TD>$Asset_unit</TD>";
		echo "<TD>$Asset_date</TD>";
		echo "<TD>$Asset_company</TD>";
		echo "<TD>$Asset_price</TD>";
		echo "<TD>$Asset_category</TD>";
		echo "<TD>$Asset_photo</TD>";
		
		echo "<TD><a href='index.php?module=2&action=9&id=$Asset_id' onclick='return confirm(\"กดปุ่ม ตกลงเพื่อยืนยัน\")'>
		<img src='img/if_brush-pencil.png'  width='30'  height='30'></a></TD>";		
		echo "<TD><a href='index.php?module=2&action=10&id=$Asset_id' onclick='return confirm(\"กดปุ่ม ตกลงเพื่อยืนยัน\")'>
		<img src='img/if_58_Cross.png'  width='30'  height='30'></a></TD>";
		echo "<TD>$Asset_time</TD>";
		echo "</TR>";
	}
	echo "</table>";	
?>
</body>
</html>