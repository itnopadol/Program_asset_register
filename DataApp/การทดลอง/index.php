<?php 
	session_start();
	include("Funtion/funtion.php");
	//$con = connect_db();
?>
<!doctype html>
<html>
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width">
<title>Asset Register </title>
<link href="layout.css" rel="stylesheet" type="text/css">
<link href="CSS/Login.css" rel="stylesheet" type="text/css">
<SCRIPT laguage="javascript">
count=1;
txt="ระบบจัดการทะเบียนสินทรัพย์";
function txtrun()
{
txtshow=txt.substring(count);
document.title=txtshow;
status=txtshow;
count=count+1;
if (count>txt.length)
{
count=0;
}
setTimeout("txtrun()",200);
}
txtrun();
</SCRIPT>
</head>

<body>

<div id="contatiner">
	<header>
	  <div id="sitename" align="center"><h2>ระบบการจัดการทะเบียนสินทรัพย์ บริษัทนพดลพาณิชย์</div></h2>
    </header>
   
    <div id="main">
    	<aside class="h3">
        <div id="login">
        <h3 align="center"><img src="img/home-48.png" width="38" height="38">หน้าหลัก</h3>
        <h3 align="center">ยินดีต้อนรับ <br>
		-เข้าสู่ระบบ- </h3>
        	<?php 
			if(empty($_SESSION['valid_user'])){
				include("Module/user/Login_Form.php");	
			}
			else{
				echo "<H1 class='title'>Welcome to System</H1>";
				echo "<P>ยินดีต้อนรับ</P>
				<P>User : $_SESSION[valid_user]</P>";
				
				//แสดงเมนูของ user ใน level นั้น
				echo "<nav>";
				select_menu($_SESSION['user_Level']); //แสดงเมนูของแต่ละ Level
				echo"</nav>";
			}
		?>
        </div>
        </aside>
        <section>
			<div id="welcome" align="center">
            	<img src="img/NQyEP2823.gif" >
              <p></p>
			</div>
       </section>    
       <div class="clearfloat"></div>
      <div class="clearfloat"></div>
    <footer>
    	<div id="footer_top"><p>© 2014 Nopadol Panich Co., Ltd. All Rights Reserved</p></div>
    	<div id="footer_bottom">392 ถ.เชียงใหม่-ลำปาง ตำบลฟ้าฮ่าม อำเภอเมือง จังหวัดเชียงใหม่ 50000
โทร. 053 261 000</p></div>
    </footer>
</div>


</body>
</html>
