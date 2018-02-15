<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>ฟอร์มแก้ไขหมวดหมู่สินทรัพย์</title>
</head>

<body>
<?php
	include("../function/db_function.php");
	$con=connect_db();
	 
	$result=mysqli_query($con,"SELECT * FROM category WHERE 
	Category_id='$_GET[Category_id]'")  or die("SQL Error=>".mysqli_error($con));

	list($Category_id,$Category_name)=mysqli_fetch_row($result);
?>

<h1>ฟอร์มแก้ไขหมวดหมู่สินทรัพย์</h1>
<form action="update_category.php" method="post">

<p> รหัสหมวดหมู่: <input type="text"   disabled="disabled" name="Category_id"  value="<?php echo $Category_id ?>"></p>
<p>ชื่อหมวดหมู่สินทรัพย์ : <input type="text" name="Category_name" size=20 value="<?php echo $Category_name ?>"></p>

<input type="submit" name="button" id="button" value="บันทึก">
<input type="reset" name="button2" id="button2" value="ยกเลิก">
</body>
</html>