<?php
switch($action){
	case "check_login" : check_login(); break;
	case "log_out" : log_out(); break;	
	case "register" : register(); break;
	case "manage_user" : manage_user(); break;
	case "delete_user" : delete_user(); break;
	case "insert_user" : insert_user(); break;
	case "user_detail" : user_detail(); break;
	case "update_user" : update_user(); break;
	case "edit_user" : edit_user(); break;
}
?>