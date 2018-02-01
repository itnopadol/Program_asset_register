<?php
session_start();
include("../../function/db_function.php");
	$con=connect_db();

session_destroy();
echo "<script>alert('บันทึกข้อมูลเรียบร้อยแล้ว')</script>";
echo "<script>window.location='index_sp.php'</script>";

?>