<?php
include("modules/cart/cart_function.php");
switch($action){
	case "add_tocart" : add_tocart(); break;
	case "show_cart" : show_cart(); break;
	case "recaculate" : recaculate(); break;
	case "transfer_form" : transfer_form(); break;
	case "insert_transfer" : insert_transfer(); break;
	case "transfer_detail" : transfer_detail(); break;
	case "update_stt" : update_stt(); break;
	case "add_tracking" : add_tracking(); break;

}
 ?>