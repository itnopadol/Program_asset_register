<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>เพิ่มรายการ</title>
</head>
<body>
<?php 
	//include("../../Funtion/funtion.php");// include ไฟล์ที่เขียนฟังก์ชันไว้เข้ามาใช้งาน
	$con=connect_db();//เรียกใช้ฟงัก์ชั่นในการติดต่อฐานข้อมูล
?>
<h2>ฟอร์มเพิ่มรายการ</h2>
<form method="post" action="insert_rent.php">
<p>รหัสวัสดุ: <input type="text" name="rent_id" disabled="disabled" size=20 required></p>
<p>รายการ: <input type="text" name="name" size=20 required></p>
<p>รุ่น / ยี่ห้อ : <input type="text" name="brand" size=20 required></p>
<p>ราคา: <input type="text" name="price" size=20 required></p>
<p>Stock: <input type="text" name="stock" size=20 required></p>
<hr>
<input type="submit" name="button" id="button" value="เพิ่มข้อมูล">
<input type="reset" name="button2" id="button2" value="ยกเลิก">
</form>
</body>
</html>