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
		<a class="navbar-brand"  id="sizezi">ประวัติรายการเบิกการวัสดุ / อุปกรณ์</a>
				<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" 
                aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation"><span class="navbar-toggler-icon"></span>
  				</button>
		<form class="form-inline my-2 my-lg-0" method ="get">
	   ค้นหา :  <input class="form-control mr-sm-2" type="search" placeholder="ค้นหารายการ" aria-label="Search" id="sizezi2" name='keyword'>
       ค้นหาวันที่ :  <input class="form-control mr-sm-2" type="date" placeholder="ค้นหาจากวันที่" aria-label="Search" id="sizezi2">
       <button class="btn btn-outline-success my-2 my-sm-0" type="submit" id="sizezi2">Search</button>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                
			</div>
		</nav>
<body>
</head>

<body>
<?php
include("../function/db_function.php");//include ไฟล์ที่เขียนฟังก์ชั่นไว้ใช้งาน
	$con=connect_db(); //เลือกใช้คำสั่งในการติดต่อฐานข้อมูล
	
	if(empty($_GET['keyword'])){ //ถ้าไม่มีการส่งค่าค้นหามาจากไฟล์
		$keyword="";//กำหนดให้ตัวแปร $keyword ว่าง
	}
	else{
		$keyword=$_GET['keyword'];//รับค่าคำค้นมาจากฟอร์ม
	}

	$result = mysqli_query($con,"SELECT lend_spare.*,lend_empsp.rent_name FROM lend_spare Left JOIN lend_empsp ON lend_spare.rent_empID=lend_empsp.rent_empID  WHERE lend_empsp.rent_name	LIKE '%$keyword%' OR lend_spare.Order_lend LIKE '%$keyword%' OR lend_spare.detail  LIKE '%$keyword%' OR lend_spare.category_lend LIKE '%$keyword%'  GROUP BY lend_spare.No ORDER BY lend_spare.No ASC")or die(mysqli_error($result));
	
	$row=mysqli_num_rows($result); 
	$rowspage=15;
	$page=ceil($row/$rowspage);
	
	 if(empty($_GET['page_id'])){
		$page_id=1; 
	}
	else{
			$page_id=$_GET['page_id'];
	}
	
	 $start_rows=($page_id*$rowspage)-$rowspage; 
	 
	 
	  $result2= mysqli_query($con,"SELECT lend_spare.*,lend_empsp.rent_name FROM lend_spare Left JOIN lend_empsp ON lend_spare.rent_empID=lend_empsp.rent_empID  WHERE lend_empsp.rent_name	LIKE '%$keyword%' OR lend_spare.Order_lend LIKE '%$keyword%' OR lend_spare.detail  LIKE '%$keyword%' OR lend_spare.category_lend LIKE '%$keyword%' GROUP BY lend_spare.No ORDER BY lend_spare.No ASC LIMIT $start_rows,$rowspage")or die("SQL Error2".mysqli_error($con));
	  
	if($row==0){ 
		echo"<p><h3>ไม่พบข้อมูลที่ตรงกับคำค้น \"<b>$keyword</b>\"</p></h3><hr>";
	}
	else{
		echo"<p align='center'>ชื่อรายการวัสดุ - อุปกรณ์มีตรงกับคำค้น \"<b>$keyword</b>\"
มีทั้งหมด $row รายการ </p>";

	$num=1;
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
	echo "<th>รหัสพนักงาน</th>";
	echo "<th>ชื่อพนักงาน</th>";
	echo "</tr>";
	echo "</thead>";
	
	 while(list($No,$id_spare,$name,$detail,$category_lend,$amount,$Order_lend,$lend_data,$rent_empID,$rent_name) = mysqli_fetch_row($result)){ 
	
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
	echo "<td align='center'>$rent_name</td>";
	echo "</tr>";

 $num++;//เพิ่มค่าตัวแปรนับแถว
	}
	echo"</table>";
	echo"<hr>";
	//วนลูปแสดงลิงค์หมายเลขหน้า ตามจำนวนหน้า
	echo"หน้า $page_id : จาก $page ";

	$go=$page_id+1;
	$back=$page_id-1;
 	if($page_id>1){//ถ้า$page มากกว่า 1 ให้แสดงหน้าก่อนหน้า
		echo "<span><a href='lend.php?page_id=$back&keyword=$keyword'>ก่อนหน้า...</a></span>";
		}
		 for($id=1;$id<=$page;$id++){

 	 if($id==$page_id){  //ถ้าเป็นหน้าปัจจุบัน ให้แสดงเลขหน้าเป็นตัวหนาสีแดงและไม่มีลิ้งค์
     echo"<span style='font-weight:bold;color:red;'>[ $id ]</span>";
  }
  else{//ถ้าไม่ใช่หน้าปัจจุบันให้แสดงลิ้งค์ปกติ
  echo"<span style='color:back;'><a href='lend.php?page_id=$id&keyword=$keyword'>[ $id ]</a></span> ";
      }
}

		if($page!=$page_id){//ถ้า$page ไม่เท่ากับ $page_id ให้แสดงหน้าถัดไป
			    echo "<span><a href='lend.php?page_id=$go&keyword=$keyword'>...หน้าถัดไป</a></span>";
			  }
}
	mysqli_free_result($result);//คืนหน่วยความจำให้กับระบบ
 	mysqli_free_result($result2);//คืนหน่วยความจำให้กับระบบ
 
    mysqli_close($con);//ปิดฐานข้อมูล
?>
<p align="center"><a href="menu_rent.php">กลับหน้า Index</a></p>
</body>
</html>