<?php 
include("modules/report/report_function.php");
switch($action){
	case "sell_month" : sell_month(); break;	
	case "top_sell" : top_sell(); break;
	case "top_like" : top_like(); break;
}
?>