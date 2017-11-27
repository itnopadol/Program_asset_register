<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>ตรวจสอบสถานะสินทรัพย์</title>
</head>
<style>
#middlecenter{
	text-align:center
}
</style>
<body id="">
<h1 align='center'>ตรวจสอบสถานะสินทรัพย์</h1>
<form method ="post"  align='center' action="update_status.php">
	<input type ="search" name='keyword' size="50"> <input type="submit" value="ค้นหา">
	
</form>
<?php
	//include("../../Funtion/funtion.php");//include ไฟล์ที่เขียนฟังก์ชั่นไว้ใช้งาน
	$con=connect_db(); //เลือกใช้คำสั่งในการติดต่อฐานข้อมูล
	
	if(empty($_POST['keyword'])){ //ถ้าไม่มีการส่งค่าค้นหามาจากไฟล์
		$keyword="";//กำหนดให้ตัวแปร $keyword ว่าง
	}
	else{
		$keyword=$_POST['keyword'];//รับค่าคำค้นมาจากฟอร์ม
	}
	
	$result = mysqli_query($con, "SELECT * FROM asset WHERE Asset_name  LIKE '%$keyword%' OR Asset_code LIKE '%$keyword%'OR brand LIKE '%$keyword%' OR Asset_serial ORDER BY Asset_id ASC  ") or die ("MySQL =>".mysqli_error($con));	
	
	$rows=mysqli_num_rows($result); //จำนวนแถวที่คิวรี่ออกมาได้
	if($rows==0){ // ถ้านับจำนวนแถวที่คิวรี่ออกมาได้เท่ากับ 0 แสดงว่าไม่มีข้อมูลที่ตรงกับคำค้นหา
		echo"<p id='middlecenter'>ไม่พบข้อมูลที่ครงกับคำค้น\"<b>$keyword</b>\"</p><hr>";
	}
	else{
		echo"<p id='middlecenter'>ชื่อรายการสินทรัพย์มีตรงกับคำค้น \"<b>$keyword</b>\"
มีทั้งหมด $rows รายการ </p>";

	//แสดงข้อมูล รหัสนักศึกษา คำนำหน้า ชื่อ นามสกุล ของนักศึกษาทุกคน
	$num=1;//กำหนดตัวแปรเพื่อนับแถว
	
	echo "<table border = 1 align='center'>";
	echo "<th>รหัสสินทรัพย์</th>";
	echo "<th>หมายเลขทะเบียน</th>";
	echo "<th>Serial Number</th>";
	echo "<th>ชื่อสินทรัพย์</th>";
	echo "<th>รุ่น / ยี่ห้อ</th>";
	echo "<th>สถานะการใช้งาน</th>";
	echo "<th>บันทึก</th>";
	echo "<th>จุดที่ใช้งาน</th>";
	
	while(list($Asset_id,$Asset_code ,$Asset_serial ,$Asset_name ,$mac_address,$computer_name
	,$brand,$Asset_date ,$Asset_company ,$Asset_price,$Asset_barcode
	,$Asset_Category ,$Asset_photo ,$Asset_time,$detail,$Asset_status,$active_point) = mysqli_fetch_row($result)){
	
	$result1=mysqli_query($con,"SELECT Active_name FROM active_point WHERE Active_id = '$active_point' ")
	or die("SQL error2  ".mysqli_error($con));
    list($active_point)=mysqli_fetch_row($result1);
	
	$result2=mysqli_query($con,"SELECT Status_id,Status_name FROM status ") 
	or die ("mysql error=>>".mysql_error($con));
			
		echo "<tr>";
		echo "<td align='center'>$Asset_id</td>";
		echo "<td align='center'>$Asset_code</td>";
		echo "<td align='center'>$Asset_serial</td>";
		echo "<td align='center'><a href='assatt_detail.php?id=$Asset_id'>$Asset_name</td>";
		echo "<td align='center'>$brand</td>";
		
		echo "<td align='center'>";
		echo "<form action='update_status.php' method='get'>";
		echo "<input type='hidden' name='Asset_id' value= '$Asset_id'> ";
		echo "<select name='Asset_status'>";
		while(list($Status_id,$Status_name)=mysqli_fetch_row($result2)){
			if($Status_id == $Asset_status){
				$select = "selected='selected=selected'";
				//$select = $Status_id == $Asset_status? "selected":"";
			}
			else{
				$select = "";
				
			}
				
			echo "<option value='$Status_id' $select>$Status_name</option>";
		}
		echo "</select>&nbsp;&nbsp;<input type='submit' name='update' value='เปลี่ยนสถานะ'></form></td>";
		
		echo "<td align='center'>$active_point</td>";
		echo "<td align='center'><a href='edit_status.php?Asset_id=$Asset_id'>
		<img src='img/flat.png'  width='30'  height='30'></TD>";
		echo "</tr>";
		$num++;//เพิ่มค่าตัวแปรนับแถว
	}
	echo"</table>";
	echo "</form>";
	mysqli_free_result($result);//คืนค่าหน่วยความจำให้กับระบบ
	mysqli_close($con); //ปิดฐานข้อมูล
	}
?>
<p id='middlecenter'><a href="menu.php">กลับหน้า Index</a></p>
</body>
</html>