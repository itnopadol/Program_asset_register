<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Untitled Document</title>
</head>

<body>
<?php
	include("../../Funtion/funtion.php");
	$con=connect_db();
	//$asset_id = $_GET['id'];
	$Status_name = "";
	$result=mysqli_query($con,"SELECT Status_id,Status_name FROM status ") 
	or die ("mysql error=>>".mysql_error($con));
	while(list($Status_id,$Status_name)=mysqli_fetch_row($result)){
				$select = $Status_id == $Status_name? "selected":"";
	}
	$sql = "UPDATE asset SET
	Asset_status = '$_POST[Status_name]'
	WHERE Asset_id = 0004 ";
	
	mysqli_query($con,$sql)or die (mysqli_error($con));
	mysqli_close($con);
	/*echo "<script>alert('แก้ไขข้อมูลเรียบร้อยแล้ว')</script>";
	echo "<script>window.location='list_status.php'</script>";*/
	echo "<script>window.location='Status.php'</script>";
?>
</body>
</html>