<?php 
	include("../../Funtion/funtion.php");
	$con = connect_db();
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Update Asset</title>
</head>

<body>
<?php
	$sql = "UPDATE asset SET
	Asset_code = '$_POST[Asset_code]'
	,Asset_serial = '$_POST[Asset_serial]'
	,Asset_name = '$_POST[Asset_name]'
	,mac_address = '$_POST[mac_address]'
	,computer_name = '$_POST[computer_name]'
	,brand = '$_POST[brand]'
	,Asset_date = '$_POST[Asset_date]'
	,Asset_company = '$_POST[Asset_company]'
	,Asset_price = '$_POST[Asset_price]'
	,Asset_barcode = '$_POST[Asset_barcode]'
	,Category_id = '$_POST[Category_id]'
	,Asset_photo = '$_POST[Asset_photo]'
	
	WHERE Asset_id = '$_GET[Asset_id]'";


?>
</body>
</html>