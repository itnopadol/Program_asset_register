<?php
	include("../function/db_function.php");//include ไฟล์ที่เขียนฟังก์ชั่นไว้ใช้งาน
	$con=connect_db(); //เลือกใช้คำสั่งในการติดต่อฐานข้อมูล
?>
<h2 align="center">เพิ่มข้อมูลหมวดหมู่สินทรัพย์</h2>
<form action="add_category.php" method="POST">
<p align="center"> ชื่อหมวดหมู่สินทรัพย์ : <input type="text" name="Category_name"  value="" size="30" required> 
<input type="submit" name="insert"  value="เพิ่มข้อมูล" id="input1"/> 
<input type="reset" name="reset"  value="ยกเลิก" id="input2"/></p>
</form>
<hr>
	
<?php
	
	if(!empty($_POST['Category_name'])){
	$sql1= "INSERT INTO category (Category_id,Category_name) VALUES('$_POST[Category_name]')"; 
 //echo $sql1;
 mysqli_query($con,$sql1) or die ("error1==>".mysqli_error($con));
	 }
	
	$result=mysqli_query($con,"SELECT Category_id,Category_name FROM category") or die ("SQL ERROR =>" .mysqli_error()); //select ตารางหลักสูตร
	$rows=mysqli_num_rows($result); // นับจำนวนแถว
	echo "<h2 align='center'>ตารางแสดงรายชื่อหมวดหมู่ของสินทรัพย์</h2>";
	echo "<table border=1 width=400px align=center>";
			echo "<tr><th>รหัสหมวดหมู่</th><th>ชื่อหลักสูตร</th><th>แก้ไข</th><th>ลบ</th></tr>";
	while(list($id,$title)=mysqli_fetch_row($result)){
		echo "<tr><td align='center'>$id</td><td align='center'>$title</td><td  align='center'><img src='../img/if_pencil_10550.png'  width='30'  height='30'></td><td  align='center'><img src='../img/cancel.png'  width='30'  height='30'></td</tr>";
	}
	echo"</table>";
	mysqli_free_result($result);
	mysqli_close($con);
	
?>
<p align="center"><a href="menu.php">กลับหน้า Index</a>