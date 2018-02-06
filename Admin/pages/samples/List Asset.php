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
              <a class="nav-link" href="../../pages/widgets.html">
                <img src="../../images/icons/2.png" alt="">
                <span class="menu-title">Widgets</span>
              </a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="../../pages/forms/index.html">
                <img src="../../images/icons/005-forms.png" alt="">
                <span class="menu-title">Forms</span>
              </a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="../../pages/ui-elements/buttons.html">
                <img src="../../images/icons/4.png" alt="">
                <span class="menu-title">Buttons</span>
              </a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="../../pages/tables/index.html">
                <img src="../../images/icons/5.png" alt="">
                <span class="menu-title">Tables</span>
              </a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="../../pages/charts/index.html">
                <img src="../../images/icons/6.png" alt="">
                <span class="menu-title">Charts</span>
              </a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="../../pages/icons/index.html">
                <img src="../../images/icons/7.png" alt="">
                <span class="menu-title">Icons</span>
              </a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="../../pages/ui-elements/typography.html">
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
                    <a class="nav-link" href="../../pages/samples/blank_page.html">
                      Blank Page
                    </a>
                  </li>
                  <li class="nav-item">
                    <a class="nav-link" href="../../pages/samples/login.html">
                      Login
                    </a>
                  </li>
                  <li class="nav-item">
                    <a class="nav-link" href="../../pages/samples/register.html">
                      Register
                    </a>
                  </li>
                  <li class="nav-item">
                    <a class="nav-link" href="../../pages/samples/404.html">
                      404
                    </a>
                  </li>
                  <li class="nav-item">
                    <a class="nav-link" href="../../pages/samples/500.html">
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
	echo "<div class='container'>";
	if(empty($_POST['keyword'])){ //ถ้าไม่มีการส่งค่าค้นหามาจากไฟล์
		$keyword="";//กำหนดให้ตัวแปร $keyword ว่าง
	}
	else{
		$keyword=$_POST['keyword'];//รับค่าคำค้นมาจากฟอร์ม
	}
	$result = mysqli_query($con, "SELECT * FROM asset WHERE Asset_log = 1 and (asset_id LIKE '%$keyword%' or
		Asset_name LIKE '%$keyword%' OR Asset_code LIKE '%$keyword%'OR brand LIKE '%$keyword%'
		OR Asset_Category LIKE '%$keyword%' OR Asset_serial) ORDER BY Asset_id DESC")
	or die ("MySQL =>".mysqli_error($con));
	
	$rows = mysqli_num_rows($result); //จำนวนแถวที่คิวรี่ออกมาได้
	if($rows==0){ // ถ้านับจำนวนแถวที่คิวรี่ออกมาได้เท่ากับ 0 แสดงว่าไม่มีข้อมูลที่ตรงกับคำค้นหา
		echo"<p id='middlecenter'>ไม่พบข้อมูลที่ตรงกับคำค้น\"<b>$keyword</b>\"</p><hr>";
	}
	else{
		echo"<p id='middlecenter'>จำนวนสินทรัพย์ที่ตรงกับคำว่า \"<b>$keyword</b>\"
			ทั้งหมด $rows รายการ </p>";
	$num=1; //กำหนดตัวแปรเพื่อนับแถว

	echo "<div class='row'>";
		echo "<div class='col-xl-12'>";
			echo "<table border = 1 align='center' id='titletablelist'>";
			echo "<th id='titletablelist2'>รหัสสินทรัพย์</th>";
			echo "<th id='titletablelist2'>หมายเลขทะเบียน</th>";
			echo "<th id='titletablelist2'>Serial Number</th>";
			echo "<th id='titletablelist2'>สินทรัพย์</th>";
			echo "<th id='titletablelist2'>ยี่ห้อ</th>";
			echo "<th id='titletablelist2'>แก้ไข</th>";
			echo "<th id='titletablelist2'>ลบ</th>";
			echo "<th id='titletablelist2'>สถานะ</th>";
	while(list($Asset_id,$Asset_code ,$Asset_serial ,$Asset_name ,$mac_address,$computer_name
		,$brand,$Asset_date ,$Asset_company ,$Asset_price,$Asset_barcode
		,$Asset_Category ,$Asset_photo ,$Asset_time,$detail,$Asset_status) = mysqli_fetch_row($result)){
			
		$result2 = mysqli_query($con ,"SELECT Status_name FROM status WHERE Status_id = '$Asset_status' ")
		or die("SQL Error2=>".mysqli_error($con)) ;
		list($Status_name) = mysqli_fetch_row($result2); 

			echo "<tr id='titletablelist2'>";
			echo "<td align='center' id='titletablelist2'>$Asset_id</td>";
			echo "<td align='center' id='titletablelist2'>$Asset_code</td>";
			echo "<td align='center' id='titletablelist2'>$Asset_serial</td>";
			echo "<td align='center' id='titletablelist2'>
				<a href='index.php?module=2&action=25&id=$Asset_id' title='รายละเอียด!'>$Asset_name</td>";
			echo "<td align='center' id='titletablelist2'>$brand</td>";
			echo "<td class='boxEditcolor' align='center' id='titletablelist2'>
				<a href='index.php?module=2&action=9&Asset_id=$Asset_id'>
				<img src='img/if_brush-pencil.png'  width='30'  height='30'></TD>";
			echo "<td class='boxDelecolor' align='center' id='titletablelist2'>
				<a href='index.php?module=2&action=10&Asset_id=$Asset_id'
				onclick='return confirm(\"กดปุ่ม ตกลงเพื่อยืนยันการลบข้อมูล\")'>
				<img src='img/cancel.png'  width='30'  height='30'></TD>";
			echo "<td align='center' id='titletablelist2'> <img src='img/$Asset_status.png' style='width:35px;height:35px;' title='$Status_name!'></td>";

			echo "</tr>";
		$num++;//เพิ่มค่าตัวแปรนับแถว
	}
			echo"</table>";
			echo "</div>";
		echo "</div>";
	echo "</div>";
	mysqli_free_result($result);//คืนค่าหน่วยความจำให้กับระบบ
	mysqli_close($con); //ปิดฐานข้อมูล
	}
?>
        </div>
        <!-- partial:../../partials/_footer.html -->
        <footer class="footer">
          <div class="container-fluid clearfix">
            <span class="float-right">
                <a href="#">Star Admin</a> &copy; 2017
            </span>
          </div>
        </footer>

        <!-- partial -->
      </div>
    </div>
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
