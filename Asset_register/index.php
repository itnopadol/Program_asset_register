<?php 
	session_start();
	include("Funtion/funtion.php");
	$con = connect_db();
?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Asset Register</title>
    <link rel="stylesheet" href="CSS/style.css" type="text/css">
    <link rel="stylesheet" href="CSS/Login.css" type="text/css">
    <link rel="stylesheet" href="layout.css" type="text/css">
    <link rel="stylesheet" href="CSS/body.css" type="text/css">
    <link rel="stylesheet" href="CSS/list_asset.css" type="text/css">
    <link href="CSS/Test.css" rel="stylesheet" type="text/css">
    <!--<link href="CSS/bootstrap.min.css" rel="stylesheet">
    <link href="CSS/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap-theme.min.css" 
    integrity="sha384-rHyoN1iRsVXV4nD0JutlnGaslCJuC7uwjduW9SVrLvRYooPp2bWYgmgJQIXwl/Sp" crossorigin="anonymous">-->
<STYLE>
A:link { 
	color: rgb(54, 42, 68); 
	text-decoration:none;
}
A:visited {
	color: #091da6; 
	text-decoration: none;
}
A:hover {
	color: rgb(232, 76, 26);
}
#textaling{
	text-align:center;	
}
</STYLE>
</head>
<body id="makebody">
<div class="cont"
<header>
	<header>
		<div id="sitename" align="center"><h1 id="h1">ระบบการจัดการทะเบียนสินทรัพย์ บริษัทนพดลพาณิชย์</h1></div>
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
    <footer id="textaling">
    	<a href="https://www.facebook.com/NopadolPanich/" target=_blank>
        <img src="img/fb.png" style="width:40px;height:40px;" ></a>
        <a href="http://www.nopadol.com" target=_blank>
        <img src="img/nopadol-logo.png" style="width:40px;height:40px;"></a>
        <a href="sale@nopadol.com" target=_blank>
        <img src="img/email-icon.png" style="width:40px;height:40px;"></a>
    	<div id="footer_top" class="fontcolor" align="center"><p>©2014 Nopadol Panich Co., Ltd. All Rights Reserved</p></div>
    	<div id="footer_bottom" class="fontcolor2">392 Chiang Mai - Lampang Road, t.Fah Ham a. Muang Chiang Mai ,Thailand</p>
        </div>
    </footer>
</div>
<a style="position: fixed; bottom: 10px; right: 10px;color:#CCC" </a>
</header>
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" 
    integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" 
    crossorigin="anonymous"></script>
</body>
</div>
</html>