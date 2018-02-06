<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>รายการวัสดุ / อุปกรณ์</title>
</head>

<body>
<h1 align='center'>รายการวัสดุ / อุปกรณ์</h1>
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
	
	$result = mysqli_query($con, "SELECT * FROM spare_part WHERE  name  LIKE '%$keyword%' OR category LIKE '%$keyword%'OR brand ORDER BY id ASC  ") or die ("MySQL =>".mysqli_error($con));	
	
	$rows=mysqli_num_rows($result); //จำนวนแถวที่คิวรี่ออกมาได้
	if($rows==0){ // ถ้านับจำนวนแถวที่คิวรี่ออกมาได้เท่ากับ 0 แสดงว่าไม่มีข้อมูลที่ตรงกับคำค้นหา
		echo"<p>ไม่พบข้อมูลที่ครงกับคำค้น\"<b>$keyword</b>\"</p><hr>";
	}
	else{
		echo"<p align='center'>ชื่อรายการวัสดุ - อุปกรณ์มีตรงกับคำค้น \"<b>$keyword</b>\"
มีทั้งหมด $rows รายการ </p>";

	//แสดงข้อมูล รหัสนักศึกษา คำนำหน้า ชื่อ นามสกุล ของนักศึกษาทุกคน
	$num=1;//กำหนดตัวแปรเพื่อนับแถว
	
	echo "<table border = 1 align='center'>";
	echo "<th>รหัสวัสดุ</th>";
	echo "<th>รูปภาพ</th>";
	echo "<th>รายการ</th>";
	echo "<th>รุ่น / ยี่ห้อ</th>";
	echo "<th>ราคาซื้อ</th>";
	echo "<th>ประเภท</th>";
	echo "<th>ยอดยกมา</th>";
	echo "<th>จำนวนรับ</th>";
	echo "<th>จำนวนจ่าย</th>";
	echo "<th>คงเหลือ</th>";
	echo "<th>วัน/เดือน/ปี</th>";
	echo "<th>เพิ่มจำนวน</th>";
	echo "<th>แก้ไข</th>";
	echo "<th>ลบ</th>";
	
	
	while(list($id,$photo,$name,$brand,$price,$category,$stock,$acquire,$Pay,$balance,$time) = mysqli_fetch_row($result)){ 
	
	$sql=mysqli_query($con,"SELECT Category_name FROM category_spare  
	WHERE Category_id='$category' ")or die("SQL error2  ".mysqli_error($con));
    list($category)=mysqli_fetch_row($sql);
	
	$balance = $acquire + $stock;
	echo "<tr>";
	echo "<td align='center'>$id</td>";
	echo"<td align='center'><img src='../img/$photo'  width='50'  height='50'></td>";
	echo "<td align='center'>$name</td>";
	echo "<td align='center'>$brand</td>";
	echo "<td align='center'>$price</td>";
	echo "<td align='center'>$category</td>";
	echo "<td align='center'>$stock</td>";
	echo "<td align='center'>$acquire</td>";
	echo "<td align='center'>$Pay</td>";
	echo "<td align='center'>$balance</td>";
	echo "<td align='center'>$time</td>";
	echo "<td align='center'><a href='add_numspare.php?id=$id'><img src='../img/11.png'  width='30'  height='30'></TD>";
	echo "<td align='center'><a href='edit_spare.php?id=$id'><img src='../img/if_pencil_10550.png'  width='30'  height='30'></TD>";
	echo "<td align='center'><a href='delete_spare.php?id=$id'><img src='../img/cancel.png'  width='30'  height='30'></TD>";
	echo "</tr>";
	$num++;//เพิ่มค่าตัวแปรนับแถว
	}
	echo"</table>";
	
	mysqli_free_result($result);//คืนค่าหน่วยความจำให้กับระบบ
	mysqli_close($con); //ปิดฐานข้อมูล
	}
?>
<p align="center"><a href="menu_rent.php">กลับหน้า Index</a> || <a href="add_spare.php">เพิ่มรายการ</p>
</body>
</html>