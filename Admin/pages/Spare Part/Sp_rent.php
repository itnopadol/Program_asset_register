<?php
session_start();
	include("../../Funtion/funtion.php");
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
                    <a class="nav-link" href="../Spare Part/list_spare.php">
                      จัดการวัสดุ-อุปกรณ์
                    </a>
                  </li>
                  <li class="nav-item active">
                    <a class="nav-link" href="../Spare Part/index_sp.php">
                      จัดทำรายการเบิก
                    </a>
                  </li>
                  <li class="nav-item">
                    <a class="nav-link" href="../Spare Part/take.php">
                      รายการรับเข้า
                    </a>
                  </li>
                  <li class="nav-item">
                    <a class="nav-link" href="../Spare Part/lend.php">
                      รายการเบิก
                    </a>
                  </li>
                  <li class="nav-item">
                    <a class="nav-link" href="../Spare Part/render.php">
                      รับคืนวัสดุ-อุปกรณ์
                    </a>
                  </li>
                  <li class="nav-item">
                    <a class="nav-link" href="../Spare Part/send.php">
                      ประวัติรับคืนวัสดุ-อุปกรณ์ 
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


$action = isset($_GET['a']) ? $_GET['a'] : "";
$ItemCount = isset($_SESSION['cart']) ? count($_SESSION['cart']) : 0;
$_SESSION['formid'] = sha1('google.co.th' .microtime());
if(isset($_SESSION['Qty'])){
	$myQty = 0;
	foreach($_SESSION['Qty'] as $myItem){
		if($myItem!=''){
			$myQty =$myQty + $myItem;
		}	
	}
}	else{
		$myQty = 0;
}
if (isset($_SESSION['cart']) and $ItemCount > 0){
	$itemIDs = "";
	foreach($_SESSION['cart'] as $ItemID){
		$itemIDs = $itemIDs . $ItemID . ",";
	}
	$inputItem = trim($itemIDs, ",");
		$inputItem = explode(",", $itemIDs);
		$inputItem = trim($inputItem[0]);
		//echo var_dump($_SESSION['cart'])."<br>".count($_SESSION['cart'])."<hr>";
		$cnt_list = $_SESSION['cart'];
		$sql = "SELECT * FROM spare_part WHERE id = '$inputItem'";
		// $sql = "SELECT * FROM spare_part";
		$myQuery = mysqli_query($con,$sql) or die ("Error =>".mysqli_error($con));
		$myCount = mysqli_num_rows($myQuery);
	}
	else{
		$myCount = 0;
}
?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <title>รายการละเอียดการยืม</title>

    <!-- Bootstrap -->
    <link href="../../CSS/nava.css" rel="stylesheet">
    <link href="../../CSS/bootstrapv3.1.1.min.css" rel="stylesheet">

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
	</style>
    <script type="text/javascript">
	function updateSubmit(){
		if(document.formupdate.rent_empID.value == ""){
			alert('โปรดใส่รหัสพนักงาน!');
			document.formupdate.rent_empID.focus();
			return false;
		}
		if(document.formupdate.rent_name.value == ""){
			alert('โปรดใส่ชื่อผู้ยืมด้วย!');
			document.formupdate.rent_name.focus();
			return false;
		}
			if(document.formupdate.rent_phone.value == ""){
			alert('โปรดใส่เบอร์โทรด้วย!');
			document.formupdate.rent_phone.focus();
			return false;
		}
		document.formupdate.submit();
		return false;
	}
