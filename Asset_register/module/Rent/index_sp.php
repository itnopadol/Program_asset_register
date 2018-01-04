<?php
session_start();
include("../../Funtion/Funtion.php");
$con = connect_db();

$result = mysqli_query($con,"SELECT * FROM spare_part") or die ("Error =>".mysqli_error($con));

$action = isset($_GET['a'])? $_GET['a']: "";
$ItemCount = isset($_SESSION['cart']) ? count($_SESSION['cart']) : 0;
if(isset($_SESSION['Qty'])){
	$myQty = 0;
	foreach ($_SESSION['Qty'] as $myItem) {
	$myQty = (int)$myQty + (int)$myItem;
	//echo $myQty ."<br>". $myItem;
  }
}
else {
  $myQty = 0;
}
?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <title>Test ทดสอบการเพิ่มข้อมูล</title>

    <!-- Bootstrap -->
    <link href="../../CSS/bootstrapv3.1.1.min.css" rel="stylesheet">
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
						<a class="navbar-brand" href="#">Spare Parts System</a>
                    </div>
                    <div class="navbar-collapse collapse">
                        <ul class="nav navbar-nav">
                            <li class="active"><a href="index_sp.php">หน้าแรกวัสดุ-อุปกรณ์</a></li>
                            <li><a href="cart.php">รายการวัสดุที่ยืม <span class="badge"><?php echo $myQty; ?></span></a></li>
                            <li><a href="#">เพิ่มรายการวัสดุ</a></li>
                        </ul>
    </div><!--ปิด nav-collapse-->
   </div><!--ปืด container-fluid-->
  </div>

    <h3 align="center">หน้าแรกของวัสดุ-อุปกรณ์</h3>
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
    <table class="table table-striped" id="centertable">
      <thead>
        <tr>
            <th id="centertable">#</th>
            <th id="centertable">รหัสวัสดุ</th>
            <th id="centertable">ชื่อสินค้า</th>
            <th id="centertable">ยี่ห้อ</th>
            <th id="centertable">จำนวนที่เหลือ</th>
            <th> </th>
         <tr>
       </thead>
     <tbody>
       <?php while ($myResult = mysqli_fetch_assoc($result)) {

      ?>
		<tr>
			<td id="centertable"><img src="../../img/<?php echo $myResult['photo']; ?>" border="0"></td>
			<td id="centertable"><?php echo $myResult['id']; ?></td>
			<td id="centertable"><?php echo $myResult['name']; ?></td>
			<td id="centertable"><?php echo $myResult['brand']; ?></td>
			<td id="centertable"><?php echo $myResult['stock']; ?></td>
			<?php /*?><td><?php echo number_format($myResult['stock'],2); ?></td><?php */?>
			<td >
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
    <script src="../../js/jquery.min.js"></script>
    <!-- Include all compiled plugins (below), or include individual files as needed -->
    <script src="../../js/bootstrap.min.js"></script>
  </body>
</html>