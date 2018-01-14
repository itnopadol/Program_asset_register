<?php
	session_start();
	include("../function/db_function.php");
	$con=connect_db();
?>
<?php
	//print_r($_POST);
	
	$Sql = "INSERT INTO lend_empSP (No, rent_empID, rent_name, rent_phone,rent_department)
			VALUES 
			(''
			,'$_POST[rent_empID]'
			,'$_POST[rent_name]'
			,'$_POST[rent_phone]'
			,'$_POST[rent_department]'
			)"; //เพิ่มในฐานข้อมูลพนักงานที่มายืมวัสดุ-อุปกรณ์
	$result = mysqli_query($con,$Sql) or die("Error =" .mysqli_error($con));;
	$rent_empID = $_POST['rent_empID'];
	$Order_lend = mysqli_insert_id($con);
	for ($i = 0; $i < count($_POST['articles']); $i++){
		//foreach($_POST['articles'] as $row=>$art){
			//$row = mysqli_fetch_row($conn);
			$articles = $_POST['articles'][$i];
			$articles2 = $_POST['articles2'][$i];
			$articles3 = $_POST['articles3'][$i];
			$articles4 = $_POST['articles4'][$i];
	        $articles5 = $_POST['articles5'][$i];
			//$rent_empID = $_POST['rent_empID'][$i];
		$sql = "INSERT INTO lend_spare (id_spare ,name ,detail ,category_lend,amount ,Order_lend ,rent_empID)  VALUES ('$articles' , 
				'$articles2' ,
				'$articles3' ,
				'$articles4' ,
				'$articles5' ,
				'$Order_lend',
				'$rent_empID'
				) ";
				$Order_id = $rent_empID;
		$result = mysqli_query($con, $sql) or die ("Error in query: $sql " . mysqli_error($con));
			//}
		
	}
	//echo $sql;
	echo "<script>window.location='destroy.php'</script>";
	mysqli_close($con);
?>