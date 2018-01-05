<?php
include("modules/order/order_function.php");
switch($action){
	case "list_order" : list_order(); break;
	case "list_order_admin" : list_order_admin(); break;
	case "order_detail" : order_detail(); break;
	case "bil" : bil(); break;
	case "add_like" : add_like(); break;
}
 ?>