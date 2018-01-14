<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>รายการวัสดุ / อุปกรณ์</title>
<style>
	.bodyfont{
		font-family:"TH Sarabun New", "Tw Cen MT";
		font-size:22px;
	}
	#sizezi{
		font-size:25px;
		
	}
	#sizezi2{
		font-size:22px;
	}
	#centertable{
		text-align:center;	
	}
	#midter{
		padding-top:50px;
	}
	
	navbar{
	padding-botton:20px;
	}
</style>
</head>
<link rel="stylesheet" href="css/css/bootstrap.min.css">
<body class="bodyfont">
<div class="container">

	<!-- Static navbar -->
    	<div id="sizezi2" style="padding-top:20px; width:98%; padding-left:5.3%" > 
		<nav class="navbar navbar-expand-lg navbar-light bg-light">
			<a class="navbar-brand" href="#" id="sizezi">ประวัติรายการเบิกการวัสดุ / อุปกรณ์</a>
				<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" 
                aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation"><span class="navbar-toggler-icon"></span>
  				</button>
		<form method ="post"  align='center'>
	<input type ="search" name='keyword' size="50"> <input type="submit" value="ค้นหา">
</form>
			</div>
		</nav>
<body>
</head>

<body>
<?php
include("../function/db_function.php");//include ไฟล์ที่เขียนฟังก์ชั่นไว้ใช้งาน
	$con=connect_db(); //เลือกใช้คำสั่งในการติดต่อฐานข้อมูล
	
	if(empty($_POST['keyword'])){ //ถ้าไม่มีการส่งค่าค้นหามาจากไฟล์
		$keyword="";//กำหนดให้ตัวแปร $keyword ว่าง
	}
	else{
		$keyword=$_POST['keyword'];//รับค่าคำค้นมาจากฟอร์ม
	}
	
	$result = mysqli_query($con, "SELECT * FROM lend_spare WHERE No LIKE '%$keyword%' OR name LIKE '%$keyword%'OR detail ORDER BY No ASC  ") or die ("MySQL =>".mysqli_error($con));	
	
	$rows=mysqli_num_rows($result); //จำนวนแถวที่คิวรี่ออกมาได้
	if($rows==0){ // ถ้านับจำนวนแถวที่คิวรี่ออกมาได้เท่ากับ 0 แสดงว่าไม่มีข้อมูลที่ตรงกับคำค้นหา
		echo"<p>ไม่พบข้อมูลที่ครงกับคำค้น\"<b>$keyword</b>\"</p><hr>";
	}
	else{
		echo"<p align='center'>ชื่อรายการวัสดุ - อุปกรณ์มีตรงกับคำค้น \"<b>$keyword</b>\"
มีทั้งหมด $rows รายการ </p>";

	//แสดงข้อมูล รหัสนักศึกษา คำนำหน้า ชื่อ นามสกุล ของนักศึกษาทุกคน
	$num=1;//กำหนดตัวแปรเพื่อนับแถว
	echo "<table border='0' align='center' width='90%' >";
	echo "<tr>";
	echo "<td>";
	echo "<table border='0' align='center' class='table table-sm' >";
	echo "<thead 	>";
	echo "<tr>";
	echo "<th>ลำดับ</th>";
	echo "<th>รหัสใบเบิก</th>";
	echo "<th>รหัสวัสดุ</th>";
	echo "<th>รายการ</th>";
	echo "<th>รุ่น / ยี่ห้อ</th>";
	echo "<th>ประเภท</th>";
	echo "<th>จำนวนที่เบิก</th>";
    echo "<th>วันที่เบิก</th>";
	echo "<th>ชื่อผู้ขอเบิก</th>";
	echo "</tr>";
	echo "</thead>";

	
	
	while(list($No,$id_spare,$name,$detail,$category_lend,$amount,$Order_lend,$lend_data,$rent_empID) = mysqli_fetch_row($result)){ 
	
	$sql=mysqli_query($con,"SELECT Category_name FROM category_spare  
	WHERE Category_id='$category_lend' ")or die("SQL error2  ".mysqli_error($con));
    list($category_lend)=mysqli_fetch_row($sql);
	
	echo "<tr>";
	echo "<td align='left'>$No</td>";
	echo "<td align='left'>$Order_lend</td>";
	echo "<td align='left'>$id_spare</td>";
	echo "<td align='left'>$name</td>";
	echo "<td align='left'>$detail</td>";
	echo "<td align='left'>$category_lend</td>";
	echo "<td align='center'>$amount</td>";
	echo "<td align='left'>$lend_data</td>";
	echo "<td align='center'>$rent_empID</td>";

	
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