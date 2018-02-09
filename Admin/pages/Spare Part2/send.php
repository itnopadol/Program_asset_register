<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>ประวัติรับคืนวัสดุ-อุปกรณ์</title>
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
			<img src='../img/x-11-128.png'  width='60'  height='60'><a class="navbar-brand" href="#" id="sizezi" >ประวัติรับคืนวัสดุ-อุปกรณ์</a>
				<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" 
                aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation"><span class="navbar-toggler-icon"></span>
  				</button>
                
		<form class="form-inline my-2 my-lg-0"  method ="get">
	   ค้นหา :  <input class="form-control mr-sm-2" type="search" placeholder="ค้นหารายการ" aria-label="Search" id="sizezi2" name='keyword'>
       ค้นหาวันที่ :  <input class="form-control mr-sm-2" type="date" placeholder="ค้นหาจากวันที่" aria-label="Search" id="sizezi2">
       <button class="btn btn-outline-success my-2 my-sm-0" type="submit" id="sizezi2">Search</button>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
</form>
                
			</div>
		</nav>
<body>

<?php
include("../function/db_function.php");
	$con=connect_db(); 
	
	if(empty($_GET['keyword'])){ 
		$keyword="";
	}
	else{
		$keyword=$_GET['keyword'];
	}
	
	$result = mysqli_query($con, "SELECT * FROM send_sp  WHERE  send_id  LIKE '%$keyword%' OR send_bill LIKE '%$keyword%' OR send_nameSp  LIKE '%$keyword%' ") or die ("MySQL =>".mysqli_error($con));
	
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

	$result2 = mysqli_query($con,"SELECT * FROM send_sp  WHERE  send_id  LIKE '%$keyword%' OR send_bill LIKE '%$keyword%' OR send_nameSp ORDER BY send_id   ASC LIMIT $start_rows,$rowspage")or die("SQL Error2".mysqli_error($con));
	
	 if($row==0){ 
		echo"<p><h3>ไม่พบข้อมูลที่ตรงกับคำค้น \"<b>$keyword</b>\"</p></h3><hr>";
	}
	else{
		echo"<p align='center'>จำนวนวัสดุปุกรณ์ที่มีตรงกับคำค้น \"<b>$keyword</b>\"
มีทั้งหมด $row รายการ </p>";

	$num=1;
	echo "<table border='0' align='center' width='90%' >";
	echo "<tr>";
	echo "<td>";
	echo "<table border='0' align='center' class='table table-sm' >";
	echo "<thead>";
	echo "<tr>";
	echo "<th >ลำดับที่</th>";
	echo "<th>เลขที่ใบเบิก</th>";
	echo "<th>รหัสวัสดุ</th>";
	echo "<th>รายการ</th>";
	echo "<th>รุ่น / ยี่ห้อ</th>";
	echo "<th>จำนวนที่เบิก</th>";
	echo "<th>จำนวนที่คืน</th>";
	echo "<th>ชื่อผู้คืน</th>";
	echo "<th>แผนก</th>";
	echo "<th>วันที่คืน</th>";
	echo "</tr>";
	echo "</thead>";
	
	
	while(list($send_id,$send_bill,$send_idSp,$send_nameSp,$send_brand,$send_number,$send_back,$send_name,$send_department,$send_date) = mysqli_fetch_row($result2)){ 

	
	echo "<tr>";
	echo "<td align='left'>$send_id</td>";
	echo "<td align='left'>$send_bill</td>";
	echo "<td align='left'>$send_idSp</td>";
	echo" <td align='left'>$send_nameSp</td>";
	echo" <td align='left'>$send_brand</td>";
	echo "<td align='left'>$send_number</td>";
	echo "<td align='left'>$send_back</td>";
	echo "<td align='left'></td>";
	echo "<td align='left'>$send_department</td>";
	echo "<td align='left'>$send_date</td>";

	$num++;//เพิ่มค่าตัวแปรนับแถว
	}
	echo"</table>";
	echo"<hr>";
	//วนลูปแสดงลิงค์หมายเลขหน้า ตามจำนวนหน้า
	echo"หน้า $page_id : จาก $page ";

	$go=$page_id+1;
	$back=$page_id-1;
 	if($page_id>1){//ถ้า$page มากกว่า 1 ให้แสดงหน้าก่อนหน้า
		echo "<span><a href='send.php?page_id=$back&keyword=$keyword'>ก่อนหน้า...</a></span>";
		}
		 for($id=1;$id<=$page;$id++){

 	 if($id==$page_id){  //ถ้าเป็นหน้าปัจจุบัน ให้แสดงเลขหน้าเป็นตัวหนาสีแดงและไม่มีลิ้งค์
     echo"<span style='font-weight:bold;color:red;'>[ $id ]</span>";
  }
  else{//ถ้าไม่ใช่หน้าปัจจุบันให้แสดงลิ้งค์ปกติ
  echo"<span style='color:back;'><a href='send.php?page_id=$id&keyword=$keyword'>[ $id ]</a></span> ";
      }
}

		if($page!=$page_id){//ถ้า$page ไม่เท่ากับ $page_id ให้แสดงหน้าถัดไป
			    echo "<span><a href='send.php?page_id=$go&keyword=$keyword'>...หน้าถัดไป</a></span>";
			  }
}
	
	mysqli_free_result($result);//คืนหน่วยความจำให้กับระบบ
 	mysqli_free_result($result2);//คืนหน่วยความจำให้กับระบบ
	mysqli_close($con); //ปิดฐานข้อมูล

?>
<p align="center"><a href="menu_rent.php">กลับหน้า index</a></p>
</body>
</html>