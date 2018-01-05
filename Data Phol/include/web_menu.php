<?php
function web_menu($type){
	switch($type){
		case 1 : owner_menu();break;
		case 2 : admin_menu();break;
		case 3 : member_menu();break;
		default: user_menu();
	}
	
}
//==============================================================================
function owner_menu(){
	echo "<h3>Owner Menu</h3>";	
	echo "<ul class='nav nav-pills nav-stacked'>";
	echo  "<li class='active'><a href='index.php'>Home</a></li>";
	echo "<li><a href='index.php?module=report&action=sell_month'>รายงานยอดขายประจำเดือน</a></li>";
	echo "<li><a href='index.php?module=report&action=top_sell'>รายงานหนังสือขายดี</a></li>";
	echo "<li><a href='index.php?module=report&action=top_like'>รายงานหนังสือยอดนิยม</a></li>";
	echo "<li><a href='index.php?module=user&action=log_out'>ออกจากระบบ</a></li>";
	echo "</ul>";
}
//========================================================================================
function admin_menu(){
	echo "<h3>Admin Menu</h3>";	
	echo "<ul class='nav nav-pills nav-stacked'>";
	echo  "<li class='active'><a href='index.php'>Home</a></li>";
	echo "<li><a href='index.php?module=user&action=manage_user'>จัดการผู้ใช้</a></li>";
	echo "<li><a href='index.php?module=books&action=book_form'>เพิ่มหนังสือ</a></li>";
	echo "<li><a href='index.php?module=books&action=manage_book'>จัดการหนังสือ</a></li>";
	echo "<li><a href='index.php?module=order&action=list_order_admin'>จัดการรายการสั่งซื้อ</a></li>";
	echo "<li><a href='index.php?module=user&action=log_out'>ออกจากระบบ</a></li>";
	echo "</ul>";
}
//========================================================================================
function member_menu(){
	echo "<h3>Member Menu</h3>";	
	echo "<ul class='nav nav-pills nav-stacked'>";
	echo  "<li class='active'><a href='index.php'>Home</a></li>";
	echo "<li><a href='index.php?module=user&action=edit_user'>แก้ไขข้อมูลส่วนตัว</a></li>";
	echo "<li><a href='index.php?module=books&action=list_book'>ดูข้อมูลหนังสือ</a></li>";
	echo "<li><a href='index.php?module=order&action=list_order'>รายการสั่งซื้อ</a></li>";
	echo "<li><a href='index.php?module=user&action=log_out'>ออกจากระบบ</a></li>";
	echo "</ul>";
}
//========================================================================================
function user_menu(){
	echo "<h3>User Menu</h3>";	
	echo "<ul class='nav nav-pills nav-stacked'>";
	echo  "<li class='active'><a href='index.php'>Home</a></li>";
	echo "<li><a href='index.php?module=books&action=list_book'>ดูข้อมูลหนังสือ</a></li>";
	echo "<li><a href='index.php?module=user&action=register'>สมัครสมาชิก</a></li>";
	echo "</ul>";
}
//========================================================================================
?>