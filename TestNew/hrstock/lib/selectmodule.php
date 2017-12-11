<?php
$op=$_GET['option'];
switch($op){
	case hrstock:
		include"lib/hr_stock/index.php";
		break;
	case myself:
		include"lib/it_service/bemyself.php";
		break;
	case register:
		include"lib/register/register.php";
		break;
	case editaccount:
		include"lib/register/editaccount.php";
		break;
	case administrator:
		include"lib/administrator/index.php";
		break;
	default:
		include"main.php";
		break;
}
?>