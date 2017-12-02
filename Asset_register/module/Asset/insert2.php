<?php
	require("../../Funtion/funtion.php");
	$con = connect_db();
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Untitled Document</title>
</head>

<body>
<?php
	$Asset_code = $_POST['Asset_code'];
	$Asset_serial = $_POST['Asset_serial'];
	$Asset_barcode = $_POST['Asset_barcode'];
	$mac_address = $_POST['mac_address'];
	$computer_name = $_POST['computer_name'];
	if(empty($_FILES['Asset_photo']['name'])){
		$asset_photo = "";
	}
	else{		
		$sum_name = date("dmyhis")."ABC";
		$char = substr(str_shuffle($sum_name),0,10); //ตัดเหลือตัว 10
		$asset_photo = $char."_".$_FILES['Asset_photo']['name']; //ชื่อไฟล์
		$temp_file = $_FILES['Asset_photo']['tmp_name'];	//temp ไฟล์
		copy($temp_file,"images/$asset_photo"); //copy ไฟล์ไปไว้ใน Folder img
		//$time = date("dmyhis");	
		//$char = str_shuffle("ABC");
	}
	// เช็คว่ามีข้อมูลนี้อยู่หรือไม่
	$Asset_status = "01";
	$check = "SELECT * FROM asset  WHERE Asset_code = '$Asset_code' 
	and Asset_serial = '$Asset_serial' and Asset_barcode = '$Asset_barcode' and mac_address = '$mac_address'
	and computer_name = '$computer_name'";
	
		$result1 = mysqli_query($con,$check) or die("Error =>".mysqli_error($con));
		$num = mysqli_num_rows($result1); 
        if($num > 0)   		
        {
			//ถ้ามี username นี้อยู่ในระบบแล้วให้แจ้งเตือน
             echo "<script>";
			 echo "alert(' มีผู้ใช้ username นี้แล้ว กรุณาสมัครใหม่อีกครั้ง !');";
			 //echo "window.location='form.php';";
          	 echo "</script>";
 
		}
		else{	
		//ถ้าไม่มีก็บันทึกลงฐานข้อมูล
		 $sql="INSERT INTO asset (Asset_id,Asset_code ,Asset_serial ,Asset_name ,mac_address,computer_name
		,brand ,Asset_date ,Asset_company ,Asset_price,Asset_barcode
		,Asset_Category,Asset_photo,detail,Asset_status)
	 
	VALUES('',
	'$_POST[Asset_code]',
	'$_POST[Asset_serial]',
	'$_POST[Asset_name]',
	'$_POST[mac_address]',
	'$_POST[computer_name]',
	'$_POST[brand]',
	'$_POST[Asset_date]',
	'$_POST[Asset_company]',
	'$_POST[Asset_price]',
	'$_POST[Asset_barcode]',
	'$_POST[Asset_Category]',
	'$asset_photo',
	'$_POST[detail]',
	$Asset_status
	) ";
	$result = mysqli_query($con, $sql) or die("Error =" .mysqli_error($con));
		//$result = mysql_db_query($database_dbconnect, $sql) or die ("Error in query: $sql". mysql_error());
}
//ปิดการเชื่อมต่อกับฐานข้อมูล
	mysqli_close($con);
//บันทึกสำเร็จแจ้งเตือนและกระโดดกลับไปหน้าฟอร์ม   ปล.การทำระบบจริงๆ อาจกระโดดไปหน้าอื่นที่เรากำหนด
	if($result){
			echo "<script type='text/javascript'>";
				echo "alert('SUCCESSFULLY');";
				//echo "window.location='form.php';";
			echo "</script>";
	  }
	  else{
//ถ้าบันทึกไม่สำเร็จแสดงข้อความ Error และกระโดดกลับไปหน้าฟอร์ม
		    echo "<script type='text/javascript'>";
				echo "alert('Error!');";
				//echo "window.location='form.php';";
			echo "</script>";
	  }


?>
</body>
</html>