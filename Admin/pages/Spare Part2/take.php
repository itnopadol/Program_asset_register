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
		<a class="navbar-brand" href="#" id="sizezi">ประวัติการรับเข้าวัสดุ / อุปกรณ์</a>
				<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" 
                aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation"><span class="navbar-toggler-icon"></span>
  		</button>
		<form class="form-inline my-2 my-lg-0">
	    ค้นหา :  <input class="form-control mr-sm-2" type="search" placeholder="ค้นหารายการ" aria-label="Search" id="sizezi2" name='keyword'>
       ค้นหาวันที่ :  <input class="form-control mr-sm-2" type="date" placeholder="ค้นหาจากวันที่" aria-label="Search" id="sizezi2">
       <button class="btn btn-outline-success my-2 my-sm-0" type="submit" id="sizezi2">Search</button><p>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</p>
</form>
      
			</div>
		</nav>
<body>

<?php
include("../function/db_function.php");//include ไฟล์ที่เขียนฟังก์ชั่นไว้ใช้งาน
	$con=connect_db(); //เลือกใช้คำสั่งในการติดต่อฐานข้อมูล
	
	if(empty($_GET['keyword'])){ 
		$keyword="";
	}
	else{
		$keyword=$_GET['keyword'];
	}
	
	$result1 = mysqli_query($con,"SELECT take_id  FROM  take WHERE  take_name  LIKE '%$keyword%' OR take_name LIKE '%$keyword%'OR take_brand LIKE '%$keyword%'OR take_category =(SELECT Category_id FROM category_spare WHERE Category_name  LIKE '%$keyword%'  ORDER BY take_id  ASC LIMIT 1)")or die(mysqli_error($con));
	
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

	$result2 = mysqli_query($con,"SELECT*FROM  take WHERE  take_name  LIKE '%$keyword%' OR take_name LIKE '%$keyword%'OR take_brand LIKE '%$keyword%'OR take_category =(SELECT Category_id FROM category_spare WHERE Category_name  LIKE '%$keyword%'  ORDER BY take_id  ASC LIMIT 1) ORDER BY take_time ASC LIMIT $start_rows,$rowspage")or die("SQL Error2".mysqli_error($con));
	
	 if($row==0){ // ถ้านับจำนวนแถวที่คิวรี่ออกมาได้เท่ากับ 0 แสดงว่าไม่มีข้อมูลที่ตรงกับคำค้นหา
		echo"<p><h3>ไม่พบข้อมูลที่ตรงกับคำค้น \"<b>$keyword</b>\"</p></h3><hr>";
	}
	else{
		echo"<p align='center'>จำนวนวัสดุปุกรณ์ที่มีตรงกับคำค้น \"<b>$keyword</b>\"
มีทั้งหมด $row รายการ </p>";


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
	
	while(list($take_id,$id_inventory,$take_name,$take_brand,$take_pice,$take_category,$take_acquire,$take_time) = mysqli_fetch_row($result2)){ 
	
	$sql=mysqli_query($con,"SELECT Category_name FROM category_spare  
	WHERE Category_id='$take_category' ")or die("SQL error2  ".mysqli_error($con));
    list($category)=mysqli_fetch_row($sql);
	
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
	echo "<td align=''left'><a href='delete_spare.php?take_id=$take_id'><img src='../img/cancel.png'  width='30'  height='30'></td></tr>";
	$num++;//เพิ่มค่าตัวแปรนับแถว
	}
	echo"</table>";
	echo"<hr>";
	//วนลูปแสดงลิงค์หมายเลขหน้า ตามจำนวนหน้า
	echo"หน้า $page_id : จาก $page ";

	$go=$page_id+1;
	$back=$page_id-1;
 	if($page_id>1){//ถ้า$page มากกว่า 1 ให้แสดงหน้าก่อนหน้า
		echo "<span><a href='take.php?page_id=$back&keyword=$keyword'>ก่อนหน้า...</a></span>";
		}
		 for($id=1;$id<=$page;$id++){

 	 if($id==$page_id){  //ถ้าเป็นหน้าปัจจุบัน ให้แสดงเลขหน้าเป็นตัวหนาสีแดงและไม่มีลิ้งค์
     echo"<span style='font-weight:bold;color:red;'>[ $id ]</span>";
  }
  else{//ถ้าไม่ใช่หน้าปัจจุบันให้แสดงลิ้งค์ปกติ
  echo"<span style='color:back;'><a href='take.php?page_id=$id&keyword=$keyword'>[ $id ]</a></span> ";
      }
}

		if($page!=$page_id){//ถ้า$page ไม่เท่ากับ $page_id ให้แสดงหน้าถัดไป
			    echo "<span><a href='take.php?page_id=$go&keyword=$keyword'>...หน้าถัดไป</a></span>";
			  }
}
	mysqli_free_result($result1);//คืนหน่วยความจำให้กับระบบ
 	mysqli_free_result($result2);//คืนหน่วยความจำให้กับระบบ
	mysqli_close($con); //ปิดฐานข้อมูล

?>
<p align="center"><a href="menu_rent.php">กลับหน้า Index</a></p>
</body>
</html>