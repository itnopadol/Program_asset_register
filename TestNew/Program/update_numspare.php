<?php 
	include("../function/db_function.php");// include ไฟล์ที่เขียนฟังก์ชันไว้เข้ามาใช้งาน
	$con=connect_db();//เรียกใช้ฟงัก์ชั่นในการติดต่อฐานข้อมูล
	
if(empty($_FILES['photo']['name'])){//ถ้าไฟล์รูปว่าง
	$photo="";
	$update_photo = "";
}
else{
	$time=date("dmyhis");
	$sum_name=$time.("fefefefethyikeddw");
	$char=substr(str_shuffle($sum_name),0,10);//ตัดตัวอักษร
	$photo=$char."_".$_FILES['photo']['name'];
	$photo=$_FILES['photo']['name'];//ชื่อไฟล์
	$temp_file=$_FILES['photo']['tmp_name']; 
	copy($temp_file,"../img/$photo");
	$update_photo=",photo='$photo'";
	
}

	$sql="UPDATE spare_part SET acquire = '$_POST[acquire]' WHERE id= '$_POST[Newid]'";
    mysqli_query($con,$sql)or die("ERROR1".mysqli_error($con));
	
	
	$sql2="INSERT INTO take (take_id,id_inventory,take_name,take_brand,take_pice,take_category,take_acquire,take_time)
	 VALUES ('','$_POST[Newid]'
					,'$_POST[name]'
					,'$_POST[brand]'
					,'$_POST[price]'
					,'$_POST[category]'
					,'$_POST[acquire]'
					,'$_POST[time]')";
	 mysqli_query($con,$sql2)or die("ERROR2".mysqli_error($con));
	  
	echo $sql2 ;
	
	mysqli_close($con);
	echo "<script>alert('บันทึกข้อมูลเรียบร้อยแล้ว')</script>";
    echo "<script>window.location='list_spare.php'</script>";
    
?>
