<?php 
	session_start();
	include("Funtion/funtion.php");
	$con = connect_db();
?>
<!DOCTYPE html>
<html >
<head>
  <meta charset="UTF-8">
  <title>Asset Register</title>
<link rel="stylesheet" href="CSS/style.css" type="text/css">
<link rel="stylesheet" href="CSS/Login.css" type="text/css">
<link rel="stylesheet" href="layout.css" type="text/css">
<link rel="stylesheet" href="CSS/body.css" type="text/css">
</head>
<body>
<header>

	  <header>
	  <div id="sitename" align="center"><h1 class="">ระบบการจัดการทะเบียนสินทรัพย์ บริษัทนพดลพาณิชย์</div></h1>
    </header>
    <div id="main">
		<aside>
		<div id="login" class="fontcolor">
			<?php 
				if(empty($_SESSION['valid_user'])){					
					include("module\User\Login_Form.php");	
				}
				else{				
					//แสดงเมนูของ user ใน level นั้น
					echo "<nav>";
					select_menu($_SESSION['user_Level']); //แสดงเมนูของแต่ละ Level
					echo"</nav>";
				}
			?>
			</div>
			</aside>
		<section>
  			<div id="main_content" class="helper">
    			<?php 
					if(empty($_GET['module']) or empty($_GET['action'])){
					$module = 1;
					$action = 1;
				}	
				else{
					$module = $_GET['module'];
					$action = $_GET['action'];
				}
				select_module($module,$action);
				?>
  		</div>
		</section>
		<div class="clearfloat"></div>
      <div class="clearfloat"></div>
    <footer>
    	<a href="https://www.facebook.com/NopadolPanich/" target=_blank>
        <img src="img/fb.png" style="width:40px;height:40px;"></a>
        <a href="http://www.nopadol.com" target=_blank>
        <img src="img/nopadol-logo.png" style="width:40px;height:40px;"></a>
        <a href="sale@nopadol.com" target=_blank>
        <img src="img/email-icon.png" style="width:40px;height:40px;."></a>
    	<div id="footer_top" class="fontcolor"><p>©2014 Nopadol Panich Co., Ltd. All Rights Reserved</p></div>
    	<div id="footer_bottom" class="fontcolor2">128 Chiang Mai - Lampang Road, t.Fah Ham a. Muang Chiang Mai ,Thailand</p></div>
    </footer>
</div>
<a style="position: fixed; bottom: 10px; right: 10px;color:#CCC" </a>
</body>
</div>
</html>