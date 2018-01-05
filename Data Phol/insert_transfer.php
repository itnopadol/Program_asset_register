<?php 
require('connect_db.php');
$order_id=$_POST['id'];
$trans_date=$_POST['transfer_date'];
$trans_time=$_POST['h'].":".$_POST['m'].":".$_POST['s'];
$transfer_date="$trans_date $trans_time";

if(!empty($_FILES['transfer_slip']['name'])){
	$slip_file=$_FILES['transfer_slip']['name'];
	$slip_tmp=$_FILES['transfer_slip']['tmp_name'];
	copy($slip_tmp,"slips/$slip_file");
	}else{
		$slip_file="";
	}
	$sql1="INSERT INTO transfer VALUES ('$order_id','$transfer_date','$_POST[bank]','$slip_file','$_POST[total_paid]')";
	mysql_query($sql1)or die(mysql_error());
	
	$sql2="UPDATE list_orders SET order_status=2 WHERE order_id='$order_id'";
	mysql_query($sql2)or die(mysql_error());

echo "<script language='javascript'>window.location='order_list.php'</script>";
?>