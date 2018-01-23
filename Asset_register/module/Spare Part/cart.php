<?php
	session_start();
	include("../../function.php");
	$con=connect_db();

$action = isset($_GET['a'])? $_GET['a']: "";
$ItemCount = isset($_SESSION['cart']) ? count($_SESSION['cart']) : 0;
if(isset($_SESSION['Qty'])){
	$myQty = 0;
	foreach ($_SESSION['Qty'] as $myItem) {
	if($myItem!=''){
			$myQty =$myQty + $myItem;
		}
  }
}
else {
	$myQty = 0;
}
	if (isset($_SESSION['cart']) and $ItemCount > 0){
		$itemIDs = "";
		foreach($_SESSION['cart'] as $ItemID){
			$itemIDs = $itemIDs . $ItemID . " , ";
	}
	/*----------------------------------------------------------*/
	
		$inputItem = trim($itemIDs, ",");
		$inputItem = explode(",", $itemIDs);
		$inputItem = trim($inputItem[0]);
		//echo var_dump($_SESSION['cart'])."<br>".count($_SESSION['cart'])."<hr>";
		$cnt_list = $_SESSION['cart'];
		$sql = "SELECT * FROM spare_part WHERE id = '$inputItem'";
		// $sql = "SELECT * FROM spare_part";
		$myQuery = mysqli_query($con,$sql) or die ("Error =>".mysqli_error($con));
		$myCount = mysqli_num_rows($myQuery);
	/*----------------------------------------------------------*/
		}else{
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
    <title>รายการวัสดุของฉัน</title>
    <!-- Bootstrap -->
    <link href="../../CSS/nava.css" rel="stylesheet">
    <!--<link href="../../CSS/bootstrapv3.1.1.min.css" rel="stylesheet">-->
    <link href="../../CSS/bootstrap.min.css" rel="stylesheet">
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
	body{
		font-family:"TH Sarabun New", "Tw Cen MT";
		font-size:22px;
	}
	#sizezi{
		font-size:26px;
		
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
	</style>
</head>
<body>
	<div class="container">
    	<!-- Static navbar -->
    	<div id="sizezi2">
		<nav class="navbar navbar-expand-lg navbar-light bg-light">
			<a class="navbar-brand" href="#" id="sizezi">Spare Parts System</a>
				<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" 
                aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation"><span class="navbar-toggler-icon"></span>
  				</button>
		<div class="collapse navbar-collapse" id="navbarSupportedContent">
			<ul class="navbar-nav mr-auto">
				<li class="nav-item">
					<a class="nav-link" href="index_spUi.php">หน้าแรกวัสดุ-อุปกรณ์</a>
				</li>
				<li class="nav-item active">
					<!--<a class="nav-link" href="New_index2.php?module=9&action=50">รายการวัสดุที่ยืม <span class="badge badge-secondary">-->
                    <a class="nav-link" href="cart.php">รายการวัสดุของฉัน <span class="badge badge-secondary">
					<?php echo $myQty; ?></span></a>
				</li>
				<li class="nav-item">
					<a class="nav-link" href="#">เพิ่มรายการวัสดุ</a>
				</li>
			</ul>
            </div>
                <form class="form-inline my-2 my-lg-0">
                    <input class="form-control mr-sm-2" type="search" placeholder="Search" aria-label="Search" id="sizezi2">
                    <button class="btn btn-outline-success my-2 my-sm-0" type="submit" id="sizezi2">Search</button>
                </form>
			</div>
		</nav>
    <h3>รายการวัสดุของฉัน</h3>
    <?php
		if($action == "removed")
		{
			echo "<div class=\"alert alert-warning\">ลบข้อมูลเรียบร้อยแล้ว</div>";
		}
		if($myCount == 0){
			echo "<div class=\"alert alert-warning\">ยังไม่มีรายการวัสดุ</div>";
		}else{
			?>  
<hr>
<!--<form action="New_index2.php?module=9&action=69" method="post" name="fromupdate">-->
<form action="updatecart.php" method="post" name="fromupdate">
<div align="center" id="centertable">
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
    	<tr align='center' >
			<td><img src="../../img/<?php echo $item['photo']; ?>"  width='80'  height='80'></td>
			<td><?php echo $item['id'] ?>
            	<input type="hidden" name="articles[]" value="<?php echo $item['id'];?>">
            </td>
			<td><?php echo $item['name'] ?>
            	<input type="hidden" name="articles2[]" value="<?php echo $item['name'];?>">
            </td>
			<td><?php echo $item['brand'] ?>
            	<input type="hidden" name="articles3[]" value="<?php echo $item['brand'];?>">
            </td>
            <td><?php echo $item['category'] ?>
            	<input type="hidden" name="articles4[]" value="<?php echo $item['category'];?>">
            </td>
			<td> <!---textbox จำนวน--->
				<input type="text" name="Qty[<?php echo $num; ?>]" value="<?php echo $_SESSION['Qty'][$key]; ?>"
				class="form-control" style="width:60px;text-align:center;">
                <input type="hidden" name="articles5[]" value="<?php echo $_SESSION['Qty'][$key];?>">
				<input type="hidden" name="arr_key_<?php echo $num; ?>" value="<?php echo $key; ?>">
			</td>
			<td><?php echo $item['stock']; ?>
            	<?php /*?><input type="hidden" name="articles[]" value="<?php echo $item['stock'];?>"><?php */?>
            </td> <!---โชว์จำนวนต๊อก--->
			<td><?php echo $total_matter; ?>
            	<?php /*?><input type="hidden" name="articles[]" value="<?php echo $total_matter;?>"><?php */?>
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
				<td colspan="9" style="text-align: right;">
					<h4>จำนวนรายการที่ยืมวัสดุ-อุปกรณ์ ทั้งหมด <?php echo $num; ?> รายการ</h4>
                    <h4>รวมทั้งหมด <?php echo $myQty ; ?> ชิ้น</h4>
				</td>
			</tr>
			<tr>
				<td colspan="9" style="text-align: right;">
				<button type="submit" class="btn btn-info btn-lg">คำนวณจำนวนใหม่</button>
				<a href="Sp_rent.php" type="button" class="btn btn-primary btn-lg">ทำใบเบิกวัสดุ-อุปกรณ์</a>
				</td>
			</tr>
	</tbody>                     
	</table>
        </div>
        </form>
        <?php
		}
		?>
	</div> <!-- /container -->
	<script src="../../JS/jquery-3.2.1.min.js"></script>
    <script src="../../JS/popper.min.js" ></script>
    <script src="../../JS/bootstrap.min.js" ></script>
  </body>
</html>