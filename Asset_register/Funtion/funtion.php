<?php
function connect_db(){
	$con=mysqli_connect("localhost","root","","nopadol");
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
	echo "<ul>
    <li class='dropdown'>
      <input type='checkbox' />
      <a href='index.php' data-toggle='dropdown'>Home</a>
      <ul class='dropdown-menu'>
        <li><a href='index.php'>Home</a></li>
      </ul>
    </li>
    <li class='dropdown'>
      <input type='checkbox' />
      <a href='index.php' data-toggle='dropdown'>Admin Menu</a>
      <ul class='dropdown-menu'>
        <li><a href='index.php?module=5&action=26'>เพิ่มผู้ใช้งาน</a></li>
		<li><a href='index.php?module=3&action=9'>เพิ่มข้อมูลนักศึกษา</a></li>
		<li><a href='index.php?module=2&action=18'>เพิ่มข้อมูลหลักสูตร</a></li>
		<li><a href='index.php?module=6&action=21'>Add Web Board</a></li>
      </ul>
    </li>
    <li class='dropdown'>
      <input type='checkbox' />
      <a href='index.php' data-toggle='dropdown'>Management</a>
      <ul class='dropdown-menu'>
        <li><a href='index.php?module=5&action=6'>จัดการข้อมูลผู้ใช้</a></li>
		<li><a href='index.php?module=3&action=10'>จัดการข้อมูลนักศึกษา</a></li>
		<li><a href='index.php?module=2&action=20'>จัดการข้อมูลหลักสูตร</a></li>
		<li><a href='index.php?module=6&action=25'>Web Board</a></li>
      </ul>
    </li>
    <li class='dropdown'>
      <input type='checkbox' />
      <a href='index.php?module=5&action=5' data-toggle='dropdown'>Logout</a>
      <ul class='dropdown-menu'>
	  <li><a href='index.php?module=5&action=5'>ออกจากระบบ</a></li>
      </ul>
    </li>
  </ul>";
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
						,"6" => "Management_User"
						,"7" => "EditStudentsForm"
						,"8" => "Delect_Students" 
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
						,"35" => "Edit_Student"
						,"36" => "Studentdetile");	
	
	$module_name = $modules[$module]; //ชื่อโฟลเดอร์
	$action_name = $actions[$action].".php"; //ชื่อไฟล์
	include("Module/$module_name/$action_name"); // module = ชื่อโฟลเดอร์ action = ชื่อไฟล์
}
?>