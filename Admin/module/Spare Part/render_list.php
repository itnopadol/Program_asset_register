<?php
include("../function/db_function.php");//include ไฟล์ที่เขียนฟังก์ชั่นไว้ใช้งาน
	$con=connect_db(); //เลือกใช้คำสั่งในการติดต่อฐานข้อมูล
	
	
	echo "<table border = 1 align='center'>";
	echo "<th>ลำดับ</th>";
	echo "<th>รุปภาพ</th>";
	echo "<th>รายการ</th>";
	echo "<th>ราคา</th>";
	echo "<th>จำนวนจ่าย</th>";
	echo "<th>จำนวนที่คืน</th>";

	
?>
<p align="center"><a href="render.php">กลับหน้า Index</a></p>
