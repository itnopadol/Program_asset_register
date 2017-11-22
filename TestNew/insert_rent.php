<?php 
	include("../function/db_function.php");
	$con=connect_db();
	
	$sql="INSERT INTO rent (rent_id,name,brand,price,stock,acquire,paying,balance) 
	VALUES ('','$_POST[name]'
	,'$_POST[brand]'
	,'$_POST[price]'
	,'$_POST[stock]'
	,'$_POST[acquire]',' ',' ')";
	mysqli_query($con, $sql) or die(mysqli_error($con));

mysqli_close($con);
echo "<script>window.location='list_rent.php'</script>";
?>