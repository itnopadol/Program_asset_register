<?php
	//include("../../Funtion/funtion.php");//include ไฟล์ที่เขียนฟังก์ชั่นไว้ใช้งาน
	$con=connect_db(); //เลือกใช้คำสั่งในการติดต่อฐานข้อมูล
?>
<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
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

	$result2 = mysqli_query($con,"SELECT Status_id,Status_name FROM status")
	or die ("mysql error=>>".mysql_error($con));
		echo "<tr>";
		/*echo "<td><input type='checkbox' name='As_id[]' id = 'As_id' value='$Asset_id'></td>";	*/
		echo "<td align='center' id='titletable3'>$Asset_id</td>";
		echo "<td align='center' id='titletable3'>$Asset_code</td>";
		echo "<td align='center' id='titletable3'>$Asset_serial</td>";
		echo "<td align='center' id='titletable3'><a href='index.php?module=6&action=24&id=$Asset_id'>$Asset_name</a></td>";
		echo "<td align='center' id='titletable3'>$brand</td>";
		/*----------------------------^------------------------------------*/
		echo "<td align='center' id='titletable3'>";
		echo "<form action=\"index.php\">";
		echo "<input type='hidden' name='Asset_id' value= '$Asset_id'> ";
		echo "<input type='hidden' name='module' value= '6'> "; 
		echo "<input type='hidden' name='action' value= '20'> ";
		echo "<select name='Asset_status' id='titletable2' class='custom-select-sm'>";
		while(list($Status_id,$Status_name)=mysqli_fetch_row($result2)){
			if($Status_id == $Asset_status){
				$select = "selected='selected=selected'";
			}
			else{
				$select = "";
			}
			echo "<option value='$Status_id'$select>$Status_name</option>";
		}
		echo "</select>&nbsp;&nbsp;";
		switch($Asset_status){
			case "04" : echo "<button type='submit' name='update' id='' value='บันทึก' 
			class='btn btn-primary btn-sm' disabled>บันทึก</button></form></td>"; break;
			default : echo "<button type='submit' name='update' id='' value='บันทึก' class='btn btn-primary btn-sm'>บันทึก
			</button></form></td>"; break;
		}
		/*----------------------------v------------------------------------*/
		echo "<td align='center' id='titletable'>$active_point</td>";
		/*----------------------------^------------------------------------*/
		echo "<form action=\"index.php\" method='post'>";
		echo "<td>";
		switch($Asset_status){
			case "01" : echo "<img src='img/box.png' width='40' height='40'onClick=\"openModal('".$Asset_id."', '".$Asset_code."')\" title='ทำรายการเบิก'>"; break;
			case "02" : echo "<img src='img/02.png' width='40' height='40' title='สินทรัพย์เสีย'>"; break;
			case "03" : echo "<img src='img/03.png' width='40' height='40' title='รอการซ่อมแซม'>"; break;	
			case "04" : echo "<img src='img/04.png' width='40' height='40' title='รายการถูกเบิก'>"; break;	
			default : echo "Error Test $Asset_status"; break;
		}
		echo "</td>";
		echo "</form>";
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
    echo "<li>";
	echo "<span aria-hidden=\"true\">&raquo;</span>";
	//echo "</a>";
    echo "</li>";
	echo "</ul>";
	echo "</nav>";
	echo "</div>";
	}
?>
</div>

<div class="modal" tabindex="-1" role="dialog" id="id01">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-body">
      <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
        <form class="modal-content animate" action="index.php?module=5&action=32" method="post" name="FormRent" >
        	<center><div style="width: 128px; height:128px; text-align:center;">
             	<img src="img/packing.png" style="width: 100%;">
             </div></center>
             <input type="hidden" name="Rent_id" >
				<P><center>No : <input type="text" name="id_asset" id="id_asset" readonly ></center></P>
				<P><center>รหัสสินทรัพย์ : <input type="text" name="Rent_asset" id="Rent_assets" readonly></center></P>
				<P><center>รหัสพนักงาน : <input type="text" name="Rent_emp" required></center></P>
				<P><center>จุดใช้งาน : <select name="Rent_active">
                            <?php 
                                  $result=mysqli_query($con,"SELECT Active_id,Active_name FROM active_point") 
									  or die ("mysql error=>>".mysql_error($con));
									  while(list( $Active_id,$Active_name)=mysqli_fetch_row($result)){
										  $select = $Active_id == $Active_name? "selected":"";
									  echo "<option value=$Active_id>$Active_name</option>";  
									  }
									  
									  mysqli_free_result($result);
									  mysqli_close($con);
                                ?>
                    </P></center></select>
				<P><center>วันที่ยืม : <input type="date" name="Rent_time" required></center></P>
				<P><center>*หมายเหตุ : <textarea name="Rent_ect" ></textarea></center></P>
				
		<div class="modal-footer">
			<button type="button" class="btn btn-secondary btn-lg" data-dismiss="modal" style="size:100%;">Close</button>
			<button type="submit" class="btn btn-primary btn-lg">Save changes</button>  
		</div>
        </form>
     
      </div>
    </div>
  </div>
</div>
</div> 
<script>
	function openModal(Asset_id, Asset_code){
		$('#id01').modal('show');
		document.getElementById('id_asset').value = Asset_id;
		document.getElementById('Rent_assets').value = Asset_code;
		//document.getElementsByName('Rent_assets')[0].value = asset_code;
}
</script>
	<script src="../../js/jquery.min.js"></script>
    <script src="../../JS/bootstrap.min.js"></script>   
</body>
</html>