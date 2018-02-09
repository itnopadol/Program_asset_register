<?php
	include("../../Funtion/funtion.php");
	$con = connect_db();
?>
<!DOCTYPE html>
<html lang="en">
<head>


  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <title>Star Admin</title>
  <link rel="stylesheet" href="../../node_modules/font-awesome/css/font-awesome.min.css" />
  <link rel="stylesheet" href="../../node_modules/perfect-scrollbar/dist/css/perfect-scrollbar.min.css" />
  <link rel="stylesheet" href="../../css/style.css" />
  <link rel="shortcut icon" href="../../images/favicon.png" />
<!--  <link rel="stylesheet" href="../../css/bootstrap.min.css" crossorigin="anonymous">-->
<style>
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
<body>
 <div class=" container-scroller">
    <!-- partial:partials/_navbar.html -->
    <nav class="navbar navbar-default col-lg-12 col-12 p-0 fixed-top d-flex flex-row">
      <div class="bg-white text-center navbar-brand-wrapper">
        <a class="navbar-brand brand-logo" href="index.html"><img src="../../images/logo_star_black.png" /></a>
        <a class="navbar-brand brand-logo-mini" href="index.html"><img src="../../images/logo_star_mini.jpg" alt=""></a>
      </div>
      <div class="navbar-menu-wrapper d-flex align-items-center">
        <button class="navbar-toggler navbar-toggler d-none d-lg-block navbar-dark align-self-center mr-3" type="button" data-toggle="minimize">
          <span class="navbar-toggler-icon"></span>
        </button>
        <form class="form-inline mt-2 mt-md-0 d-none d-lg-block" method ="get">
          <input class="form-control mr-sm-2 search" type="text" placeholder="Search"  name='keyword'>
        </form>
        <ul class="navbar-nav ml-lg-auto d-flex align-items-center flex-row">
          <li class="nav-item">
            <a class="nav-link profile-pic" href="#"><img class="rounded-circle" src="../../images/face.jpg" alt=""></a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="#"><i class="fa fa-th"></i></a>
          </li>
        </ul>
        <button class="navbar-toggler navbar-dark navbar-toggler-right d-lg-none align-self-center" type="button" data-toggle="offcanvas">
          <span class="navbar-toggler-icon"></span>
        </button>
      </div>
    </nav>

    <!-- partial -->
    <div class="container-fluid">
      <div class="row row-offcanvas row-offcanvas-right">
        <!-- partial:partials/_sidebar.html -->
        <nav class="bg-white sidebar sidebar-offcanvas" id="sidebar">
          <div class="user-info">
            <img src="../../images/face.jpg" alt="">
            <p class="name">Sittichai Wongfun</p>
            <p class="designation">Admin Manager</p>
            <span class="online"></span>
          </div>
          <ul class="nav">
            <li class="nav-item">
              <a class="nav-link" href="index.html">
                <img src="../../images/icons/1.png" alt="">
                <span class="menu-title">Dashboard</span>
              </a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="../Asset/Form_Add.php" title="เพิ่มรายการสินทรัพย์">
                <img src="../../images/icons/007-star.png" alt="">
                <span class="menu-title">Add Asset</span>
              </a>
            </li>
             <li class="nav-item">
              <a class="nav-link" href="../Status/list_status.php" title="จัดการสินทรัพย์">
                <img src="../../images/icons/list.png" alt="">
                <span class="menu-title">Management Asset</span>
              </a>
            </li>
             <li class="nav-item">
              <a class="nav-link" href="../Asset/List_Asset.php" title="รายชื่อสินทรัพย์">
                <img src="../../images/icons/list-with-dots.png" alt="">
                <span class="menu-title">List Asset</span>
              </a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="../Rent/List_rent.php" title="คืนสินทรัพย์">
                <img src="../../images/icons/clipboard.png" alt="">
                <span class="menu-title">Repatriate</span>
              </a>
            </li>
             <li class="nav-item">
              <a class="nav-link" href="../Report/Asset.php" title="ประวัติการคืนสินทรัพย์">
                <img src="../../images/icons/history(1).png" alt="">
                <span class="menu-title">History</span>
              </a>
            </li>
            <li class="nav-item">
              <a class="nav-link" data-toggle="collapse" href="#sample-pages" aria-expanded="false" aria-controls="sample-pages">
                <img src="../../images/icons/9.png" alt="">
                <span class="menu-title">Spare Part<i class="fa fa-sort-down"></i></span>
              </a>
              <div class="collapse" id="sample-pages">
                <ul class="nav flex-column sub-menu">
                
                  <li class="nav-item">
                    <a class="nav-link" href="list_spare.php"  title="จัดการวัสดุ-อุปกรณ์">
                     <img src="../../images/icons/slice30-20.png" alt="">
                     <span class="menu-title">จัดการวัสดุ-อุปกรณ์</span>
                     </a>
                  </li>
                  
                  <li class="nav-item">
                    <a class="nav-link" href="index_sp.php">
                     <img src="../../images/icons/cart_full.png" alt="">
                      <span class="menu-title">จัดทำรายการเบิก</span>
                    </a>
                  </li>
                  
                  <li class="nav-item">
                    <a class="nav-link" href="take.php">
                    <img src="../../images/icons/download_5-24.png" alt="">
                    <span class="menu-title"> รายการรับเข้า</span>
                    </a>
                  </li>
                  
                  <li class="nav-item">
                    <a class="nav-link" href="lend.php">
                    <img src="../../images/icons/credit-card.png" alt="">
                       <span class="menu-title">รายการเบิก</span>
                    </a>
                  </li>
                  
                  <li class="nav-item">
                    <a class="nav-link" href="render.php">
                    <img src="../../images/icons/back-arrow.png" alt="">
                      <span class="menu-title">รับคืนวัสดุ-อุปกรณ์</span>
                    </a>
                  </li>
                  
                  <li class="nav-item">
                    <a class="nav-link" href="send.php">
                    <img src="../../images/icons/clipboard (1).png" alt="">
                      <span class="menu-title">ประวัติรับคืนวัสดุ </span>
                    </a>
                  </li>
                  
                  
                    <li class="nav-item">
                    <a class="nav-link" href="report_spart1.php">
                    <img src="../../images/icons/analytics.png" alt="">
                      <span class="menu-title">รายงานยอดคงเหลือ</span>
                    </a>
                       </li>
                     
                     <li class="nav-item">
                    <a class="nav-link" href="report_take1.php">
                    <img src="../../images/icons/analytics.png" alt="">
                      <span class="menu-title">รายงานรับเข้าวัสดุ</span>
                    </a>
                       </li>
                       <li class="nav-item">
                    <a class="nav-link" href="report_lend1.php">
                    <img src="../../images/icons/analytics.png" alt="">
                      <span class="menu-title">รายงานการเบิก</span>
                    </a>
                       </li>
                        <li class="nav-item">
                    <a class="nav-link" href="report_send1.php">
                    <img src="../../images/icons/analytics.png" alt="">
                      <span class="menu-title">รายงานคืนวัสดุ</span>
                    </a>
                       </li>

                </ul>
              </div>
            </li>
           
            <li class="nav-item">
              <a class="nav-link" href="#">
                <img src="../../images/icons/10.png" alt="">
                <span class="menu-title">Settings</span>
              </a>
            </li>
          </ul>
        </nav>

        <!-- partial -->
        <div class="content-wrapper">
      <?php
	
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
        </div>
          </div>
            </div>

</script>
	<script src="../../js/jquery.min.js"></script>
    <script src="../../JS/bootstrap.min.js"></script>   
	<script src="../../node_modules/jquery/dist/jquery.min.js"></script>
	<script src="../../node_modules/popper.js/dist/umd/popper.min.js"></script>
	<script src="../../node_modules/bootstrap/dist/js/bootstrap.min.js"></script>
	<script src="../../node_modules/perfect-scrollbar/dist/js/perfect-scrollbar.jquery.min.js"></script>
	<script src="../../js/off-canvas.js"></script>
	<script src="../../js/hoverable-collapse.js"></script>
	<script src="../../js/misc.js"></script>
</body>
</html>