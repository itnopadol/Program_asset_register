<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>ฟอร์มขอเบิกวัสดุ-อุปกรณ์</title>
</head>

<body>
<?php
	include("../function/db_function.php");
	$con=connect_db();
	
?>
<h1>ฟอร์มขอเบิกวัสดุ-อุปกรณ์</h1>
<form action="update_numspare.php" method="post" enctype="multipart/form-data">
<p>รหัสใบเบิก : <input type="text" name=" id "  disabled="disabled" value=" "></p>
<p>ชื่อผู้ขอเบิก : <input type="text" name=" "   value=" "></p>


<p>รหัสวัสดุ : <input type="text" name="id"  disabled="disabled" value=" "></p>
<p>ประเภท :  <select name="category">
  <?php  
 		$result=mysqli_query($con,"SELECT Category_id,Category_name FROM category_spare  ") or die("SQL ERROR ==>" .mysqli_error()); 
   while(list( $Category_id,$Category_name)=mysqli_fetch_row($result)){ 
	    $select=$Category_id==$Category_name?"selected":"" ;	
		echo "<option value='$Category_id' $select>$Category_name</option>";
   }
	mysqli_free_result($result);//คืนหน่วยความจำให้กับระบบ
 	mysqli_close($con);//ปิดฐานข้อมูล
	
   ?>
</select>
<p>Stock :  <input type="text" name="stock" disabled="disabled" value=" "></p>
<p>วัน/เดือน/ปี  :  <input type="date" name="time" value=" "></p><hr>
<p>รายการ : <input type="text" name="name"   size=20 value=" "></p>
<p>จำนวนที่เบิก : <input type="text" name="acquire" size=20 required></p>

<input type="submit" name="button" id="button" value="ตกลง">
<input type="reset" name="button2" id="button2" value="ยกเลิก">
</body>
</html>