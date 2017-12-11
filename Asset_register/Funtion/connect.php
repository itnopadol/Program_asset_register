<?php
/*function connect_db(){
	$con = mysqli_connect("localhost","cistrain_bigza","bigmanmx2004","nopadol"); 
	//mysqli_connect("","ชื่อเข้าใช้","รหัส","ชื่อฐานข้อมูล")
	$select = mysqli_query($con,"SELECE * FROM asset");
	$asset = mysqli_fetch_array($select); 
	//mysqli_fetch_row();
	mysqli_set_charset($con,"utf8"); //เพื่อให้รองรับภาษาไทย
	return $con;
}*/
try{
	$con = mysqli_connect("localhost","cistrain_bigza","bigmanmx2004","nopadol"); 
	$select = mysqli_query($con,"SELECE * FROM asset");
	$asset = $select->fetchAll();
}
catch(Exception $e){
		echo "Can not connect to database";
		throw new Exception($e);
}
?>