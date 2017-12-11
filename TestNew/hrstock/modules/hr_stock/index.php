<?php
$stock=$_GET['com_stock'];
switch($stock){
	case administrator:
		include"registerstock.php";
		break;
	case configunit:
		$type=$_GET['type'];
		if($type=="unit"){
			include"configunit.php";
			break;
		}
		if($type=="kind"){
			include"configkind.php";
			break;
		}
		if($type=="supplier"){
			include"configsupplier.php";
			break;
		}
	case receivestock:
		$re=$_GET['receive'];
		if($re=="all"){
			include"receivestock.php";
			break;
		}
		if($re=="add"){
			include"receiveaddstock.php";
			break;
		}
	case begcomplete:
		if(isset($_GET['action'])){
			if($_GET['action']=="receive"){
				include"receive.php";
				break;
			}
		}else{
			include"complete.php";
			break;
		}
	case begstock:
		include"begstock.php";
		break;
	case history:
		include"history.php";
		break;
	case report:
		if($_GET['action']=="checkstock"){
			include"checkstock.php";
			break;
		}elseif($_GET['action']=="checkhistory"){
			include"checkhistory.php";
			break;
		}elseif($_GET['action']=="checkstockmonth"){
			include"checkstockmonth.php";
			break;
		}elseif($_GET['action']=="checkstockdepmonth"){
			include"checkstockdepmonth.php";
			break;
		}
	default:
		include"mainstock.php";
		break;
}
?>