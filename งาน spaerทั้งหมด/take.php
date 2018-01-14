<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>ประวัติรายรับการวัสดุ / อุปกรณ์</title>
</head>
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
			<a class="navbar-brand" href="#" id="sizezi">ประวัติรายการรับการวัสดุ / อุปกรณ์</a>
				<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" 
                aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation"><span class="navbar-toggler-icon"></span>
  				</button>
		<form method ="post"  align='center' >
	   ค้นหา : <input type ="search" name='keyword' size="20" placeholder="ค้นหารจากรายการ"> 
       ค้นหาวันที่ : <input type="date" name=' '> <input type="submit" value="ค้นหา">
</form>
                </form>
			</div>
		</nav>
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
	
	$result = mysqli_query($con, "SELECT * FROM take  WHERE  id_inventory  LIKE '%$keyword%' OR take_name LIKE '%$keyword%' OR take_pice  LIKE '%$keyword%' OR take_time LIKE '%$keyword%'OR take_brand  ORDER BY take_id ASC ") or die ("MySQL =>".mysqli_error($con));
	
	
	$rows=mysqli_num_rows($result); //จำนวนแถวที่คิวรี่ออกมาได้

	//แสดงข้อมูล รหัสนักศึกษา คำนำหน้า ชื่อ นามสกุล ของนักศึกษาทุกคน
	$num=1;//กำหนดตัวแปรเพื่อนับแถว
	echo "<table border='0' align='center' width='90%' >";
	echo "<tr>";
	echo "<td>";
	echo "<table border='0' align='center' class='table table-sm' >";
	echo "<thead 	>";
	echo "<tr>";
	echo "<th >ลำดับที่</th>";
	echo "<th>รหัสวัสดุ</th>";
	echo "<th>รายการ</th>";
	echo "<th>รุ่น / ยี่ห้อ</th>";
	echo "<th>ราคาซื้อ</th>";
	echo "<th>ประเภท</th>";
	echo "<th>จำนวนที่รับเข้า</th>";
	echo "<th>วัน/เดือน/ปี</th>";
	echo "<th>แก้ไข</th>";
	echo "<th>ลบ</th>";
	echo "</tr>";
	echo "</thead>";
	
	
	while(list($take_id,$id_inventory,$take_name,$take_brand,$take_pice,$take_category,$take_acquire,$take_time) = mysqli_fetch_row($result)){ 
	
	$sql=mysqli_query($con,"SELECT Category_name FROM category_spare  
	WHERE Category_id='$take_category' ")or die("SQL error2  ".mysqli_error($con));
    list($take_category)=mysqli_fetch_row($sql);
	
	echo "<tr>";
	echo "<td align='left'>$take_id</td>";
	echo "<td align='left'>$id_inventory</td>";
	echo" <td align='left'>$take_name</td>";
	echo "<td align='left'>$take_brand</td>";
	echo "<td align='left'>$take_pice</td>";
	echo "<td align='left'>$take_category</td>";
	echo "<td align='left' width='6.5%'>$take_acquire</td>";
	echo "<td align='left'>$take_time</td>";
	echo "<td align=''left'><a href='edit_take.php?take_id=$take_id'><img src='../img/if_pencil_10550.png'  width='30'  height='30'></TD>";
	echo "<td align=''left'><a href='delete_spare.php?take_id=$take_id'><img src='../img/cancel.png'  width='30'  height='30'></TD>";
	echo "</tr>";
	echo "</tr>";
	$num++;//เพิ่มค่าตัวแปรนับแถว
	}
	echo"</table>";
	
	
	mysqli_free_result($result);//คืนค่าหน่วยความจำให้กับระบบ
	mysqli_close($con); //ปิดฐานข้อมูล

?>
<p align="center"><a href="menu_rent.php">กลับหน้า Index</a></p>
</body>
</html>