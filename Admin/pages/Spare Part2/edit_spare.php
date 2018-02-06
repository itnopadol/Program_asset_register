<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>ฟอร์มแก้ไขรายการวัสดุ-อุปกรณ์</title>
</head>
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
	 width: 25%;
    border-radius: 5px;
    background-color: #f2f2f2;
    padding: 20px;

}
.head {
	width: 25%;
    border-radius: 5px;
    background-color: #ffedc6;
    padding: 20px;

}
</style>
 
<body>
<?php
	include("../function/db_function.php");
	$con=connect_db();
	 
	$result=mysqli_query($con,"SELECT * FROM spare_part WHERE 
	id='$_GET[id]'")  or die("SQL Error=>".mysqli_error($con));

	list($id,$photo,$name,$brand,$price,$category,$stock,$acquire,$Pay,$balance,$time) = mysqli_fetch_row($result);
	$stock = $acquire + $stock;
?>
<div align="center">
<h3 align="center" class="head">ฟอร์มแก้ไขรายการวัสดุ-อุปกรณ์</h3>

<div align="center" class="div3">
 <form action="update_spare.php" method="post" enctype="multipart/form-data">
  
    <label for="fname">รหัสวัสดุ : </label>
    <input type="text" name="NewID" readonly  value="<?php echo $id ?>" ><p>

    <label for="lname">รูปภาพ : </label>
    <input type="file" name="photo" id="button3" value="<?php echo $photo ?>" ><p>
    
    <label for="lname">รายการ : </label>
    <input type="text" name="name" size=30 value="<?php echo $name ?>"><p>
    
    <label for="lname">รุ่น / ยี่ห้อ : </label>
    <input type="text" name="brand" size=30 value="<?php echo $brand ?>"><p>

    <p>ประเภท : <select name="category" class="textbox">
  <?php 
 	  $result=mysqli_query($con,"SELECT Category_id,Category_name FROM category_spare") or die("SQL ERROR ==>" .mysqli_error()); 
   while(list( $Category_id,$Category_name)=mysqli_fetch_row($result)){ 
	    $select=$Category_id==$category?"selected":"" ;	
		echo "<option value=' $Category_id' $select>$Category_name</option>";
   }
	mysqli_free_result($result);//คืนหน่วยความจำให้กับระบบ
 	mysqli_close($con);//ปิดฐานข้อมูล
	
   ?>
   </select><p>
    
     <label for="lname">ราคา : </label>
    <input type="text" name="price" value="<?php echo $price ?>"></p>
    
     <label for="lname">Stock: </label>
    <input type="text" name="stock" value="<?php echo $stock ?>"></p>
    
    <label for="lname">วัน/เดือน/ปี : </label>
    <input type="date" name="time" value="<?php echo date("Y-m-d"); ?>" readonly></p>
  
    <input type="submit" value="ตกลง">
    <input type="reset" value="ยกเลิก">
  </form>
</div>
</div>
</body>
</html>




