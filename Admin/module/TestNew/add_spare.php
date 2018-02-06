<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>เพิ่มรายการ</title>
</head>
<body>
<?php 
	include("../function/db_function.php");// include ไฟล์ที่เขียนฟังก์ชันไว้เข้ามาใช้งาน
	$con=connect_db();//เรียกใช้ฟงัก์ชั่นในการติดต่อฐานข้อมูล
?>
<h2>ฟอร์มเพิ่มรายการ</h2>
<form method="post" action="insert_spare.php">
<p>รหัสวัสดุ: <input type="text" name="id" disabled="disabled" size=20 required></p>
<p>รูปภาพ: <input type="file" name="photo" id="button3" value=""></p>
<p>รายการ: <input type="text" name="name" size=20 required></p>
<p>รุ่น / ยี่ห้อ : <input type="text" name="brand" size=20 required></p>
<p>ราคา: <input type="text" name="price" size=20 required></p>
<p>ประเภท : <select name="category">
  <?php  
 
	$result=mysqli_query($con,"SELECT Category_id,Category_name FROM  category_spare") 
	or die("SQL ERROR ==>" .mysqli_error()); 
   while(list( $Category_id,$Category_name)=mysqli_fetch_row($result)){
	echo "<option value=$Category_id>$Category_name</option>";
   }
	mysqli_free_result($result);//คืนหน่วยความจำให้กับระบบ
 	mysqli_close($con);//ปิดฐานข้อมูล
	
   ?>
</select>


<p>Stock: <input type="text" name="stock" size=20 required></p>
<p>วันที่ซื้อ : <input type="date" name="time" size=20 required></p>
<hr>
<input type="submit" name="button" id="button" value="เพิ่มข้อมูล">
<input type="reset" name="button2" id="button2" value="ยกเลิก">
</form>
</body>
</html>