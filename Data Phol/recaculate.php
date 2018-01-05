<?php
session_start();
if($_POST['button']=="กลับไปเลือกสินค้า"){
echo "<script language='javascript'>window.location='list_book.php'</script>";
}
elseif($_POST['button']=="ยกเลิกสินค้า"){
if(!empty($_POST['cancel_id'])){////ถ้ามีการเลือก checkbox
$cancel_id=$_POST['cancel_id'];
$cnt=count($_SESSION['sbook_id']);
$tbook_id=array();
$tbook_title=array();
$tbook_sprice=array();
$tbook_amount=array();
for($i=0;$i<$cnt;$i++){
if(!in_array($_SESSION['sbook_id'][$i],$cancel_id)){
$tbook_id[]=$_SESSION['sbook_id'][$i];
$tbook_title[]=$_SESSION['sbook_title'][$i];
$tbook_sprice[]=$_SESSION['sbook_sprice'][$i];
$tbook_amount[]=$_SESSION['sbook_amount'][$i];
}
}
$_SESSION['sbook_id']=$tbook_id;
$_SESSION['sbook_title']=$tbook_title;
$_SESSION['sbook_sprice']=$tbook_sprice;
$_SESSION['sbook_amount']=$tbook_amount;
}
echo "<script language='javascript'>window.location='show_cart.php'</script>";
}elseif($_POST['button']=="คำนวนราคาใหม่"){
$_SESSION['sbook_amount']=$_POST['book_amount'];
echo "<script language='javascript'>window.location='show_cart.php'</script>";
}
if($_POST['button']=="ยืนยันการสั่งซื้อ"){
require('connect_db.php');
$order_date=date("Y-m-d");
$total_price=$_POST['total_paid'];
$sql1="INSERT INTO list_orders VALUES('','$order_date','$_SESSION[login_name]','','$total_price','')";
mysql_query($sql1)or die(mysql_error());

$sbook_id=$_SESSION['sbook_id'];
$sbook_amount=$_SESSION['sbook_amount'];
$sbook_title=$_SESSION['sbook_title'];
$sbook_sprice=$_SESSION['sbook_sprice'];
$sql2="INSERT INTO order_detail VALUES((SELECT MAX(order_id) FROM list_orders),'$sbook_id[0]','$sbook_amount[0]')";
$cnt=count($_SESSION['sbook_id']);
if($cnt>1){
for($i=1;$i<$cnt;$i++){
$sql2.=",((SELECT MAX(order_id) FROM list_orders),'$sbook_id[$i]','$sbook_amount[$i]')";
}
}
mysql_query($sql2)or die(mysql_error());
mysql_close();
echo "<script language='javascript'>window.location='transfer_form.php'</script>";
}
?>