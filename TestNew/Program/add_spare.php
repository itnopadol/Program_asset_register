<!doctype html>
<html>
<meta charset="utf-8">
<head>
<style>
input[type=text], select {
    width: 60%;
    padding: 10px 10px;
    margin: 2px 0;
    display: inline-block;
    border: 1px solid #ccc;
    border-radius: 6px;
    box-sizing: border-box;
}

input[type=submit] {
	align :center:
    width: 20%;
    background-color: #45a049;
    color: white;
    padding: 14px 20px;
    margin: 8px 0;
    border: none;
    border-radius: 4px;
    cursor: pointer;
}
input[type=reset] {
	align :center:
    width: 20%;
    background-color: #e02850;
    color: white;
    padding: 14px 20px;
    margin: 8px 0;
    border: none;
    border-radius: 4px;
    cursor: pointer;
}

input[type=submit]:hover {
    background-color: #45a049;
}

.div3 {
	 width: 30%;
    border-radius: 5px;
    background-color: #f2f2f2;
    padding: 15px;

}
.head {
	width: 30%;
    border-radius: 6px;
    background-color:#67beea;
    padding: 15px;

}
</style>
<title>เพิ่มรายการ</title>
</head>
<body>
<?php 
	include("../function/db_function.php");// include ไฟล์ที่เขียนฟังก์ชันไว้เข้ามาใช้งาน
	$con=connect_db();//เรียกใช้ฟงัก์ชั่นในการติดต่อฐานข้อมูล
?>
<div align="center">
<h3 align="center" class="head">ฟอร์มเพิ่มรายการ</h3>
<div align="center" class="div3">
<form method="post" action="insert_spare.php">
<p>รหัสวัสดุ: <input type="text" name="id" disabled="disabled" size=20 required></p>
<p>รูปภาพ: <input type="file" name="photo" id="button3" value="" ></p>
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






