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
    	<div id="sizezi2" style="padding-top:20px; width:95%; padding-left:4.7%" > 
		<nav class="navbar navbar-expand-lg navbar-light bg-light">
			<a class="navbar-brand" href="#" id="sizezi">รับคืนวัสดุ / อุปกรณ์</a>
				<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" 
                aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation"><span class="navbar-toggler-icon"></span>
  				</button>
		
                <form class="form-inline my-2 my-lg-0">
                    <input class="form-control mr-sm-2" type="search" placeholder="ค้นหารายการ" aria-label="Search" id="sizezi2">
                    <button class="btn btn-outline-success my-2 my-sm-0" type="submit" id="sizezi2">Search</button>
               </form>
                </form>
			</div>
		</nav>
</head>
<body>
<?php
	//include("../function/db_function.php");//include ไฟล์ที่เขียนฟังก์ชั่นไว้ใช้งาน
	$con=connect_db(); //เลือกใช้คำสั่งในการติดต่อฐานข้อมูล
	
	if(empty($_POST['keyword'])){ //ถ้าไม่มีการส่งค่าค้นหามาจากไฟล์
		$keyword="";//กำหนดให้ตัวแปร $keyword ว่าง
	}
	else{
		$keyword=$_POST['keyword'];//รับค่าคำค้นมาจากฟอร์ม
	}
	
	$result = mysqli_query($con, "SELECT * FROM  lend_empsp") or die ("MySQL =>".mysqli_error($con));	
	$rows=mysqli_num_rows($result); //จำนวนแถวที่คิวรี่ออกมาได้
	//แสดงข้อมูล รหัสนักศึกษา คำนำหน้า ชื่อ นามสกุล ของนักศึกษาทุกคน
	$num=1;//กำหนดตัวแปรเพื่อนับแถว
	
	echo "<table border='0' align='center' width='90%' >";
	echo "<tr>";
	echo "<td>";
	echo "<table border='0' align='center' class='table table-striped' >";
	echo "<thead 	>";
	echo "<tr>";
	echo "<th>เลขที่ใบเบิก</th>";
	echo "<th>วันที่เบิก</th>";
	echo "<th>รหัสพนักงาน</th>";
	echo "<th>ชื่อผู้เบิก</th>";
	echo "<th>แผนก</th>";
	echo "<th>เลืกรายการรับคืน</th>";
	echo "</tr>";
	echo "</thead>";
	
	while(list($No,$rent_empID,$rent_name,$rent_phone,$rent_date,$lend_status,$rent_department) = mysqli_fetch_row($result)){ 

	echo "<tr>";
	echo "<td align='left' width='10%'>$No</td>";
	echo "<td align='left'>$rent_date</td>";
	echo "<td align='left'>$rent_empID</td>";
	echo "<td align='left'>$rent_name</td>";
	echo "<td align='left'>$rent_department</td>";
	echo "<td align='left'><a href='render_list.php'>เลือก</TD>";

	echo "</tr>";
	$num++;//เพิ่มค่าตัวแปรนับแถว
	}
	echo"</table>";
	
	mysqli_free_result($result);//คืนค่าหน่วยความจำให้กับระบบ
	mysqli_close($con); //ปิดฐานข้อมูล
?>
</body>
</html>
</html>