<?php
session_start();
require("connect_db.php");
echo "<meta charset='utf-8' />";
$user_form=$_POST['username'];
$pwd_form=$_POST['passwd'];
if(empty($user_form)or empty($pwd_form)){
	echo "กรุณากลับไปกรอก username และ password ให้ครบ <a href='login_form.php'> Login</a>";
	}else{
		
	
//ดึงค่าจากฐานข้อมูล
	$ur="SELECT username,passwd,type FROM users WHERE username='$user_form' and passwd='$pwd_form'";
	//echo "$ur";
	$result=mysql_query($ur) or die(mysql_error());
	list($user_db,$pwd_db,$type_db)=mysql_fetch_row($result);
//select ข้อมูลจากตาราง user ที่ username และ password ตรงกับข้อมูลที่กรอกส่งมาจากฟอร์ม

if($user_form=$user_db and $pwd_form=$pwd_db){
	$_SESSION['login_result']="pass";
	$_SESSION['login_name']=$user_db;
	$_SESSION['login_type']=$type_db;
	if($type_db==1){
		echo "<script language='javascript'>window.location='list_book.php'</script>";
	}else if($type_db==2){
		echo "<script language='javascript'>window.location='manage_book.php'</script>";
	}else if($type_db==3){
		echo "<script language='javascript'>window.location='list_book.php'</script>";
	}else{
		echo "<script language='javascript'>window.location='login_form.php'</script>";
		}
}
	else{	
		echo "username และ password ไม่ถูก!! กรุณากลับไปกรอกใหม่   <a href='login_form.php'> Login</a>";
	$_SESSION['login_result']="fail";
		}
	}
?>