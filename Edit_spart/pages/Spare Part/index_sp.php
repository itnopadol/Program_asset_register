<?php
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
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <link href="../../CSS/bootstrapv3.1.1.min.css" rel="stylesheet" >
    <title>Test ทดสอบการเพิ่มข้อมูล</title>
    <!-- Bootstrap -->
    <link href="../../CSS/nava.css" rel="stylesheet" type="text/css">
    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
    <style>
		#centertable{
			text-align:center;	
		}
	.hovertable th{
		background: #39C;
	}


	</style>
    


  </head>
  <body>
    <div class="container">
      <!-- Static navbar -->
            <div class="navbar navbar-default" role="navigation">
                <div class="container-fluid">
                    <div class="navbar-header">
                        <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                            <span class="sr-only">Toggle navigation</span>
                            <span class="icon-bar"></span>
                            <span class="icon-bar"></span>
                            <span class="icon-bar"></span>
                        </button>
						<a class="navbar-brand" href="index_sp.php">Spare Parts System</a>
                    </div>
                    <div class="navbar-collapse collapse">
                        <ul class="nav navbar-nav">
                            <li class="active"><a href="index_sp.php">หน้าแรกวัสดุ-อุปกรณ์</a></li>
                            <li><a href="cart.php">รายการวัสดุที่ยืม <span class="badge"><?php echo $myQty; ?></span></a></li>
            </ul>
            <form class="form-inline my-2 my-lg-0" align="right" >
	   ค้นหา :  <input class="form-control mr-sm-2" type="search" placeholder="ค้นหารายการ" aria-label="Search" id="sizezi2" name='keyword'>
       <button class="btn btn-outline-success my-2 my-sm-0" type="submit" id="sizezi2">Search</button></form></li>
            
    </div><!--ปิด nav-collapse-->
   </div><!--ปืด container-fluid-->
  </div>

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
    <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    <!--<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>-->
    <script src="../js/jquery.min.js"></script>
    <!-- Include all compiled plugins (below), or include individual files as needed -->
    <script src="../js/bootstrap.min.js"></script>
       
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