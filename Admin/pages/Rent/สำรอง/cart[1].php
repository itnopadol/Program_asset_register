<?php
session_start();
require "../../Funtion/Funtion.php";
$con = connect_db();

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
</head>
<body>
	<div class="container">
    	<!-- Static navbar -->
    	<div class="navbar navbar-default" role="navigation">
    	<div class="container-fluid">
        	<div class="navbar-header">
            	<button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navber-collapse">
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
                        <li><a href="cart.php">รายการวัสดุของฉัน <span class="badge"><?php echo $myQty; ?></span></a></li>
    				</ul>
                 </div><!--/.nav-collapse -->
            </div><!--/.container-fluid -->
    </div>
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
            <form action="updatecart.php" method="post" name="fromupdate">
            <div align="center" id="centertable">
            	<table class="table table-striped table-bordered" >
                	<thead>
                    	<tr>
                        	<th>#</th>
                            <th id="centertable">รหัสสินค้า</th>
                            <th id="centertable">ชื่อสินค้า</th>
                            <th id="centertable">รายละเอียด</th>
                            <th id="centertable">จำนวน</th>
                            <th id="centertable">จำนวนคงเหลือ</th>
                            <th id="centertable">จำนวนที่ยืม</th>
                            <th>&nbsp;</th>
                        </tr>
                     </thead>
                     <tbody>
                     	<?php
							$total_matter = 0; //
							$num = 0; //รับจำนวนที่กรอก
							//mysqli_data_seek($myQuery,0);
							//while (list($id ,$name ,$brand,$photo) = mysqli_fetch_row($myQuery))

							while ($myResult = mysqli_fetch_assoc($myQuery))
							{
								$key = array_search($myResult['id'],$_SESSION['cart']);
								$total_matter = $total_matter + ($myResult['stock'] * $_SESSION['Qty'][$key]);
						 ?>
                                <tr>
                                	<td><img src="../../img/<?php echo $myResult['photo']; ?>"></td>
                                    <td><?php echo $myResult['id'] ?></td>
                                    <td><?php echo $myResult['name'] ?></td>
                                    <td><?php echo $myResult['brand'] ?></td>
                                    <td> <!---textbox จำนวน--->
                                    	<input type="text" name="Qty[<?php echo $num; ?>]" value="<?php echo $_SESSION['Qty'][$key]; ?>"
                                        class="form-control" style="width:60px;text-align:center;">
                                        <input type="hidden" name="arr_key_<?php echo $num; ?>" value="<?php echo $key; ?>">
                                    </td>
                                    <td><?php echo $myResult['stock']; ?></td> <!---โชว์จำนวนต๊อก--->
                                    <td><?php echo $_SESSION['Qty'][$key]; ?></td> <!---โชว์จำนวนที่ทำการยืม *ค่ามาจาก Key--->
                                    <td>
                                    <a class="btn btn-danger btn-lg" href="removecart.php?ItemID=<?php echo $myResult['id']; ?>" role="button">
                                    <span></span>ลบทิ้ง</a>
                                    </td>
                                </tr>
                                </div>
                                <?php
								$num++;
							}
							?>
                            <tr>
                            <td colspan="8" style="text-align: right;">
                                    <h4>จำนวนที่ยืมวัสดุ-อุปกรณ์ รวมทั้งหมด <?php echo $_SESSION['Qty'][$key];  echo "/".count($myQuery); ?> ชิ้น</h4>
                                </td>
                            </tr>
                            <tr>
                                <td colspan="8" style="text-align: right;">
                                    <button type="submit" class="btn btn-info btn-lg">คำนวณจำนวนใหม่</button>
                                    <a href="Sp_rent.php" type="button" class="btn btn-primary btn-lg">ทำใบเบิกวัสดุ-อุปกรณ์</a>
                                </td>
                            </tr>
                        </tbody>
                    </table>
</form>
<hr>
<form action="updatecart.php" method="post" name="fromupdate">
<div align="center" id="centertable">
<table class="table table-striped table-bordered">
	<?php
		foreach($cnt_list as $rows) {
			$sql = "SELECT * FROM spare_part WHERE id = '$rows'";
			$myQuery = mysqli_query($con,$sql) or die ("Error =>".mysqli_error($con));
			foreach($myQuery as $item) {
	?>
	<tr>
		<th>#</th>
        <th id="centertable">รหัสสินค้า</th>
        <th id="centertable">ชื่อสินค้า</th>
        <th id="centertable">รายละเอียด</th>
        <th id="centertable">จำนวน</th>
        <th id="centertable">จำนวนคงเหลือ</th>
        <th id="centertable">จำนวนที่ยืม</th>
        <th>&nbsp;</th>
        </tr>

	<?php
		$total_matter = 0; //
		$num = 0; //รับจำนวนที่กรอก
		while ($myResult = mysqli_fetch_assoc($myQuery))
		{
		$key = array_search($myResult['id'],$_SESSION['cart']);
		$total_matter = $total_matter + ($myResult['stock'] * $_SESSION['Qty'][$key]);
	?>
	<tr>
		<td><img src="../../img/<?php echo $item['photo']; ?>"></td>
        <td><?php  echo $item['id']; ?></td>
        <td><?php  echo $item['name']; ?></td>
        <td><?php echo $item['brand'] ?></td>
        <td> <!---textbox จำนวน--->
                                    	<input type="text" name="Qty[<?php echo $num; ?>]" value="<?php echo $_SESSION['Qty'][$key]; ?>"
                                        class="form-control" style="width:60px;text-align:center;">
                                        <input type="hidden" name="arr_key_<?php echo $num; ?>" value="<?php echo $key; ?>">
		</td>
		<td><?php echo $item['stock']; ?></td> <!---โชว์จำนวนต๊อก--->
		<td><?php echo $_SESSION['Qty'][$key]; ?></td> <!---โชว์จำนวนที่ทำการยืม *ค่ามาจาก Key--->
        <td>
			<a class="btn btn-danger btn-lg" href="removecart.php?ItemID=<?php echo $myResult['id']; ?>" role="button">
			<span></span>ลบทิ้ง</a>
		</td>
	</tr>
    </div>
	<?php
	$num++;
	}
	?>
    <tr>
		<td colspan="8" style="text-align: right;">
		<h4>จำนวนที่ยืมวัสดุ-อุปกรณ์ รวมทั้งหมด <?php echo $_SESSION['Qty'][$key];  echo "/".count($myQuery); ?> ชิ้น</h4>
		</td>
	</tr>
	<tr>
		<td colspan="8" style="text-align: right;">
			<button type="submit" class="btn btn-info btn-lg">คำนวณจำนวนใหม่</button>
			<a href="Sp_rent.php" type="button" class="btn btn-primary btn-lg">ทำใบเบิกวัสดุ-อุปกรณ์</a>
		</td>
	</tr>
</table>

</form>
<?php
}
?>
	</div> <!-- /container -->
    <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    <script src="../../js/jquery.min.js"></script>
    <!-- Include all compiled plugins (below), or include individual files as needed -->
    <script src="../../JS/bootstrap.min.js"></script>
  </body>
</html>