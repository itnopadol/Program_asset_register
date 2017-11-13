<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>Untitled Document</title>
</head>
<body>
<?php
include("../function/db_function.php");
	$con=connect_db();
	
	$result="UPDATE asset SET Asset_id = '$_POST[Asset_id]',
	Asset_code='$_POST[Asset_code]',
	Asset_serial='$_POST[Asset_serial]',
	Asset_name='$_POST[Asset_name]',
	mac_address='$_POST[mac_address]',
	computer_name='$_POST[computer_name]',
	brand= '$_POST[brand]',
	Asset_receivr_amout='$_POST[Asset_receivr_amout]',
	Asset_date='$_POST[Asset_date]',
	Asset_company='$_POST[Asset_company]',
	Asset_price='$_POST[Asset_price]',
	Asset_barcode='$_POST[Asset_barcode]',
	Category_id='$_POST[Category_id]',
	Asset_photo='$_POST[Asset_photo]',
    detail = '$_POST[detail]' WHERE Asset_id= '$_POST[Asset_id]'";

	
mysqli_query($con,	$result)or die ("edit".mysqli_error($con));
mysqli_close($con);
echo "<script>alert('แก้ไขข้อมูลเรียบร้อยแล้ว')</script>";
echo "<script>window.location='list_asset.php'</script>";
?>
</body>
</html>