<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>รายการวัสดุ / อุปกรณ์</title>
</head>

<body>
<h1 align='center'>รับคืนวัสดุ / อุปกรณ์</h1>
<form method ="post"  align='center'>
	<input type ="search" name='keyword' size="50"> <input type="submit" value="ค้นหา">
</form>
<?php
include("../function/db_function.php");//include ไฟล์ที่เขียนฟังก์ชั่นไว้ใช้งาน
	$con=connect_db(); //เลือกใช้คำสั่งในการติดต่อฐานข้อมูล
	
	if(empty($_POST['keyword'])){ //ถ้าไม่มีการส่งค่าค้นหามาจากไฟล์
		$keyword="";//กำหนดให้ตัวแปร $keyword ว่าง
	}
	else{
		$keyword=$_POST['keyword'];//รับค่าคำค้นมาจากฟอร์ม
	}
	
	$result = mysqli_query($con, "SELECT * FROM  lend_empsp") or die ("MySQL =>".mysqli_error($con));	
	
	
	$rows=mysqli_num_rows($result); //จำนวนแถวที่คิวรี่ออกมาได้
	if($rows==0){ // ถ้านับจำนวนแถวที่คิวรี่ออกมาได้เท่ากับ 0 แสดงว่าไม่มีข้อมูลที่ตรงกับคำค้นหา
		echo"<p>ไม่พบข้อมูลที่ครงกับคำค้น\"<b>$keyword</b>\"</p><hr>";
	}
	else{
		echo"<p align='center'>เลขที่ใบเบิกมีตรงกับคำค้น \"<b>$keyword</b>\"
มีทั้งหมด $rows รายการ </p>";

	//แสดงข้อมูล รหัสนักศึกษา คำนำหน้า ชื่อ นามสกุล ของนักศึกษาทุกคน
	$num=1;//กำหนดตัวแปรเพื่อนับแถว
	
	echo "<table border = 1 align='center'>";
	echo "<th>ลำดับที่</th>";
	echo "<th>วันที่เบิก</th>";
	echo "<th>รหัสพนักงาน</th>";
	echo "<th>ชื่อผู้เบิก</th>";
	echo "<th>แผนก</th>";
	echo "<th>เลืกรายการรับคืน</th>";
	
	while(list($No,$rent_empID,$rent_name,$rent_phone,$rent_date,$lend_status,$rent_department) = mysqli_fetch_row($result)){ 
	
	
	echo "<tr>";
	echo "<td align='center'>$No</td>";
	echo "<td align='center'>$rent_date</td>";
	echo "<td align='center'>$rent_empID</td>";
	echo "<td align='center'>$rent_name</td>";
	echo "<td align='center'>$rent_department</td>";
	echo "<td align='center'><a href=''>เลือก</TD>";


	
	echo "</tr>";
	$num++;//เพิ่มค่าตัวแปรนับแถว
	}
	echo"</table>";
	
	mysqli_free_result($result);//คืนค่าหน่วยความจำให้กับระบบ
	mysqli_close($con); //ปิดฐานข้อมูล
	}
?>
<p align="center"><a href="menu_rent.php">กลับหน้า Index</a></p>
</body>
</html>
</html>