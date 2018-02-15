﻿<?php
	session_start();
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
        <a class="navbar-brand brand-logo" href="../../index.php"><img src="../../images/Nopadol LOGO-1--05.png" /></a>
        <a class="navbar-brand brand-logo-mini" href="../../index.php"><img src="../../images/Nopadol LOGO-1--03.png" alt=""></a>
      </div>
      <div class="navbar-menu-wrapper d-flex align-items-center">
        <button class="navbar-toggler navbar-toggler d-none d-lg-block navbar-dark align-self-center mr-3" type="button" data-toggle="minimize">
          <span class="navbar-toggler-icon"></span>
        </button>
        <form class="form-inline mt-2 mt-md-0 d-none d-lg-block" method ="post">
          <input class="form-control mr-sm-2 search" type="text" placeholder="Search" name='keyword'>
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
            <p class="name">Administrator</p>
            <p class="designation">Admin Manager</p>
            <span class="online"></span>
          </div>
          <ul class="nav">
            <li class="nav-item">
              <a class="nav-link" href="../../index.php">
                <img src="../../images/icons/house.png" alt="">
                <span class="menu-title">Home</span>
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
              <a class="nav-link" href="../Search/Search_asset.php">
                <img src="../../images/icons/search.png" alt="">
                <span class="menu-title">Search asset</span>
              </a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="../User/Logout.php">
                <img src="../../images/icons/exit.png" alt="">
                <span class="menu-title">Logout</span>
              </a>
            </li>
          </ul>
        </nav>

        <!-- partial -->
        <div class="content-wrapper">
    <link rel="stylesheet" href="css/css/bootstrap.min.css">
<body class="bodyfont">
<div class="container">

	<!-- Static navbar -->

<?php

if(empty($_GET['keyword'])){ 
		$keyword="" ;
	}
	else{
		$keyword=$_GET['keyword'];
	}

$result = mysqli_query($con,"SELECT*FROM spare_part WHERE  name  LIKE '%$keyword%' OR name LIKE '%$keyword%'OR brand LIKE '%$keyword%'OR category =(SELECT Category_id FROM category_spare WHERE Category_name  LIKE '%$keyword%'  ORDER BY id DESC LIMIT 1)")or die(mysqli_error($con));
$action = isset($_GET['a'])? $_GET['a']: "";
$ItemCount = isset($_SESSION['cart']) ? count($_SESSION['cart']) : 0;
// echo var_dump($_SESSION['Qty']);
if(isset($_SESSION['Qty'])){
	$myQty = 0;
	foreach ($_SESSION['Qty'] as $myItem) {
		if($myItem!=''){
			$myQty =$myQty + $myItem;
		}	
  	}
}else{
	$myQty = 0;
}
$row=mysqli_num_rows($result); 
	$rowspage=5;
	$page=ceil($row/$rowspage); 

    if(empty($_GET['page_id'])){
		$page_id=1;
	}
	else{
			$page_id=$_GET['page_id'];
	}
	
	 $start_rows=($page_id*$rowspage)-$rowspage;
	 
?>
  <style>
#ccc {
    list-style-type: none;
	border-radius: 8px;
    margin: 0;
    padding: 3;
	font-family:"TH Sarabun New", "Tw Cen MT";
    font-size:20px;
    overflow: hidden;
    background-color: #4F4F4F;
}

#xx {
    float: left;
}

#xx a {
    display: block;
    color: white;
    text-align: center;
    padding: 12px 16px;
    text-decoration: none;
}

#xx a:hover {
    background-color: #111;
}
</style>
</head>
<body>
  <ul id="ccc">
  <li id="xx"><a class="active" href="#home">Spare Parts System</a></li>
  <li id="xx"><a href="index_sp.php">หน้าแรกวัสดุ-อุปกรณ์</a></li>
  <li id="xx"><a href="cart.php">รายการวัสดุที่ยืม &nbsp;<?php echo $myQty; ?></a></li>
</ul>
 
 <?php
   if ($action == 'exists') {
     echo "<div class=\"alert alert-warning\">เพิ่มจำนวนวัสดุแล้ว</div>";

   }
   if ($action == 'add') {
     echo "<div class=\"alert alert-success\">เพิ่มรายการวัสดุเรียบร้อยแล้ว</div>";

   }
   if ($action == 'order') {
     echo "<div class=\"alert alert-success\">ทำรายการวัสดุเรียบร้อยแล้ว</div>";
   }
   if ($action == 'orderfail') {
     echo "<div class=\"alert alert-success\">ทำรายการไม่สำเร็จ กรุณาลองใหม่อีกครั้ง</div>";
   }
?>

    <table class="table" id="centertable" width="80%">
      <thead>
        <tr>
            <th id="centertable">รายการ</th>
            <th id="centertable">รหัสวัสดุ</th>
            <th id="centertable">ชื่อสินค้า</th>
            <th id="centertable">ยี่ห้อ</th>
            <th id="centertable">ประเภท</th>
            <th id="centertable">จำนวนที่เหลือ</th>
            <th> </th>
         <tr>
       </thead>
     <tbody >
       <?php while ($myResult = mysqli_fetch_assoc($result)) {
		   
      ?>
      
		<tr>
			<td  id="centertable" ><img src="../../images/<?php echo $myResult['photo'] ; ?>" border="0"  width='80'  height='80'></td>
			<td id="centertable" style="padding-top:3%"><?php echo $myResult['id']; ?>
            	<input type="hidden" name="articles[]" value="<?php echo $item['id'];?>">
            </td>
			<td id="centertable" style="padding-top:3%"><?php echo $myResult['name']; ?>
            	<input type="hidden" name="articles2[]" value="<?php echo $item['name'];?>">
            </td>
			<td id="centertable" style="padding-top:3%" ><?php echo $myResult['brand']; ?>
            	<input type="hidden" name="articles3[]" value="<?php echo $item['brand'];?>">
            </td>
            <td id="centertable" style="padding-top:3%" ><?php echo $myResult['category']; ?>
            	<input type="hidden" name="articles3[]" value="<?php echo $item['category'];?>">
            </td>
			<td id="centertable" style="padding-top:3%" ><?php echo $myResult['balance']; ?>
            	<input type="hidden" name="articles5[]" value="<?php echo $item['balance'];?>">
            </td>
			<td style="padding-top:2%" >
				<a class="btn btn-primary btn-lg" href="updatecart.php?ItemID=<?php echo $myResult['id']; ?>" role="button">
				<span></span>เลือกรายการ</a>
                
			</td>
		</tr>
        
			<?php	
	   }
			?>
		</tbody>
		</table>
      

        </div> <!-- /container -->
    <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    <!--<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>-->
    <script src="../js/jquery.min.js"></script>
    <!-- Include all compiled plugins (below), or include individual files as needed -->
    <script src="../js/bootstrap.min.js"></script>

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