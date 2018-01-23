<?php
	session_start();
	//unset($_SESSION['test_Session']); //ยกเลิกค่า Session บาง Session หรือ Session นั้นๆ
	session_destroy(); //ยกเลิกค่าใน Session ทุก Session
	/*echo "<script>window.location='Login'</script>";*/
	echo "<script>window.location='index.php?module=7&action=2'</script>";
?>