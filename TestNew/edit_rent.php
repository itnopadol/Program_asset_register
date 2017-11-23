<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>ฟอร์มแก้ไขรายการวัสดุ-อุปกรณ์</title>
</head>

<body>
<?php
	//include("../../Funtion/funtion.php");
	$con=connect_db();
	 
	$result=mysqli_query($con,"SELECT * FROM rent WHERE 
	rent_id='$_GET[rent_id]'")  or die("SQL Error=>".mysqli_error($con));

	list($rent_id,$name,$brand,$price,$stock) = mysqli_fetch_row($result);
?>

<h1>ฟอร์มแก้ไขรายการวัสดุ-อุปกรณ์</h1>
<form action="index.php?module=5&action=33" method="post" enctype="multipart/form-data">
<input type="hidden" name="Old_id" value= "<?php echo $rent_id ?>">
<p>รหัสวัสดุ : <input type="text" name="rent_id" disabled="disabled"  value="<?php echo $rent_id ?>"></p>
<p>รายการ : <input type="text" name="name" size=30 value="<?php echo $name ?>"></p>
<p>รุ่น/ยี่ห้อ : <input type="text" name="brand" size=30 value="<?php echo $brand ?>"></p>
<p>ราคา :  <input type="text" name="price" value="<?php echo $price ?>"></p>
<p>Stock :  <input type="text" name="stock" value="<?php echo $stock ?>"></p><hr>

<input type="submit" name="button" id="button" value="ตกลง">
<input type="reset" name="button2" id="button2" value="ยกเลิก">
</body>
</html>