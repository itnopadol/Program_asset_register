<?php 
	include("../function/db_function.php");
	$con=connect_db();
	
	$sql="INSERT INTO spare_part (id,photo,name,brand,price,category,stock,acquire,balance,time) 
	VALUES (' ','$_POST[photo]'
	,'$_POST[name]'
	,'$_POST[brand]'
	,'$_POST[price]'
	,'$_POST[category]'
	,'$_POST[stock]'
	,'$_POST[acquire]',' ',' ')";
	mysqli_query($con, $sql) or die(mysqli_error($con));

mysqli_close($con);
echo "<script>window.location='list_spare.php'</script>";
?>