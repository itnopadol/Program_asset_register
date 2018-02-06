<?php
session_start();
include("../../Funtion/Funtion.php");
$con = connect_db();

session_destroy();
echo "<script>window.location='index_sp.php'</script>";
?>