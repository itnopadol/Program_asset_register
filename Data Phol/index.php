<?php
session_start();
include("include/function.php");
include("include/web_menu.php");
include("modules/user/user_function.php");

$module=empty($_GET['module'])?"":$_GET['module'];
$action=empty($_GET['action'])?"":$_GET['action'];
$login_type=empty($_SESSION['login_type'])?"":$_SESSION['login_type'];
$login_name=empty($_SESSION['login_name'])?"":$_SESSION['login_name'];
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>index</title>
<link rel="stylesheet" href="css/bootstrap.min.css">
<link rel="stylesheet" href="css/bootstrap-theme.min.css">
<link rel="stylesheet" href="css/my-style.css">
<script src="js/bootstrap.min.js"></script>

</head>

<body>
<div class="container">
	<div class="row">
    	<div class="col-md-12 well" id="header"><h1>CIS Online</h1></div>
    </div>
    <div class="row">
    	<div class="col-md-4 well" id="sidebar">
        <?php 
		if(empty($_SESSION['login_result'])){
				login_form();
			}else{
				echo "<div class='alert alert-success' role='alert'><p class='text-center'>ยินดีต้อนรับคุณ<strong>&nbsp;&nbsp;$_SESSION[login_name]&nbsp;&nbsp;</strong><br>เข้าสู่ระบบ</p></div>";
				}
		web_menu($login_type); ?>
        </div>
        <div class="col-md-8 well" id="main">
        <?php
        if(empty($module)){
        	include("include/home.php");
        }else{
        	get_module($module,$action);
		}
            ?>
        </div>
     </div>
     <div class="row">
     	<div class="col-md-12 well" id="footer">Rajamangala University of Technology Lanna (RMUTL) 
มหาวิทยาลัยเทคโนโลยีราชมงคลล้านนา (มทร.ล้านนา) 
128 ถนนห้วยแก้ว ต.ช้างเผือก อ.เมือง จ.เชียงใหม่ 50300 <br />
โทรศัพท์: 0-5392-1444 โทรสาร: 0-5321-3183 E-mail: webmaster@rmutl.ac.th</div>
      </div>
</div>

</body>
</html>