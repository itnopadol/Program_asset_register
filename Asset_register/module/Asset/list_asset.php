<?php
	//include("../../Funtion/funtion.php");
	$con = connect_db();
?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
<title>จัดการสินทรัพย์</title>
<link href="../../CSS/list_asset.css" rel="stylesheet" type="text/css">
<link href="../../CSS/bootstrap.min.css" rel="stylesheet">
<STYLE>
A:link { color: rgb(54, 42, 68); text-decoration:none}
A:visited {color: #091da6; text-decoration: none}
A:hover {color: rgb(232, 76, 26)}
</STYLE>
</head>
<style type="text/css">
table tr th{
	background:#337ab7;
	color:white;
	text-align:left;
	vertical-align:center;
}
#titletablelist{
	border-radius: 5px;
	box-shadow: 0 6px 8px 0 rgba(0,0,0,0.24), 0 10px 30px 0 rgba(0,0,0,0.19);
}
#titletablelist2{
	box-shadow: 0 6px 8px 0 rgba(0,0,0,0.24), 0 10px 30px 0 rgba(0,0,0,0.19);
}
</style>
<body id="makebody" style="background-color:#EBEBEB">
<div class="">
<h1 id="middlecenter">จัดการสินทรัพย์</h1>
<div class="container">
<form method ="post"  align='center'>
	<input type ="search" name='keyword' size="50"> <input type="submit" value="ค้นหา">
</form>
</div>
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
		OR Asset_Category LIKE '%$keyword%' OR Asset_serial) ORDER BY Asset_id LIMIT 13 ")
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
	while(list($Asset_id,$Asset_code ,$Asset_serial ,$Asset_name ,$mac_address,$computer_name
		,$brand,$Asset_date ,$Asset_company ,$Asset_price,$Asset_barcode
		,$Asset_Category ,$Asset_photo ,$Asset_time,$detail) = mysqli_fetch_row($result)){

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
	<script src="../../js/jquery.min.js"></script>
    <script src="../../JS/bootstrap.min.js"></script>
<p id="middlecenter"><a href="index.php">กลับหน้า Index</a> || <a href="index.php?module=2&action=6">เพิ่มข้อมูลสินทรัพย์</a>
</p>
</body>
</html>
