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
			<a class="navbar-brand"  id="sizezi">รับคืนวัสดุ / อุปกรณ์</a>
				<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" 
                aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation"><span class="navbar-toggler-icon"></span>
  				</button>
		<form class="form-inline my-2 my-lg-0" method ="get">
	   ค้นหา :  <input class="form-control mr-sm-2" type="search" placeholder="ค้นหารายการ" aria-label="Search" id="sizezi2"  name='keyword'>
       ค้นหาวันที่ :  <input class="form-control mr-sm-2" type="date" placeholder="ค้นหาจากวันที่" aria-label="Search" id="sizezi2" >
       <button class="btn btn-outline-success my-2 my-sm-0" type="submit" id="sizezi2">Search</button>
</form>
                </form>
			</div>
		</nav>
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
	
	$result=mysqli_query($con,"SELECT No FROM lend_empsp WHERE rent_name LIKE '%$keyword%' OR rent_empID LIKE '%$keyword%' OR rent_department") or die("SQL Error1=>".mysqli_error($con));
	
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
	 
	  $result2= mysqli_query($con,"SELECT*FROM lend_empsp WHERE rent_name   LIKE '%$keyword%' OR rent_empID LIKE '%$keyword%' OR rent_department  ORDER BY No DESC LIMIT $start_rows,$rowspage")or die("SQL Error2".mysqli_error($con));
	
	 if($row==0){ // ถ้านับจำนวนแถวที่คิวรี่ออกมาได้เท่ากับ 0 แสดงว่าไม่มีข้อมูลที่ตรงกับคำค้นหา
		echo"<p>ไม่พบข้อมูลที่ตรงกับคำค้น\"<b>$keyword</b>\"</p><hr>";
	}
	else{
		echo"<p align='center'>รายการรับคืนที่มีตรงกับคำค้น \"<b>$keyword</b>\"
มีทั้งหมด $row รายการ </p>";

	$num=1;//กำหนดตัวแปรเพื่อนับแถว
	
	echo "<table border='0' align='center' width='90%' >";
	echo "<tr>";
	echo "<td>";
	echo "<table border='0' align='center' class='table table-striped' >";
	echo "<thead>";
	echo "<tr>";
	echo "<th>เลขที่ใบเบิก</th>";
	echo "<th>วันที่เบิก</th>";
	echo "<th>รหัสพนักงาน</th>";
	echo "<th>ชื่อผู้เบิก</th>";
	echo "<th>แผนก</th>";
	echo "<th>เบอร์โทร</th>";
	echo "<th>เลืกรายการรับคืน</th>";
	echo "</tr>";
	echo "</thead>";

	while(list($No,$rent_empID,$rent_name,$rent_phone,$rent_date,$lend_status,$rent_department) = mysqli_fetch_row($result2)){ 
	
	
	echo "<tr>";
	echo "<td align='left' width='10%'>$No</td>";
	echo "<td align='left'>$rent_date</td>";
	echo "<td align='left'>$rent_empID</td>";
	echo "<td align='left'>$rent_name</td>";
	echo "<td align='left'>$rent_department</td>";
	echo "<td align='left'>$rent_phone</td>";
	echo "<td align='left'><a href='render_list.php?id=$No'><button type='button' class='btn btn-success'><img src='../img/Select.png'  width='27'  height='27'>เลือก</button></a></TD></tr>";
	
    $num++;
	}
	echo"</table>";
	echo "</td>";
	echo "</tr>";
	echo"</table>";
    echo"<hr>";

	echo"หน้า $page_id : จาก $page ";

	$go=$page_id+1;
	$back=$page_id-1;
	
 	if($page_id>1){
		echo "<span><a href='render.php?page_id=$back&keyword=$keyword'>ก่อนหน้า...</a></span>";
		}
		 for($id=1;$id<=$page;$id++){

 	 if($id==$page_id){  
     echo"<span style='font-weight:bold;color:red;'>[ $id ]</span>";
  }
  else{
  echo"<span style='color:back;'><a href='render.php?page_id=$id&keyword=$keyword'>[ $id ]</a></span> ";
      }
}

		if($page!=$page_id){
			    echo "<span><a href='render.php?page_id=$go&keyword=$keyword'>...หน้าถัดไป</a></span>";
			  }
}
	
	mysqli_free_result($result);
 	mysqli_free_result($result2);
	mysqli_close($con); 

?>
<p align="center"><a href="menu_rent.php">กลับหน้า Index</a></p>
</body>
</html>
</html>
