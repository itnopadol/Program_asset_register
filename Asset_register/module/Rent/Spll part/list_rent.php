<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>รายการวัสดุ-อุปกรณ์</title>
</head>
<style>
#midcentter{
	text-align:center;	
}
</style>
<body style="background-color:#EBEBEB">
<h1 id="midcentter">รายการวัสดุ-อุปกรณ์</h1>
<form method ="post"  align='center'>
	<input type ="search" name='keyword' size="50"> <input type="submit" value="ค้นหา">
</form>
<?php
	include("../../../Funtion/funtion.php");//include ไฟล์ที่เขียนฟังก์ชั่นไว้ใช้งาน
	$con=connect_db(); //เลือกใช้คำสั่งในการติดต่อฐานข้อมูล
	if(empty($_POST['keyword'])){ //ถ้าไม่มีการส่งค่าค้นหามาจากไฟล์
		$keyword="";//กำหนดให้ตัวแปร $keyword ว่าง
	}
	else{
		$keyword=$_POST['keyword'];//รับค่าคำค้นมาจากฟอร์ม
	}
	
	$result = mysqli_query($con, "SELECT * FROM rent WHERE  name  LIKE '%$keyword%' OR name LIKE '%$keyword%' 
		OR brand ORDER BY rent_id ASC  ") or die ("MySQL =>".mysqli_error($con));	
	$rows=mysqli_num_rows($result); //จำนวนแถวที่คิวรี่ออกมาได้
	if($rows==0){ // ถ้านับจำนวนแถวที่คิวรี่ออกมาได้เท่ากับ 0 แสดงว่าไม่มีข้อมูลที่ตรงกับคำค้นหา
		echo"<p id='midcentter'>ไม่พบข้อมูลที่ครงกับคำค้น\"<b>$keyword</b>\"</p><hr>";
	}
	else{
		echo"<p id='midcentter'>ชื่อรายการวัสดุ - อุปกรณ์มีตรงกับคำค้น \"<b>$keyword</b>\"
			มีทั้งหมด $rows รายการ </p>";

	$num=1;//กำหนดตัวแปรเพื่อนับแถว
	echo "<table border = 1 align='center'>";
	echo "<th>รหัสวัสดุ</th>";
	echo "<th>รายการ</th>";
	echo "<th>รุ่น / ยี่ห้อ</th>";
	echo "<th>ราคา</th>";
	echo "<th>Stock</th>";
	echo "<th>จำนวนที่รับ</th>";
	echo "<th>จำนวนที่จ่าย</th>";
	echo "<th>คงเหลือ</th>";
	echo "<th>เพิ่มจำนวน</th>";
	echo "<th>แก้ไข</th>";
	echo "<th>ลบ</th>";
	
	while(list($rent_id,$name,$brand,$price,$stock,$acquire,$paying
		,$balance) = mysqli_fetch_row($result)){ 
		
	echo "<tr>";
	echo "<td align='center'>$rent_id</td>";
	echo "<td align='center'>$name</td>";
	echo "<td align='center'>$brand</td>";
	echo "<td align='center'>$price</td>";
	echo "<td align='center'>$stock</td>";
	echo "<td align='center'>$acquire</td>";
	echo "<td align='center'>$paying</td>";
	echo "<td align='center'>$balance</td>";
	echo "<td align='center'><a href='index.php?module=5&action=27&rent_id=$rent_id''>
		<img src='img/if_Plus_206460.png' width='30'  height='30'></TD>";
	echo "<td align='center'><a href='index.php?module=5&action=29&rent_id=$rent_id'>
		<img src='img/if_pencil_10550.png'  width='30'  height='30'></TD>";
	echo "<td align='center'><a href='index.php?module=5&action=34&id=$rent_id' onclick='return 
		confirm(\"กดปุ่ม ตกลงเพื่อยืนยันการลบข้อมูล\")'><img src='img/cancel.png'  width='30'  height='30'></TD>";
	echo "</tr>";
	$num++;//เพิ่มค่าตัวแปรนับแถว
	}
	echo"</table>";
	
	mysqli_free_result($result);//คืนค่าหน่วยความจำให้กับระบบ
	mysqli_close($con); //ปิดฐานข้อมูล
	}
?>
<p id="midcentter"><a href="index.php">กลับหน้า Index</a> || <a href="index.php?module=5&action=28">เพิ่มรายการ</p>
</body>
</html>