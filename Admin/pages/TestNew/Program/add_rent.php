<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>เพิ่มข้อมูลรายละเอียดสินทรัพย์</title>
</head>
<body>
<?php 
	include("../function/db_function.php");// include ไฟล์ที่เขียนฟังก์ชันไว้เข้ามาใช้งาน
	$con=connect_db();//เรียกใช้ฟงัก์ชั่นในการติดต่อฐานข้อมูล
?>
<h2>ฟอร์มรับวัสดุ</h2>
<form method="post" action="insert.php">
<p>รหัสวัสดุ: <input type="text" name="Asset_id" disabled="disabled" size=20 required></p>
<p>รายการ: <input type="text" name="Asset_name" size=20 required></p>
<p>รุ่น / ยี่ห้อ : <input type="text" name="brand" size=20 required></p>
<p>จำนวน  : <input type="text" name="Asset_receivr_amout" size=20 required></p>
<p>ซื้อจาก : <input type="text" name="Asset_company" size=20 required></p>
<p>วันที่ซื้อ : <input type="date" name="Asset_date" size=20 required></p>
<hr>
<input type="submit" name="button" id="button" value="เพิ่มข้อมูล">
<input type="reset" name="button2" id="button2" value="ยกเลิก">
</form>
</body>
</html>