<?php
	//include("../../Funtion/funtion.php");//include ไฟล์ที่เขียนฟังก์ชั่นไว้ใช้งาน
	$con=connect_db(); //เลือกใช้คำสั่งในการติดต่อฐานข้อมูล
?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <title>ตรวจสอบสถานะสินทรัพย์</title>
    <!-- Bootstrap -->
    <link href="../../css/bootstrap.min.css" rel="stylesheet">

  </head>
  <style>
#middlecenter{
	text-align:center;
}
#button1 {
	font-size: 10px;
	text-align:center;
	width: 60px;
	border-radius: 12px;
	box-shadow: 0 12px 16px 0 rgba(0,0,0,0.24), 0 17px 50px 0 rgba(0,0,0,0.19);
}
#titletable{
	border-radius: 5px;
	box-shadow: 0 12px 16px 0 rgba(0,0,0,0.24), 0 17px 50px 0 rgba(0,0,0,0.19);
}
#titletable2{
	/*border-radius: 5px;*/
	box-shadow: 0 6px 8px 0 rgba(0,0,0,0.24), 0 10px 30px 0 rgba(0,0,0,0.19);
}
#titletable3{
	/*border-radius: 5px;*/
	box-shadow: 0 12px 16px 0 rgba(0,0,0,0.24), 0 17px 50px 0 rgba(0,0,0,0.19);
}
</style>
<body style="background-color:#EBEBEB">
<div class='container'>
<h1 align='center'>ตรวจสอบสถานะสินทรัพย์</h1>
<form method ="post"  align='center' >
	<input type ="search" name='keyword' size="50" id="titletable2">
    <input type="submit" value="ค้นหา" id="titletable2" class="btn btn-info">
