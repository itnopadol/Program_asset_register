<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>ฟอร์มแก้ไขข้อมูลสินทรัพย์</title>
</head>

<body>
<?php
	include("../function/db_function.php");
	$con=connect_db();
	 
	$result=mysqli_query($con,"SELECT * FROM asset WHERE 
	Asset_id='$_GET[Asset_id]'")  or die("SQL Error=>".mysqli_error($con));

	list($Asset_id,$Asset_code ,$Asset_serial ,$Asset_name ,$mac_address,$computer_name
	,$brand,$Asset_receivr_amout ,$Asset_date ,$Asset_company ,$Asset_price,$Asset_barcode
	,$Category_id ,$Asset_photo ,$Asset_time,$detail)=mysqli_fetch_row($result);
?>

<h1>ฟอร์มแก้ไขข้อมูลสินทรัพย์</h1>
<form action="update.php" method="post">

<p> Barcode: <input type="text"  name="Asset_barcode"  value="<?php echo $Asset_barcode ?>"></p>
<p>เลขทะเบียนสินทรัพย์  : <input type="text" name="Asset_code" size=20 value="<?php echo $Asset_code ?>"></p>
<p>Serial Number  : <input type="text" name="Asset_serial" size=20 value="<?php echo $Asset_serial?>"></p>
<p>ชื่อสินทรัพย์ : <input type="text" name="Asset_name" size=20 value="<?php echo $Asset_name ?>"></p>
<p>Mac Address : <input type="text" name="mac_address" size=20 value="<?php echo $mac_address?>"></p>
<p>Computer name : <input type="text" name="computer_name" size=20 value="<?php echo $computer_name ?>"></p>
<p>รุ่น/ยี่ห้อ : <input type="text" name="brand" value="<?php echo $brand ?>"></p>
<p>จำนวน  : <input type="text" name="Asset_receivr_amout" size=20 value="<?php echo $Asset_receivr_amout ?>"></p>
<p>วันที่ซื้อ : <input type="date" name="Asset_date" size=20 value="<?php echo $Asset_date ?>"></p>
<p>ซื้อจาก : <input type="text" name="Asset_company" size=30 value="<?php echo $Asset_company ?>"></p>
<p>ราคา : <input type="text" name="Asset_price" size=20 value="<?php echo $Asset_price ?>"></p>
<p>รูปภาพ : <input type="file" name="Asset_photo" id="button3" value="<?php echo $Asset_photo ?>"></p>

<?php
if ($Category_id == "เมนบอร์ด") { 
	$chk1 = "checked";$chk2 = "";$chk3 = "";$chk4 = "";$chk5 = "";$chk6 = "";
} else if ($Category_id == "ซีพียู") {
	$chk2 = "checked";$chk1 = "";$chk3 = "";$chk4 = "";$chk5 = "";$chk6 = "";
} else if ($Category_id == "ฮาร์ดดิสก์") {
	$chk3 = "checked";$chk2 = "";$chk1 = "";$chk4 = "";$chk5 = "";$chk6 = "";
} else if ($Category_id == "จอภาพ") {
	$chk4 = "checked";$chk2 = "";$chk3 = "";$chk1 = "";$chk5 = "";$chk6 = "";
} else if ($Category_id == "หน่วยความจำ") {
	$chk5 = "checked";$chk2 = "";$chk3 = "";$chk4 = "";$chk1 = "";$chk6 = "";
} else  {
	$chk6 = "checked";$chk2 = "";$chk3 = "";$chk4 = "";$chk5 = "";$chk1 = "";
}
?>
<p>ชื่อประเภท : <select name="$Category_id">
	<option value="เมนบอร์ด" <?php echo $chk1 ?>>เมนบอร์ด</option>
	<option value="ซีพียู" <?php echo $chk2 ?>>ซีพียู</option>
	<option value="ฮาร์ดดิสก์" <?php echo $chk3 ?>>ฮาร์ดดิสก์</option>
	<option value="จอภาพ" <?php echo $chk4 ?>>จอภาพ</option>
	<option value="หน่วยความจำ" <?php echo $chk5 ?>>หน่วยความจำ</option>
	<option value="อุปกรณ์ต่อพ่วง" <?php echo $chk6 ?>>อุปกรณ์ต่อพ่วง</option>
	</select></p>
    <p>รายละเอียด : <textarea name="	detail"  cols="30" rows="10"><?php echo $detail?></textarea></p><hr>
<input type="submit" name="button" id="button" value="บันทึก">
<input type="reset" name="button2" id="button2" value="ยกเลิก">
</body>
</html>