<!doctype html>
<html>
<head>
<title>รายงานยอดคงเหลือ</title>
<meta name="viewport" content="width=device-width, initial-scale=1">

<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
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

<title>รายงานคืนวัสดุ</title>
</head>
<link rel="stylesheet" href="css/css/bootstrap.min.css">
<body class="bodyfont">
<div class="container">

	<!-- Static navbar -->
    	<div id="sizezi2" style="padding-top:20px; width:98%; padding-left:5.3%" > 
		<nav class="navbar navbar-expand-lg navbar-light bg-light">
	       
		<form class="form-inline my-2 my-lg-0" method ="get" align="center">
	   ค้นหา :  <input class="form-control mr-sm-2" type="search" placeholder="ค้นหารายการ" aria-label="Search" id="sizezi2" name='keyword'>
       <button class="btn btn-outline-success my-2 my-sm-0" type="submit" id="sizezi2">Search</button>
        
       <button class="btn btn-outline-success my-2 my-sm-0" type="submit" id="sizezi2"><a href="report_send.php" target="_blank"><img src='../../img/print-2-128.png'  width='30'  height='30'>พิมพ์</a></button>
                </form>
                </form>
                
			</div>
		</nav>
<style>
.table3_4 table {
	width:100%;
	margin:15px 0
}
.table3_4 th {
	background-color:#3296D7;
	color:#FFFFFF
}
.table3_4,.table3_4 th,.table3_4 td
{
	
	font-size:0.95em;
	text-align:center;
	padding:4px;
	border:1px solid #2073c9;
	border-collapse:collapse
}
.table3_4 tr:nth-child(odd){
	background-color:#ffffff;
}
.table3_4 tr:nth-child(even){
	background-color:#ffffff;
}
</style>

        
<?php
	include("../../function/db_function.php");// include ไฟล์ที่เขียนฟังก์ชันไว้เข้ามาใช้งาน
	$con=connect_db();//เรียกใช้ฟงัก์ชั่นในการติดต่อฐานข้อมูล
	
	if(empty($_GET['keyword'])){ 
		$keyword="" ;
	}
	else{
		$keyword=$_GET['keyword'];
	}
	$result1 = mysqli_query($con, "SELECT * FROM send_sp  WHERE  send_id  LIKE '%$keyword%' OR send_bill LIKE '%$keyword%' OR send_nameSp  LIKE '%$keyword%' ") or die ("MySQL =>".mysqli_error($con));
	
	
	$row=mysqli_num_rows($result1); 
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
		echo"<p>ไม่พบข้อมูลที่ตรงกับคำค้น \"<b>$keyword</b>\"</p><hr>";
	}
	else{
		echo"<p align='center'>จำนวนวัสดุ / อุปกรณ์ที่มีตรงกับคำค้น \"<b>$keyword</b>\"
มีทั้งหมด $row รายการ </p>";
	$num=1;//กำหนดตัวแปรเพื่อนับแถว
    echo "<table class=table3_4 align='center'>";
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
	echo "</tr>"; 
	$num++;
	
	}
	echo"</table>";
	echo"<hr>";
	
//วนลูปแสดงลิงค์หมายเลขหน้า ตามจำนวนหน้า
	echo"หน้า $page_id : จาก $page ";

	$go=$page_id+1;
	$back=$page_id-1;
 	if($page_id>1){//ถ้า$page มากกว่า 1 ให้แสดงหน้าก่อนหน้า
		echo "<span><a href='report_send1.php?page_id=$back&keyword=$keyword'>ก่อนหน้า...</a></span>";
		}
		 for($id=1;$id<=$page;$id++){

 	 if($id==$page_id){  //ถ้าเป็นหน้าปัจจุบัน ให้แสดงเลขหน้าเป็นตัวหนาสีแดงและไม่มีลิ้งค์
     echo"<span style='font-weight:bold;color:red;'>[ $id ]</span>";
  }
  else{//ถ้าไม่ใช่หน้าปัจจุบันให้แสดงลิ้งค์ปกติ
  echo"<span style='color:back;'><a href='report_send1.php?page_id=$id&keyword=$keyword'>[ $id ]</a></span> ";
      }
}

		if($page!=$page_id){//ถ้า$page ไม่เท่ากับ $page_id ให้แสดงหน้าถัดไป
			    echo "<span><a href='report_send1.php?page_id=$go&keyword=$keyword'>...หน้าถัดไป</a></span>";
			  }
	}
	
	mysqli_free_result($result1);//คืนหน่วยความจำให้กับระบบ
 	mysqli_free_result($result2);//คืนหน่วยความจำให้กับระบบ
	mysqli_close($con); //ปิดฐานข้อมูล


?>

</body>
</html>
  