</form>
<?php
	
	if(empty($_POST['keyword'])){ //ถ้าไม่มีการส่งค่าค้นหามาจากไฟล์
		$keyword="";//กำหนดให้ตัวแปร $keyword ว่าง
	}
	else{
		$keyword=$_POST['keyword'];//รับค่าคำค้นมาจากฟอร์ม
	}

	$result = mysqli_query($con, "SELECT * FROM asset WHERE Asset_name  LIKE '%$keyword%'
		OR Asset_code LIKE '%$keyword%'OR brand LIKE '%$keyword%' OR Asset_serial LIKE '%$keyword%'
		OR asset_id LIKE '%$keyword%' OR active_point LIKE '%$keyword%' ORDER BY Asset_id ASC  ")
	or die ("MySQL =>".mysqli_error($con));

	$rows=mysqli_num_rows($result); //จำนวนแถวที่คิวรี่ออกมาได้
	if($rows==0){ // ถ้านับจำนวนแถวที่คิวรี่ออกมาได้เท่ากับ 0 แสดงว่าไม่มีข้อมูลที่ตรงกับคำค้นหา
		echo"<p id='middlecenter'>ไม่พบข้อมูลที่ครงกับคำค้น\"<b>$keyword</b>\"</p><hr>";
	}
	else{
		echo"<p id='middlecenter'>ชื่อรายการสินทรัพย์มีตรงกับคำค้น \"<b>$keyword</b>\"
			มีทั้งหมด $rows รายการ </p>";
	$num=1;//กำหนดตัวแปรเพื่อนับแถว
	echo "<div class='row'>";
	echo "<div class='col-xl-12'>";
	echo "<table border = 1 align='center'>";
	/*echo "<th id='titletable'></th>";*/
	echo "<th id='titletable'>รหัสสินทรัพย์</th>";
	echo "<th id='titletable'>หมายเลขทะเบียน</th>";
	echo "<th id='titletable'>Serial Number</th>";
	echo "<th id='titletable'>ชื่อสินทรัพย์</th>";
	echo "<th id='titletable'>รุ่น / ยี่ห้อ</th>";
	echo "<th id='titletable'>สถานะการใช้งาน</th>";
	echo "<th id='titletable'>จุดใช้งาน[ล่าสุด]</th>";
	echo "<th id='titletable'>เบิกสินทรัพย์</th>";
	while(list($Asset_id,$Asset_code ,$Asset_serial ,$Asset_name ,$mac_address,$computer_name
		,$brand,$Asset_date ,$Asset_company ,$Asset_price,$Asset_barcode
		,$Asset_Category ,$Asset_photo ,$Asset_time,$detail,$Asset_status,$active_point) = mysqli_fetch_row($result)){

	$result1 = mysqli_query($con,"SELECT Active_name FROM active_point WHERE Active_id = '$active_point' ")
	or die("SQL error2  ".mysqli_error($con));
    list($active_point) = mysqli_fetch_row($result1);

	$result2 = mysqli_query($con,"SELECT Status_id,Status_name FROM status ")
	or die ("mysql error=>>".mysql_error($con));
		echo "<tr>";
		/*echo "<td><input type='checkbox' name='As_id[]' id = 'As_id' value='$Asset_id'></td>";	*/
		echo "<td align='center' id='titletable3'>$Asset_id</td>";
		echo "<td align='center' id='titletable3'>$Asset_code</td>";
		echo "<td align='center' id='titletable3'>$Asset_serial</td>";
		echo "<td align='center' id='titletable3'><a href='index.php?module=6&action=24&id=$Asset_id'>$Asset_name</a></td>";
		echo "<td align='center' id='titletable3'>$brand</td>";
		echo "<td align='center' id='titletable3'>";
		/*----------------------------^------------------------------------*/
		echo "<form action=\"index.php\">";
		echo "<input type='hidden' name='Asset_id' value= '$Asset_id'> ";
		echo "<input type='hidden' name='module' value= '6'> "; 
		echo "<input type='hidden' name='action' value= '20'> ";
		echo "<select name='Asset_status' id='titletable2' class='custom-select-sm'>";
		while(list($Status_id,$Status_name)=mysqli_fetch_row($result2)){
			if($Status_id == $Asset_status){
				$select = "selected='selected=selected'";
				//$select = $Status_id == $Asset_status? "selected":"";
			}
			else{
				$select = "";
			}
			echo "<option value='$Status_id'$select>$Status_name</option>";
		}
		echo "</select>&nbsp;&nbsp;
				<button type='submit' name='update' id='button1' value='บันทึก' class='btn btn-primary btn-sm'>บันทึก
				</button></form></td>";
		/*----------------------------v------------------------------------*/
		echo "<td align='center' id='titletable'>$active_point</td>";
		/*----------------------------^------------------------------------*/
		echo "<form action=\"index.php\" method='post'>";
		/*echo "<input type='hidden' name='As_id' value= '$As_id'> ";
		echo "<input type='hidden' name='module' value= '6'> ";
		echo "<input type='hidden' name='action' value= '21'> ";*/
		/*echo "<a href='#' class='edit-customer' data-id='$c[Rent_id]' 
		data-rent_asset='$c[Rent_asset] '>";*/
		echo "<td id='titletable' align='center'>
		<img src='img/P-1-36-128.png' width='40' height='40'
		onClick=\"openModal('".$Asset_id."', '".$Asset_code."')\">";
		echo "</a></td></form>";
		echo "</tr>";
			echo "</div>";
		echo "</div>";
		$num++;//เพิ่มค่าตัวแปรนับแถว
	}
	echo"</table>";
	echo "<nav aria-label=\"Page navigation\">";
	echo "<ul class=\"pagination\">";
    echo "<li>";
	echo "<a href='#' aria-label=\"Previous\">";
	echo "<span aria-hidden='true'>&laquo;</span>";
	echo "</a>";
	echo "</li>";
	echo "<li><a href='#'>1</a></li>";
	echo "<li><a href='#'>2</a></li>";
	echo "<li><a href='#'>3</a></li>";
	echo "<li><a href='#'>4</a></li>";
	echo "<li><a href='#'>5</a></li>";
    echo "<li>";
	echo "<a href='#' aria-label=\"Next\">";
	echo "<span aria-hidden=\"true\">&raquo;</span>";
	echo "</a>";
    echo "</li>";
	echo "</ul>";
	echo "</nav>";
	echo "</div>";
	}
	
?>
</div>
<div class='container'>
<div id="id01" class="modal">		
		<form class="modal-content animate" action="index.php?module=5&action=32" method="post" name="FormRent">
        <!--<input  type="hidden" name="As_id" value="" />
        <input type='hidden' name='module' value= '5'>
		<input type='hidden' name='action' value= '32'>-->
    	<div id="imgcontainer">
		<span onclick="document.getElementById('id01').style.display='none' " class="closes" title="Close Modal">&times;</span>
		<img src="img/if_user_accounts.png" >
	</div>
    <div id="container2" >
      	<input type="hidden" name="Rent_id" >
        <P>No : <input type="text" name="id_asset" id="id_asset" readonly></P>
		<P>รหัสสินทรัพย์ : <input type="text" name="Rent_asset" id="Rent_assets" readonly></P>
        <P>รหัสพนักงาน : <input type="text" name="Rent_emp" required></P>
        <P>จุดใช้งาน : <input type="text" name="Rent_active" required></P>
        <P>วันที่ยืม : <input type="date" name="Rent_time" required></P>
        <P>*หมายเหตุ : <textarea name="Rent_ect" ></textarea></P>
       <?php /*?><P>จุดใช้งาน : <select name="Rent_active">
        	<?php
				  $result = mysqli_query($con,"SELECT Active_id,Active_name FROM active_point")
				  or die ("mysql error=>>".mysql_error($con));
				  while(list($Active_id,$Active_name)=mysqli_fetch_row($result)){
					  $select = $Active_id == $Active_name? "selected":"";
				  echo "<option value=$Active_id>$Active_name</option>";
				  }
				  mysqli_free_result($result);
				  mysqli_close($con);
				?>
        </select></P><?php */?>
    </div>
    <div id="container2" style="background-color:#f1f1f1">
		<button type="submit">Add</button>
		<button type="button" onclick="document.getElementById('id01').style.display='none'" id="cancelbtn">Cancel</button>
    </div>
	</form>
</div>
<?php
	mysqli_free_result($result);//คืนค่าหน่วยความจำให้กับระบบ
	mysqli_close($con); //ปิดฐานข้อมูล
?>

<script>
function openModal(Asset_id, Asset_code) {
	document.getElementById('id01').style.display='block';
	document.getElementById('id_asset').value = Asset_id;
	document.getElementById('Rent_assets').value = Asset_code;
	//document.getElementsByName('Rent_assets')[0].value = asset_code;
	
}
</script>
	<script src="../../js/jquery.min.js"></script>
    <script src="../../JS/bootstrap.min.js"></script>
<p id='middlecenter'><a href="index.php">กลับหน้า Index</a></p>    
</div>    
  </body>
</html>