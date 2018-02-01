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

	
	$No=$_GET['id']; 
	$result=mysqli_query($con,"SELECT * FROM lend_spare WHERE 
	Order_lend='$No'") or die("SQL Error=>".mysqli_error($con));
	
	echo "<table border='0' align='center' width='90%' >";
	echo "<tr>";
	echo "<td>";
	echo "<table border='0' align='center' class='table' >";
	echo "<thead 	>";
	echo "<tr>";
	echo "<th>เลขที่ใบเบิก</th>";
	echo "<th>รหัสวัสดุ</th>";
	echo "<th>รายการ</th>";
	echo "<th>รุ่น/ยี่ห้อ</th>";
	echo "<th>จำนวนที่จ่าย</th>";
	echo "<th>จำนวนที่คืน</th>";
	echo "<th>วันที่คืน</th>";
	echo "<th>รับคืน</th>";
	echo "</tr>";
	echo "</thead>";
	
	while(list($No,$id_spare,$name,$detail,$category_lend,$amount,$Order_lend,$lend_data,$rent_empID)=mysqli_fetch_row($result)){
?>
<form action="Insert_render.php" method="post" enctype="multipart/form-data">
	<tr align='center' >
    
    <td><?php echo $Order_lend ?>
    <input type="hidden" name="Order_lend" value="<?php echo $Order_lend ?>"></td>
    
     <td><?php echo $id_spare ?>
    <input type="hidden" name="id_spare" value="<?php echo $id_spare ?>"></td>
    
    <td><?php echo $name?>
    <input type="hidden" name="name" value="<?php echo $name ?>"></td>
    
    <td><?php echo $detail ?>
    <input type="hidden" name="detail" value="<?php echo $detail ?>"></td>
    
    <td><?php echo $amount?>
    <input type="hidden" name="amount" value="<?php echo $amount ?>"></td>
    
    
    <td><input type="text" name="number"  size="5" value=""></td>
    
    <td><input type="date" name="time"  size="5" value=""></td>
   
    <td align=''><a href='Insert_render.php'><button type='submit'  class="btn btn-info" data-toggle='modal' data-target='#myModal'><img src='../img/document_edit.png'  width='27'  height='27'> รับคืน</button></td>
 <?php
    }
   ?>
</tr>
</table>
        </div>
        <!-- partial -->
      </div>
    </div>
  
  <!-- partial:../../partials/_footer.html -->
        <footer class="footer">
          <div class="container-fluid clearfix">
            <span class="float-right">
                <a href="#">Star Admin</a> &copy; 2017
            </span>
          </div>
        </footer>
        </div>
<script>
	function openModal(Asset_id, Asset_code ,Rent_time){
		$('#id01').modal('show');
		document.getElementById('id_asset').value = Asset_id;
		document.getElementById('Rent_assets').value = Asset_code;
		document.getElementById('Rent_time').value = Rent_time;
		//document.getElementsByName('Rent_assets')[0].value = asset_code;
}
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