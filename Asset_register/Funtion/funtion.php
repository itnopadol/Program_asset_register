<?php
function connect_db(){
	$con = mysqli_connect("localhost","cistrain_bigza","bigmanmx2004","nopadol"); 
	//mysqli_connect("","ชื่อเข้าใช้","รหัส","ชื่อฐานข้อมูล")
	$asseter = mysqli_query($con,"SELECE * FROM asset");
	//$asseter = mysqli_fetch_assoc($qury);
	mysqli_set_charset($con,"utf8"); //เพื่อให้รองรับภาษาไทย
	return $con;

}
function select_menu($level){
	switch($level){
		case "Admin" : admin_menu();break;
		case "Student" : student_menu();break;
		case "Teacher" : teacher_menu();break;
}
}
function admin_menu(){
	echo "<nav class='menu' tabindex='0'>
			<div class='smartphone-menu-trigger'></div>
    	<header class='avatar'>
			<img src='img/if_supportmale_403020.png' />
            <h2>Admin IT</h2>
  		</header>
			<ul> 
   		 	<li tabindex='1' class='icon-addass'><span>
			<a href='index.php?module=2&action=6'>เพิ่มข้อมูลทะเบียนสินทรัพย์</a></span></li>
			<li tabindex='3' class='icon-asstotal'><span>
			<a href='index.php?module=2&action=22'>จำนวนสินทรัพยทั้งหมด</a></span></li>
			<li tabindex='2' class='icon-status'><span>
			<a href='index.php?module=6&action=21'>ตรวจสอบสถานะ</a></span></li>
			<li tabindex='4' class='icon-status'><span>
			<a href='index.php?module=5&action=31'>ยืม/คืนสินทรัพย์</a></span></li>
            <li tabindex='5' class='icon-user'><span>
			<a href='index.php?module=7&action=2'>ลงทะเบียนผู้ใช้</a></span></li>
			<li tabindex='6' class='icon-report'><span>
			<a href='index.php?module=5&action=48'>ประวัติการคืนสินทรัพย์</a></span></li>
			<li tabindex='7' class='icon-rent'><span>
			<a href='index.php?module=8&action=35'>การรับ/เบิกวัสดุ</a></span></li>
			<li tabindex='8' class='icon-logout'><span>
			<a href='index.php?module=7&action=5'>ออกจากระบบ</a></li></span></li>
  			</ul>
	</nav>";
}
function student_menu(){
	/*echo "<nav class='menu' tabindex='0'>
			<div class='smartphone-menu-trigger'></div>
    	<header class='avatar'>
			<img src='img/proflie.png' />
            <h2>Incognito User</h2>
  		</header>
			<ul> 
    		<li tabindex='0' class='icon-status'><span>ตรวจสอบสถานะ</span></li>
    		<li tabindex='0' class='icon-rent'><span>
			<a href='index.php?module=2&action=7'>การรับ/เบิกวัสดุ</a></span></li>
    		<li tabindex='0' class='icon-asstotal'><span>
			<a href='index.php?module=2&action=2'>จำนวนสินทรัพยทั้งหมด</a></span></li>
            <li tabindex='0' class='icon-report'><span>รายงานข้อมูลสินทรัพย์</span></li>
			<li tabindex='0' class='icon-logout'><span>
			<a href='index.php?module=7&action=5'>ออกจากระบบ</a></li></span></li>
  			</ul>
	</nav>";*/
				echo "<script>window.location='index.php?module=7&action=18'</script>";
}

function select_module($module,$action){
	$modules = array ("1" => "home"
							,"2" => "Asset"
							,"3" => "Category"
							,"4" => "Employee"
							,"5" => "Rent"
							,"6" => "Status"
							,"7" => "User"
							,"8" => "TestNew");
	$actions = array ("1" => "Home"
						,"2" => "Login" 
						,"3" => "Check_Login"
						,"4" => "Student_detile"
						,"5" => "Logout" 
						,"6" => "Form_Add"
						,"7" => "insert"
						,"8" => "form_adduser" 
						,"9" => "Form_edit[x]" 
						,"10" => "Delect_asset" 
						,"11" => "Edit_cat"
						,"12" => "EditForm_cat"
						,"13" => "Asset_update"
						,"14" => "categoty"
						,"15" => "Asset_detail"
						,"16" => "AddForm_cat"
						,"17" => "Admin_Login"
						,"18" => "Student_Login"
						,"19" => "User_Login"
						,"20" => "update_status"
						/*Status*/
						,"21" => "list_status"
						,"22" => "list_asset"
						,"23" => "form_receiveasset"
						,"24" => "assat_detail"
						,"25" => "assatt_detail"						
						,"26" => "Form_user"
						,"99" => "index_datatable"
						/*Rent*/
						,"27" => "add_acquire"
						,"28" => "add_rent"
						,"29" => "edit_rent"
						,"30" => "insert_rent"
						,"31" => "List_rent"
						,"32" => "Add_rent"
						,"33" => "update_rent"
						,"34" => "Delect_rent"
						,"48" => "Report"
						/**/
						,"35" => "menu_rent"
						,"36" => "list_spare"
						,"37" => "take"
						,"38" => "lend"
						,"39" => "list_category_spare"
						,"40" => "edit_spare"
						,"41" => "add_numspare"
						,"42" => "update_spare"
						,"43" => "add_spare"
						,"44" => "insert_spare"
						,"45" => "update_numspare"
						,"46" => "edit_category"
						,"47" => "update_category"
						);	
	
	$module_name = $modules[$module]; //ชื่อโฟลเดอร์
	$action_name = $actions[$action].".php"; //ชื่อไฟล์
	include("Module/$module_name/$action_name"); // module = ชื่อโฟลเดอร์ action = ชื่อไฟล์
}
?>