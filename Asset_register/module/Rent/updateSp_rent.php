<?php
	session_start();
	$formid = isset($_SESSION['formid']) ?$_SESSION['formid'] : "";
	if($formid != $_POST['formid']){
		echo "Error Session Retry againt.";
	}else{
		unset($_SESSION['formid']);
		if($_POST){
			require "../../Funtion/Funtion.php";
			$con = connect_db();
			$rent_empID = mysqli_real_escape_string($con, $_POST['rent_empID']);
			$rent_name = mysqli_real_escape_string($con, $_POST['rent_name']);
			$rent_phone = mysqli_real_escape_string($con, $_POST['rent_phone']);			
			
			$Sql = "INSERT INTO lend_empSP (No, rent_empID, rent_name, rent_phone)
			VALUES 
			(''
			,'$_POST[rent_empID]'
			,'$_POST[rent_name]'
			,'$_POST[rent_phone]'
			)"; //เพิ่มในฐานข้อมูลพนักงานที่มายืมวัสดุ-อุปกรณ์
			$result = mysqli_query($con,$Sql) or die("Error =" .mysqli_error($con));;
			if($result){ //myQeury
				$order_id = mysqli_insert_id($con);
				for ($i = 0; $i < count($_POST['Qty']); $i++){
				$order_detail_quantity = mysqli_real_escape_string($_POST['qty'][$i]);
				$order_detail_price = mysqli_real_escape_string($_POST['product_price'][$i]);
				$product_id = mysqli_real_escape_string($_POST['product_id'][$i]);
				$lineSql = "INSERT INTO order_details (order_detail_quantity, order_detail_price, product_id, order_id) "; //เพิ่มลงในรายการยืม
				$lineSql .= "VALUES (";
				$lineSql .= "'{$order_detail_quantity}',";
				$lineSql .= "'{$order_detail_price}',";
				$lineSql .= "'{$product_id}',";
				$lineSql .= "'{$order_id}'";
				$lineSql .= ") ";
				mysql_query($lineSql);
				}
				mysqli_close($con);
				unset($_SESSION['cart']);
				unset($_SESSION['Qty']);
				
			}else{
				mysqli_close($con);
				//echo "<script>window.location='index_sp.php'</script>";
			}
		}
	}
?>