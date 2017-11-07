<?php
	//session_start();
	include("../../Funtion/funtion.php");
	$con = connect_db(); //เรียกไฟล์
	$form_user = $_POST['username'];
	$form_pwd = $_POST['passwd'];
	
	$result1 =  mysqli_query($con,"SELECT * FROM user WHERE Username = '$form_user' 
	AND Password = '$form_pwd' ") or die (mysqli_error($con)); 
	 
	list($Username, $Password ,$Level) = mysqli_fetch_row($result1) 
	or die (mysqli_error($con));
	if($form_user == $Username and $form_pwd == $Password){
		$_SESSION['valid_user'] = $form_user;
		$_SESSION['user_Level'] = $Level;
		
		echo "<script>window.location='index.php'</script>";
	}
	else{
		echo "<script>alert('กรุณากรอก Username และ Password ให้ถูกต้อง')</script>";
		echo "<script>window.location='index.php'</script>";
		//echo "<P>Loging Fail</P>";
	}
	
	
?>