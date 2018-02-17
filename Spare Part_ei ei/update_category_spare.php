<?php
include("../function/db_function.php");
	$con=connect_db();
	
	$result="UPDATE category_spare SET  Category_name = '$_POST[Category_name] WHERE     Category_id = '$_POST[Category_id]'";
	
	echo $result;
	
mysqli_query($con,	$result);
mysqli_close($con);
echo "<script>alert('แก้ไขข้อมูลเรียบร้อยแล้ว')</script>";
echo "<script>window.location='list_category_spare.php'</script>";
?>
