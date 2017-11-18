<?php /*?>
	session_start();
	if(empty($_SESSION['valid_user']) or $_SESSION['user_Level'] != 'Admin'){
		echo "<script>alert('คุณไม่มีสิทธิ์เข้าใช้งานในหน้านี้ กรุณา Login ก่อน')</script>";
		echo "<script>window.location='Login_Form.php'</script>";
	}
<?php */?>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Student Login</title>
<link rel="stylesheet" href="../../CSS/style.css" type="text/css">
<link rel="stylesheet" href="../../CSS/body.css" type="text/css">
</head>

<body>
<div id="sitename" align="center"><h1>ระบบการจัดการทะเบียนสินทรัพย์ บริษัทนพดลพาณิชย์</h1></div>
    <nav class="menu" tabindex="0">
			<div class="smartphone-menu-trigger"></div>
    	<header class="avatar">
			<img src="./img/if_supportmale_403020.png" />
            <h2>Student IT</h2>
    		<!--<h2><?php echo $_SESSION['valid_user'] ?></h2>-->
  		</header>
			<ul> 
   		 	<li tabindex="0" class="icon-addass"><span>เพิ่มข้อมูลทะเบียนสินทรัพย์</span></li>
    		<li tabindex="0" class="icon-status"><span>ตรวจสอบสถานะ</span></li>
    		<li tabindex="0" class="icon-rent"><span>การรับ/เบิกวัสดุ</span></li>
    		<li tabindex="0" class="icon-asstotal"><span>จำนวนสินทรัพยทั้งหมด</span></li>
            <li tabindex="0" class="icon-user"><span>ลงทะเบียนผู้ใช้</span></li>
            <li tabindex="0" class="icon-report"><span>รายงานข้อมูลสินทรัพย์</span></li>
            <li tabindex="0" class="icon-report"><a href="Logout.php"><span>ออกจากระบบ</span></a></li>
  			</ul>
	</nav>
</body>
</html>