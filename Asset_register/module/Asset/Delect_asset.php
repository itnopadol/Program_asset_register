<?php 
	//include("../../Funtion/funtion.php");
	$con = connect_db(); //เรียกไฟล์
	//$Asset_id = $_GET['id'];
	
	$result = mysqli_query($con, "SELECT * FROM asset WHERE Asset_id ='$_GET[Asset_id]' ") 
	or die(mysqli_error($con));
	list($Asset_id) = mysqli_fetch_row($result);

		$sql = "UPDATE asset SET Asset_log = 0 WHERE Asset_id ='$_GET[Asset_id]' ";
		mysqli_query($con, $sql) or die("Error Delete" . mysqli_error($con));

		echo "<script>alert('ลบข้อมูลเรียบร้อยแล้ว')</script>";
		echo "<script>window.location='index.php?module=2&action=22'</script>";

		mysqli_close($con);
?>