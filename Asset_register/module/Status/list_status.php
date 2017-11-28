<?php
	//include("../../Funtion/funtion.php");//include ไฟล์ที่เขียนฟังก์ชั่นไว้ใช้งาน
	$con=connect_db(); //เลือกใช้คำสั่งในการติดต่อฐานข้อมูล
?>
<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>ตรวจสอบสถานะสินทรัพย์</title>
<link href="../../CSS/Test.css" rel="stylesheet" type="text/css">
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
<h1 align='center'>ตรวจสอบสถานะสินทรัพย์</h1>
<form method ="post"  align='center' >
	<input type ="search" name='keyword' size="50" id="titletable2">
    <input type="submit" value="ค้นหา" id="titletable2">
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

	echo "<table border = 1 align='center'>";
	echo "<th id='titletable'>รหัสสินทรัพย์</th>";
	echo "<th id='titletable'>หมายเลขทะเบียน</th>";
	echo "<th id='titletable'>Serial Number</th>";
	echo "<th id='titletable'>ชื่อสินทรัพย์</th>";
	echo "<th id='titletable'>รุ่น / ยี่ห้อ</th>";
	echo "<th id='titletable'>สถานะการใช้งาน</th>";
	echo "<th id='titletable'>จุดใช้งาน</th>";
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
		echo "<select name='Asset_status' id='titletable2'>";
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
				<button type='submit' name='update' id='button1' value='บันทึก'>บันทึก</button></form></td>";
		echo "<td align='center' id='titletable'>$active_point</td>";
		
		echo "<form action=\"index.php\" method='get'>";
		echo "<td id='titletable' align='center'>
		<img src='img/P-1-36-128.png' width='40' height='40'
		onClick=\"document.getElementById('id01').style.display='block'\">";
		echo "<input type='hidden' name='Asset_id' value= '$Asset_id'> ";
		echo "<input type='hidden' name='module' value= '6'> ";
		echo "<input type='hidden' name='action' value= '21'> ";
		//$rent_asset = $Asset_id;
		echo "</a></td></form>";
		echo "</tr>";
		$num++;//เพิ่มค่าตัวแปรนับแถว
	}
	echo"</table>";
	
	}
?>

<img src="img/P-1-36-128.png" width="40" height="40" >
<div id="id01" class="modal">
		<form class="modal-content animate" action="index.php?module=5&action=32" name="Formrent_Asset" target="if" 
        method="post">
        <?php /*?><input  type="hidden" name="Asset_id" value="<?php echo $New_id ?>" /><?php */?>
        <input type='hidden' name='module' value= '5'>
		<input type='hidden' name='action' value= '32'>
        
    	<div id="imgcontainer">
		<span onclick="document.getElementById('id01').style.display='none' " class="closes" title="Close Modal">&times;</span>
		<img src="img/if_user_accounts.png" >
	</div>
    <div id="container" >
		<?php
			$Asset_id = $_GET['$Asset_id'];
/*			echo "<script language=\"JavaScript\">";
			echo "alert('ทดสอบค่าที่ส่งมา : ');";
			echo "</script>";*/
		?>
        <P>No : <input type="text" name="Rent_id" disabled="disabled"/></P>
		<P>รหัสสินทรัพย์ : <input type="text" name="Rent_asset"  value="<?php echo $Asset_id ?>"/></P>
        <P>รหัสพนักงาน : <input type="text" name="Rent_emp" required></P>
        <P>จุดใช้งาน : <input type="text" name="Rent_active">
        <P>วันที่ยืม : <input type="date" name="Rent_time" /></P>
        <P>จุดใช้งาน : <select name="Rent_active">
        	<?php /*?><?php
				  $result = mysqli_query($con,"SELECT Active_id,Active_name FROM active_point")
				  or die ("mysql error=>>".mysql_error($con));
				  while(list($Active_id,$Active_name)=mysqli_fetch_row($result)){
					  $select = $Active_id == $Active_name? "selected":"";
				  echo "<option value=$Active_id>$Active_name</option>";
				  }
				  
				  mysqli_free_result($result);
				  mysqli_close($con);
				?><?php */?>
        </select></P>
    </div>
    <div id="container" style="background-color:#f1f1f1">
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
// Get the modal

var modal = document.getElementById('id01');
// When the user clicks anywhere outside of the modal, close it
window.onclick = function(event) {
    if (event.target == modal) {
        modal.style.display = "none";
    }
}
</script>
<p id='middlecenter'><a href="index.php">กลับหน้า Index</a></p>
</body>
</html>