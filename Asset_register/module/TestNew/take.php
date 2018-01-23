<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>ประวัติรายรับการวัสดุ / อุปกรณ์</title>
</head>

<body>
<h1 align='center'>ประวัติรายการรับการวัสดุ / อุปกรณ์</h1>
<form method ="post"  align='center'>
	ค้นหา : <input type ="search" name='keyword' size="20" placeholder="ค้นหารจากรายการ"> 
    ค้นหาวันที่ : <input type="date" name=' '> <input type="submit" value="ค้นหา">
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
	
	$result = mysqli_query($con, "SELECT * FROM take  INNER JOIN spare_part  ON (take. take_id = spare_part.id) WHERE  id_inventory  LIKE '%$keyword%' OR take_name LIKE '%$keyword%'OR take_pice  LIKE '%$keyword%' OR take_time LIKE '%$keyword%'OR take_brand  ORDER BY take_id ASC ") or die ("MySQL =>".mysqli_error($con));
	
	
	
	
	
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
	echo "<th>ลำดับที่</th>";
	echo "<th>รหัสวัสดุ</th>";
	echo "<th>รายการ</th>";
	echo "<th>รุ่น / ยี่ห้อ</th>";
	echo "<th>ราคาซื้อ</th>";
	echo "<th>ประเภท</th>";
	echo "<th>จำนวนที่รับ</th>";
	echo "<th>วัน/เดือน/ปี</th>";
	echo "<th>แก้ไข</th>";
	echo "<th>ลบ</th>";

	
	
	while(list($take_id,$id_inventory,$take_name,$take_brand,$take_pice,$take_category,$take_acquire,$take_time) = mysqli_fetch_row($result)){ 
	
	$sql=mysqli_query($con,"SELECT Category_name FROM category_spare  
	WHERE Category_id='$take_category' ")or die("SQL error2  ".mysqli_error($con));
    list($take_category)=mysqli_fetch_row($sql);
	
	echo "<tr>";
	echo "<td align='center'>$take_id</td>";
	echo "<td align='center'>$id_inventory</td>";
	echo" <td align='center'>$take_name</td>";
	echo "<td align='center'>$take_brand</td>";
	echo "<td align='center'>$take_pice</td>";
	echo "<td align='center'>$take_category</td>";
	echo "<td align='center'>$take_acquire</td>";
	echo "<td align='center'>$take_time</td>";
	echo "<td align='center'><a href='edit_take.php?take_id=$take_id'><img src='../img/if_pencil_10550.png'  width='30'  height='30'></TD>";
	echo "<td align='center'><a href='delete_spare.php?take_id=$take_id'><img src='../img/cancel.png'  width='30'  height='30'></TD>";
	echo "</tr>";
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