</script>
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
</style>
        
            
                 
                       
						<div id='div1'>Spare Parts System</a></div>
            	        <div id='div1'><a href="index_sp.php">หน้าแรกวัสดุ-อุปกรณ์</a></div>
                        <div id='div1'><a href="cart.php">รายการวัสดุของฉัน <?php echo $myQty; ?></a></div>
       
    <?php
	if($action == 'removed'){
		echo "<div class=\"alert alert-warning\">ลบสินค้าเรียบร้อยแล้ว</";
	}
	if($myCount == 0){
		echo "<div class=\"alert alert-warning\">ยังไม่มีรายการวัสดุ";
	}else
	{	?>
    
    	<form action="updateSp_rent.php" method="post" name="formupdate" role="form" id="formupdate" onSubmit="JavaScript:return updateSubmit();">
        	<div class="form-group">
            <br>
            <table border="0" class"table" width="60%">
            <tr>
            <td><div class="form-group">
            <label for="exampleInputempID">รหัสพนักงาน</label>
            <input type="text" class="form-control" id="rent_empID" placeholder="ใส่รหัสพนักงาน" style="width:300px;" name="rent_empID">
            </div></td>
        	
           <td><div class="form-group">
            <label for="exampleInputPhone">เบอร์โทรศัพท์</label>
            <input type="text" class="form-control" id="rent_phone" placeholder="ใส่เบอร์ติดต่อ" style="width:300px;" name="rent_phone">
            </div> </td>
            </tr>
            <tr>
           <td><div class="form-group"><label for="exampleInputFullname">ชื่อพนักงาน</label>
            <input type="text" class="form-control" id="rent_name" placeholder="ใส่ชื่อพนักงาน" style="width:300px;" name="rent_name">
            </div> </td>
          <td>  <div class="form-group" >
            <label for="exampleInputrent_department" >แผนก</label>
            <select class="form-control"  id="rent_department" style="width:300px;" name="rent_department">
   					   <option value="การตลาด">การตลาด</option>
                       <option value="ไอที">ไอที</option>
  					   <option value="บุคคล">บุคคล</option>
  					   <option value="บัญชี">บัญชี</option>
  					   <option value="การเงินสินเชื่อ">การเงิน-สินเชื่อ</option>
          </select> </div></td></tr>
          
             <td><div class="form-group"><label for="exampleInputFullname">วันที่ยืม</label>
            <input type="date" class="form-control" id="lend_data"  style="width:300px;" name="lend_data"  
            readonly value="<?php echo date("Y-m-d"); ?>"
            </div> </td>
            </table>
            <br>
           <table class="table table-striped table-bordered">
	<?php
	if(isset($_SESSION['Qty'])){
		$myQty = 0;
		foreach ($_SESSION['Qty'] as $myItem) {
			if($myItem!=''){
				$myQty =$myQty + $myItem;
			}
  		}
	}
	else{
		$myQty = 0;
	}
	$total_matter = 0; //จำนวนทั้งหมด
	$num = 0; //รับจำนวนที่กรอก
		foreach($cnt_list as $rows) {
			$sql = "SELECT * FROM spare_part WHERE id = '$rows'";
			$myQuery = mysqli_query($con,$sql) or die ("Error =>".mysqli_error($con));
			foreach($myQuery as $item) {
				$key = array_search($item['id'],$_SESSION['cart']);
				$total_matter = $_SESSION['Qty'][$key] ;
				//$total_matter + ($item['stock'] * $_SESSION['Qty'][$key]);
	?>
    <thead>
        <tr>
            <th>รายการ</th>
            <th id="centertable">รหัสสินค้า</th>
            <th id="centertable">ชื่อสินค้า</th>
            <th id="centertable">รุ่น / ยี่ห้อ</th>
            <th id="centertable">ประเภท</th>
            <th id="centertable">จำนวน</th>
            <th id="centertable">จำนวนคงเหลือ</th>
            <th id="centertable">จำนวนที่ยืม</th>
            <th>&nbsp;</th>
            </tr>
	</thead>
    <tbody>
    	<tr align='center'>       
			<td><img src="../../images/<?php echo $item['photo']; ?>" width='80'  height='80'></td>
			<td>	<?php echo $item['id'];?>
            		<input type="hidden" name="articles[]" value="<?php echo $item['id'];?>">
            </td>
			<td>	<?php echo $item['name']; ?>
            		<input type="hidden" name="articles2[]" value="<?php echo $item['name'];?>">
            </td>
			<td>	<?php echo $item['brand']; ?>
            		<input type="hidden" name="articles3[]" value="<?php echo $item['brand'];?>">
            </td>
             <td><?php echo $item['category'] ?>
            	<input type="hidden" name="articles4[]" value="<?php echo $item['category'];?>">
            </td>
			<td> <!---textbox จำนวน--->
				<input type="text" name="Qty[<?php echo $num; ?>]" value="<?php echo $_SESSION['Qty'][$key]; ?>"
				class="form-control" style="width:60px;text-align:center;" readonly>
                <input type="hidden" name="articles5[]" value="<?php echo $_SESSION['Qty'][$key]; ?>">
				<input type="hidden" name="arr_key_<?php echo $num; ?>" value="<?php echo $key; ?>">
			</td>
			<td><?php echo $item['balance']; ?>
            	<input type="hidden" name="stock[]" value="<?php echo $item['balance'];?>">
            </td> <!---โชว์จำนวนต๊อก--->
			<td><?php echo $total_matter; ?>
            	<input type="hidden" name="articles6[]" value="<?php echo $total_matter;?>">
            </td> <!---โชว์จำนวนที่ทำการยืม *ค่ามาจาก Key--->
            <td>
				<a class="btn btn-danger btn-lg" href="removecart.php?ItemID=<?php echo $item['id']; ?>" role="button">
				<span></span>ลบทิ้ง</a>
			</td>
        <?php  
			} 
			$num++;
		}
		
		 ?>
                            <tr>
                            	<td colspan="9" style="text-align:right;">
                                	<input type="hidden" name="formid" value="<?php echo $_SESSION['formid']; ?>"/>
                                    <a href="cart.php" type="button" class="btn btn-danger btn-lg">ย้อนกลับ</a>
                                    <button type="submit" class="btn btn-primary btn-lg">บันทึกการยืมวัสดุ-อุปกรณ์</button>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                  </form>
                  <?php  
	}    
    		?>
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