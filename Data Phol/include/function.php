<?php
function connect_db(){
	mysql_connect("localhost","cistrain_Phol","255007");
	mysql_select_db("cistrain_Phol")or die(mysql_error());
	mysql_query("SET NAMES UTF8");	
}
//========================================
function get_module($module,$action){
	include("modules/".$module."/index.php");	
}
//========================================
?>