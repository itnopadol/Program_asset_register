<?php
session_start();
require "../../Funtion/Funtion.php";
$con = connect_db();

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
			alert('โปรดใส่ชื่อคนยืมด้วย!');
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
  </head>
  <body>
  	<!-- Static navbar -->
    <div class="container">
	<div class="navbar navbar-default" role="navigation">
    	<div class="container-fluid">
        	<div class="navbar-header">
            	<button type="button" class="navbar-toggle" data-target=".navbar-collapse">
                	<span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" href="index_sp.php">Spare Parts System</a>
			</div><!--navbar-header-->
            <div class="navbar-collapse collapse">
            	<ul class="nav navbar-nav">
                	<li class="active"><a href="index_sp.php">หน้าแรก</a></li>
                    <li><a href="cart.php">รายการวัสดุของฉัน<span class="badge"<?php echo $myQty; ?></span></a></li>
                </ul> 
			</div><!--navbar-collapse-->
		</div><!--container-fluid-->
	<div> <!--navbar-default-->
    <h3>รายการยืมวัสดุ-อุปกรณ์</h3>
    <?php
	if($action == 'removed'){
		echo "<div class=\"alert alert-warning\">ลบสินค้าเรียบร้อยแล้ว</";
	}
	if($myCount == 0){
		echo "<div class=\"alert alert-warning\">ยังไม่มีรายการวัสดุ";
	}else
	{	?>
    
    	<form action="updateSp_rent[x].php" method="post" name="formupdate" role="form" id="formupdate" onSubmit="JavaScript:return updateSubmit();">
        	<div class="form-group">
            <label for="exampleInputempID">รหัสพนักงาน</label>
            <input type="text" class="form-control" id="rent_empID" placeholder="ใส่รหัสพนักงาน" style="width:300px;" name="rent_empID">
            </div>
        	<div class="form-group">
            <label for="exampleInputFullname">ชื่อพนักงาน</label>
            <input type="text" class="form-control" id="rent_name" placeholder="ใส่ชื่อพนักงาน" style="width:300px;" name="rent_name">
            </div>
            <div class="form-group">
            <label for="exampleInputPhone">เบอร์โทรศัพท์</label>
            <input type="text" class="form-control" id="rent_phone" placeholder="ใส่เบอร์ติดต่อ" style="width:300px;" name="rent_phone">
            </div>
            	<?php /*?><table class="table table-striped table-bordered">
                	<thead>
                    	<tr>
                        	<th id="centertable">รหัสสินค้า</th>
                            <th id="centertable">ชื่อสินค้า</th>
                            <th id="centertable">รายละเอียด</th>
                            <th id="centertable">จำนวน</th>
						</tr>
                     </thead>
                     <tbody>
                     	<?php
						$total_price = 0;
						$num = 0;
						while($myResult = mysqli_fetch_assoc($myQuery))
						{
							$key = array_search($myResult['id'], $_SESSION['cart']);
							$total_price = $total_price + ($myResult['price'] * $_SESSION['Qty'][$key]);
							?>
                            <tr>
                            	<td id="centertable"><?php echo $myResult['id']; ?></td>
                                <td id="centertable"><?php echo $myResult['name']; ?></td>
                                <td id="centertable"><?php echo $myResult['brand']; ?></td>
                                <td id="centertable">
                                	<?php echo $_SESSION['Qty'][$key]; ?>
                                    <input type="hidden" name="Qty[]" value="<?php echo $_SESSION['Qty'][$key]; ?>">
                                    <input type="hidden" name="id[]" value="<?php echo $myResult['id']; ?>">
                                    <input type="hidden" name="price[]" value="<?php echo $myResult['price']; ?>">
                                </td>
                            </tr>
                            <?php
							$num++;
						}
							?><?php */?>
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
    	<tr>
			<td><img src="../../img/<?php echo $item['photo']; ?>"></td>
			<td><?php echo $item['id'] ?></td>
			<td><?php echo $item['name'] ?></td>
			<td><?php echo $item['brand'] ?></td>
			<td> <!---textbox จำนวน--->
				<input type="text" name="Qty[<?php echo $num; ?>]" value="<?php echo $_SESSION['Qty'][$key]; ?>"
				class="form-control" style="width:60px;text-align:center;" readonly>
                <input type="hidden" name="amount" value="<?php echo $_SESSION['Qty'][$key]; ?>">
				<input type="hidden" name="arr_key_<?php echo $num; ?>" value="<?php echo $key; ?>">
			</td>
			<td><?php echo $item['stock']; ?></td> <!---โชว์จำนวนต๊อก--->
			<td><?php echo $total_matter; ?></td> <!---โชว์จำนวนที่ทำการยืม *ค่ามาจาก Key--->
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
                            	<td colspan="8" style="text-align:right;">
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
    </div><!--Container-->
    <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    <script src="../../js/jquery.min.js"></script>
    <!-- Include all compiled plugins (below), or include individual files as needed -->
    <script src="../../JS/bootstrap.min.js"></script>
  </body>
</html>