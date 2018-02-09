<?php
	include("../../Funtion/funtion.php");//include ไฟล์ที่เขียนฟังก์ชั่นไว้ใช้งาน
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
        <form class="form-inline mt-2 mt-md-0 d-none d-lg-block">
          <input class="form-control mr-sm-2 search" type="text" placeholder="Search">
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
            <li class="nav-item active">
              <a class="nav-link" href="../../index.html">
                <img src="../../images/icons/1.png" alt="">
                <span class="menu-title">Dashboard</span>
              </a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="../samples/pages/Status/list_status.php" title="จัดการสินทรัพย์">
                <img src="../samples/images/icons/list.png" alt="">
                <span class="menu-title">Management Asset</span>
              </a>
            </li>
             <li class="nav-item">
              <a class="nav-link" href="../samples/pages/Asset/List_Asset.php" title="รายชื่อสินทรัพย์">
                <img src="../samples/images/icons/list-with-dots.png" alt="">
                <span class="menu-title">List Asset</span>
              </a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="../samples/pages/Asset/List_Asset.php" title="คืนสินทรัพย์">
                <img src="../samples/images/icons/clipboard.png" alt="">
                <span class="menu-title">Repatriate</span>
              </a>
            </li>
             <li class="nav-item">
              <a class="nav-link" href="../samples/pages/Asset/List_Asset.php" title="ประวัติการคืนสินทรัพย์">
                <img src="../samples/images/icons/history(1).png" alt="">
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
        <h2 align='center'>รายการที่ยืมสินทรัพย์</h2>
	<?php 
	$result = mysqli_query($con,"SELECT * FROM rent WHERE Rent_log = 1") or die ("Error =>".mysqli_error($con));
	$rows = mysqli_num_rows($result); //จำนวนแถวที่คิวรี่ออกมาได้
		echo "<div class='row mb-2'>";
		echo "<div class='col-lg-12'>";
		echo "<div class='card'>";
		echo "<div class='card-body'>";
		echo "<h5 class='card-title mb-4'>ตารางแสดงสินทรัพย์ทั้งหมด</h5>";
		echo "<div class='table-responsive'>";	
		echo "<table align='center' class='table table-hover table-striped'>";
		echo "<tr >";
		echo "<th>No</th>";
		echo "<th>ชื่อสินทรัพย์</th>";
		echo "<th>ชื่อพนักงาน</th>";
		echo "<th>จุดใช้งาน</th>";
		echo "<th>วันที่ยืม</th>";
		echo "<th>หมายเหตุ</th>";
		echo "<th id='titletablelist2'>คืน</th>";
		while(list($Rent_id,$Rent_asset,$Rent_emp,$Rent_active,$Rent_time,$Rent_ect) = mysqli_fetch_row($result)){
			
			$result1 = mysqli_query($con,"SELECT Asset_name FROM asset WHERE Asset_id = '$Rent_asset'") 
			or die ("Error =>".mysqli_error($con));
			list($Rent_asset) = mysqli_fetch_row($result1);
			
			$result2 = mysqli_query($con,"SELECT Emp_name FROM employee WHERE Emp_code = '$Rent_emp'") 
			or die ("Error =>".mysqli_error($con));
			list($Rent_emp) = mysqli_fetch_row($result2);
			
			$result3 = mysqli_query($con,"SELECT Active_name FROM active_point WHERE Active_id = '$Rent_active'") 
			or die ("Error =>".mysqli_error($con));
			list($Rent_active) =  mysqli_fetch_row($result3);
			echo "<tr>";
			echo "<td>$Rent_id</td>";
			echo "<td>$Rent_asset</td>";
			echo "<td>$Rent_emp</td>";
			echo "<td>$Rent_active</td>";
			echo "<td>$Rent_time</td>";
			echo "<td>$Rent_ect</td>";
			echo "<td id='titletablelist2'>
				<a href='index.php?module=5&action=34&Rent_id=$Rent_id'onclick='return confirm(\"กดปุ่ม ตกลงเพื่อยืนยันการคืนข้อมูล\")'>
				<img src='../../images/System_Restore.png'  width='30'  height='30'></TD>";
			
			echo "</tr>"; 
			echo "</div>";
			echo "</div>";
			}		
			echo "</table>";
			echo "</div>";
		?>
        </div>
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

  <script src="../../node_modules/jquery/dist/jquery.min.js"></script>
  <script src="../../node_modules/popper.js/dist/umd/popper.min.js"></script>
  <script src="../../node_modules/bootstrap/dist/js/bootstrap.min.js"></script>
  <script src="../../node_modules/perfect-scrollbar/dist/js/perfect-scrollbar.jquery.min.js"></script>
  <script src="../../js/off-canvas.js"></script>
  <script src="../../js/hoverable-collapse.js"></script>
  <script src="../../js/misc.js"></script>
</body>
</html>