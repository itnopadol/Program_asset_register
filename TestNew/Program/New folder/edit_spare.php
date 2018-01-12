<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>ฟอร์มแก้ไขรายการวัสดุ-อุปกรณ์</title>
</head>

<body>
<?php
	include("../function/db_function.php");
	$con=connect_db();
	 
	$result=mysqli_query($con,"SELECT * FROM spare_part WHERE 
	id='$_GET[id]'")  or die("SQL Error=>".mysqli_error($con));

	list($id,$photo,$name,$brand,$price,$category,$stock,$acquire,$Pay,$balance,$time) = mysqli_fetch_row($result);
	
?>

<h1>ฟอร์มแก้ไขรายการวัสดุ-อุปกรณ์</h1>
<form action="update_spare.php" method="post" enctype="multipart/form-data">
<p>รหัสวัสดุ : <input type="text" name="NewID" readonly  value="<?php echo $id ?>"></p>
<p>รูปภาพ : <input type="file" name="photo" id="button3" value="<?php echo $photo ?>"></p>
<p>รายการ : <input type="text" name="name" size=30 value="<?php echo $name ?>"></p>
<p>รุ่น/ยี่ห้อ : <input type="text" name="brand" size=30 value="<?php echo $brand ?>"></p>
<p>ประเภท : <select name="category">
  <?php 
 	  $result=mysqli_query($con,"SELECT Category_id,Category_name FROM category_spare") or die("SQL ERROR ==>" .mysqli_error()); 
   while(list( $Category_id,$Category_name)=mysqli_fetch_row($result)){ 
	    $select=$Category_id==$category?"selected":"" ;	
		echo "<option value=' $Category_id' $select>$Category_name</option>";
   }
	mysqli_free_result($result);//คืนหน่วยความจำให้กับระบบ
 	mysqli_close($con);//ปิดฐานข้อมูล
	
   ?>
   </select>
<p>ราคา :  <input type="text" name="price" value="<?php echo $price ?>"></p>
<p> ยอดยกมา :  <input type="text" name="stock" value="<?php echo $stock ?>"></p>
<p>วัน/เดือน/ปี  :  <input type="text" name="time" disabled="disabled" value="<?php echo $time ?>"></p><hr>


<input type="submit" name="button" id="button" value="ตกลง">
<input type="reset" name="button2" id="button2" value="ยกเลิก">
</body>
</html>