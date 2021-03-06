<?php
session_start();
	include("../../function/db_function.php");
	$con=connect_db();
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
</head>

<body>
  <div class=" container-scroller">
    <!-- partial:../../partials/_navbar.html -->
    <nav class="navbar navbar-default col-lg-12 col-12 p-0 fixed-top d-flex flex-row">
      <div class="bg-white text-center navbar-brand-wrapper">
        <a class="navbar-brand brand-logo" href="../../index.html"><img src="../../images/logo_star_black.png" /></a>
        <a class="navbar-brand brand-logo-mini" href="../../index.html"><img src="../../images/logo_star_mini.jpg" alt=""></a>
      </div>
      <div class="navbar-menu-wrapper d-flex align-items-center">
        <button class="navbar-toggler navbar-toggler d-none d-lg-block navbar-dark align-self-center mr-3" type="button" data-toggle="minimize">
          <span class="navbar-toggler-icon"></span>
        </button>
        <form class="form-inline mt-2 mt-md-0 d-none d-lg-block" method="post">
          <input class="form-control mr-sm-2 search" type="text" placeholder="Search" name="keyword">
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
        <!-- partial:../../partials/_sidebar.html -->
        <nav class="bg-white sidebar sidebar-offcanvas" id="sidebar">
          <div class="user-info">
            <img src="../../images/face.jpg" alt="">
            <p class="name">Richard V.Welsh</p>
            <p class="designation">Manager</p>
            <span class="online"></span>
          </div>
          <ul class="nav">
            <li class="nav-item">
              <a class="nav-link" href="../../index.html">
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
            <li class="nav-item active">
              <a class="nav-link" href="#" title="จัดการสินทรัพย์">
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
              <a class="nav-link" href="../samples/pages/Asset/List_Asset.php" title="คืนสินทรัพย์">
                <img src="../../images/icons/clipboard.png" alt="">
                <span class="menu-title">Repatriate</span>
              </a>
            </li>
             <li class="nav-item">
              <a class="nav-link" href="../samples/pages/Asset/List_Asset.php" title="ประวัติการคืนสินทรัพย์">
                <img src="../../images/icons/history(1).png" alt="">
                <span class="menu-title">History</span>
              </a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="../widgets.html">
                <img src="../../images/icons/2.png" alt="">
                <span class="menu-title">Widgets</span>
              </a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="../forms/index.html">
                <img src="../../images/icons/005-forms.png" alt="">
                <span class="menu-title">Forms</span>
              </a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="../ui-elements/buttons.html">
                <img src="../../images/icons/4.png" alt="">
                <span class="menu-title">Buttons</span>
              </a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="../tables/index.html">
                <img src="../../images/icons/5.png" alt="">
                <span class="menu-title">Tables</span>
              </a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="../charts/index.html">
                <img src="../../images/icons/6.png" alt="">
                <span class="menu-title">Charts</span>
              </a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="../icons/index.html">
                <img src="../../images/icons/7.png" alt="">
                <span class="menu-title">Icons</span>
              </a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="../ui-elements/typography.html">
                <img src="../../images/icons/8.png" alt="">
                <span class="menu-title">Typography</span>
              </a>
            </li>
            <li class="nav-item">
              <a class="nav-link" data-toggle="collapse" href="#sample-pages" aria-expanded="false" aria-controls="sample-pages">
                <img src="../../images/icons/9.png" alt="">
                <span class="menu-title">Sample Pages<i class="fa fa-sort-down"></i></span>
              </a>
              <div class="collapse" id="sample-pages">
                <ul class="nav flex-column sub-menu">
                  <li class="nav-item">
                    <a class="nav-link" href="../samples/blank_page.html">
                      Blank Page
                    </a>
                  </li>
                  <li class="nav-item">
                    <a class="nav-link" href="../samples/login.html">
                      Login
                    </a>
                  </li>
                  <li class="nav-item">
                    <a class="nav-link" href="../samples/register.html">
                      Register
                    </a>
                  </li>
                  <li class="nav-item">
                    <a class="nav-link" href="../samples/404.html">
                      404
                    </a>
                  </li>
                  <li class="nav-item">
                    <a class="nav-link" href="../samples/500.html">
                      500
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


if(empty($_GET['keyword'])){ 
		$keyword="" ;
	}
	else{
		$keyword=$_GET['keyword'];
	}

$result = mysqli_query($con,"SELECT * FROM spare_part WHERE  id  LIKE '%$keyword%' OR name LIKE '%$keyword%'OR brand LIKE '%$keyword%'OR category =(SELECT Category_id FROM category_spare WHERE Category_name  LIKE '%$keyword%'  ORDER BY id DESC LIMIT 1)")or die(mysqli_error($con));
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
    
    <div class="container">
      <!-- Static navbar -->
      
      <style type="text/css">
#div1 {
    float:left;
    width:200px;
    height:50px;
    border:solid 1px  #999999;
    text-align:center;
	font-family:"TH Sarabun New", "Tw Cen MT";
    font-size:22px;
	padding-top:1%;
	background-color:#FFF;
}
.block-2 {
	width: 600px;
	height: 100px;
	background: #04BF9D;
	font-family:"TH Sarabun New", "Tw Cen MT";
    font-size:22px;
	padding-top:6%
}
</style>
        
                <div class="container-fluid">
                    <div class="navbar-header">
                       
						<div id='div1'>Spare Parts System</a></div>
            	        <div id='div1'><a href="index_sp.php">หน้าแรกวัสดุ-อุปกรณ์</a></div>
                       <div id='div1'><a href="cart.php">รายการวัสดุที่ยืม <?php echo $myQty; ?></a></div>
 
<?php

   if ($action == 'exists') {
     echo "<div class=\"block-2\" align='center'>เพิ่มจำนวนวัสดุแล้ว</div>";

   }
   if ($action == 'add') {
     echo "<div class=\"block-2\" align='center'>เพิ่มรายการวัสดุเรียบร้อยแล้ว</div>";

   }
   if ($action == 'order') {
     echo "<div class=\"block-2\" align='center'>ทำรายการวัสดุเรียบร้อยแล้ว</div>";
   }
   if ($action == 'orderfail') {
     echo "<div class=\"block-2\" align='center'>ทำรายการไม่สำเร็จ กรุณาลองใหม่อีกครั้ง</div>";
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
			<td  id="centertable" ><img src="../img/<?php echo $myResult['photo'] ; ?>" border="0"  width='80'  height='80'></td>
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