<?php
	//session_start();
	include("../../Function/fuction.php");
	$con = connect_db(); //เรียกไฟล์
	$form_user = $_POST['username'];
	$form_pwd = $_POST['passwd'];
	/*$username = $_POST['username'];
	$passrd = $_POST['passwd'];*/
	$result1 =  mysqli_query($con,"SELECT * FROM user WHERE Username = '$form_user' 
	AND Password = '$form_pwd' ")
	or die (mysqli_error($con)); 
	//$result2 =  mysqli_query($con,"SELECT * FROM user WHERE Password = '$pass' ") or die ("SQL Error =>".mysqli_error($con)); 
	list($Username, $Password ,$Level) = mysqli_fetch_row($result1) or die (mysqli_error($con));
	if($form_user == $Username and $form_pwd == $Password){
		$_SESSION['valid_user'] = $form_user;
		$_SESSION['user_Level'] = $Level;
		//echo "<p>Login Okay.</p>";
		//if($user_form == $user_db and $pwd_form == $)
		/*if($_SESSION['user_Level'] == "Admin"){
			echo	"<script>window.location='Admin_Login.php'</script>";
		}elseif($_SESSION['user_Level'] == "Teacher"){
			echo	"<script>window.location='Teacher_Login.php'</script>";
		}elseif($_SESSION['user_Level'] == "Student"){
			echo	"<script>window.location='Student_Login.php'</script>";
		}else{
			echo "<script>window.location='index.php'</script>";
		}*/
		echo "<script>window.location='index.php'</script>";
	}else{
		echo "<script>alert('กรุณากรอก Username และ Password ให้ถูกต้อง')</script>";
		echo "<script>window.location='index.php'</script>";
		//echo "<P>Loging Fail</P>";
	}
	
	
?>