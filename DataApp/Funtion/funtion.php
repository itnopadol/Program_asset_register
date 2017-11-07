<?php
function connect_db(){
	$con = mysqli_connect("localhost","cistrain_bigza","bigmanmx2004","nopadol"); 
	//mysqli_connect("","ชื่อเข้าใช้","รหัส","ชื่อฐานข้อมูล")
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
    		<li tabindex='2' class='icon-status'><span>ตรวจสอบสถานะ</span></li>
    		<li tabindex='3' class='icon-rent'><span>
			<a href='index.php?module=2&action=7'>การรับ/เบิกวัสดุ</a></span></li>
    		<li tabindex='4' class='icon-asstotal'><span>
			<a href='index.php?module=2&action=35'>จำนวนสินทรัพยทั้งหมด</a></span></li>
            <li tabindex='5' class='icon-user'><span>
			<a href='index.php?module=7&action=26'>ลงทะเบียนผู้ใช้</a></span></li>
            <li tabindex='6' class='icon-report'><span>รายงานข้อมูลสินทรัพย์</span></li>
			<li tabindex='7' class='icon-report'><span>
			<a href='index.php?module=7&action=5'>ออกจากระบบ</a></li></span></li>
  			</ul>
	</nav>";
}
function student_menu(){
	echo "<nav class='menu' tabindex='0'>
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
			<a href='index.php?module=2&action=35'>จำนวนสินทรัพยทั้งหมด</a></span></li>
            <li tabindex='0' class='icon-report'><span>รายงานข้อมูลสินทรัพย์</span></li>
			<li tabindex='0' class='icon-logout'><span>
			<a href='index.php?module=7&action=5'>ออกจากระบบ</a></li></span></li>
  			</ul>
	</nav>";
}
function select_module($module,$action){
	$modules = array ("1" => "home"
							,"2" => "Asset"
							,"3" => "Category"
							,"4" => "Employee"
							,"5" => "Rent"
							,"6" => "Status"
							,"7" => "User");
	$actions = array ("1" => "Home"
						,"2" => "List_Student" 
						,"3" => "Check_Login"
						,"4" => "Student_detile"
						,"5" => "Logout" 
						,"6" => "from_addasset"
						,"7" => "form_receiveasset"
						,"8" => "form_adduser" 
						,"9" => "FormStudents" 
						,"10" => "managementStudent" 
						,"11" => "Add_Students"
						,"12" => "Edit_user"
						,"13" => "Edit_Students"
						,"14" => "Add_user"
						,"15" => "Delete_user"
						,"16" => "List_Curriculum"
						,"17" => "Delect_Cur"
						,"18" => "FormCurriculum"
						,"19" => "Add_Curriculum"
						,"20" => "Management_Curriculum"
						,"21" => "TopicForm"
						,"22" => "topic_detail"
						,"23" => "Addtopic_form"
						,"24" => "List_Topic" //ยังไม่ได้ทำ
						,"25" => "web_bord"
						,"26" => "Form_user"
						,"27" => "Add_taecher"
						,"28" => "Edit_teacher"
						,"29" => "Edit_teacherForm"
						,"30" => "List_Teacher"
						,"31" => "managementTeacher"
						,"32" => "Teacher_detile"
						,"33" => "Add_taecherForm"
						,"34" => "EditStudents"
						,"35" => "Asset_total"
						,"36" => "category");	
	
	$module_name = $modules[$module]; //ชื่อโฟลเดอร์
	$action_name = $actions[$action].".php"; //ชื่อไฟล์
	include("Module/$module_name/$action_name"); // module = ชื่อโฟลเดอร์ action = ชื่อไฟล์
}
?>