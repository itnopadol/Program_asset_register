<?php
session_start();
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN"
"http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html>
<head>
	<meta http-equiv="content-type" content="text/html;charset=utf-8"/>
	<link rel="stylesheet" type="text/css" href="css/style.css" media="screen"/>
	<script type="text/javascript" src="js/media/swfobject.js"></script>
	<script type="text/javascript" src="js/slide/jquery.js"></script>
	<script type="text/javascript" src="js/slide/scripts.js"></script>
	<script type="text/javascript" src="js/jscript.js"></script>
	<script type="text/javascript" src="js/carlendar.js"></script>
	<title>IT SOLUTION [ Power By Kalamell.com ]</title>
</head>
<?php
include('lib/config.inc.php');
include('lib/function.inc.php');
?>
<body>
	<div id="wrapper">
		<div id="header">
			<h1><img src="images/logo.png" width="293" height="47" title="IT SOLUTION"/></h1>
			<div id="menu-header">
				<ul>
					<li><a href="index.php">หน้าหลัก</a></li>
					<li><a href="index.php?option=register">สมัครขอใช้บริการ</a></li>
				</ul>
			</div>
		</div>
		<div id="menu-top">
			<ul>
				<li><a href="index.php">HOME</a></li>
				<li><a href="index.php?option=hrstock">HR STOCK</a></li>
			</ul>
		</div>
		<div id="box-show">
			<div id="box-tv">Television</div> <!-- เอาไว้ แสดง ไฟล์ media -->
			<div id="box-picshow">
				<div id="slide-holder">
					<div id="slide-runner">
						<?php
						$op=isset($_GET['option'])?$_GET['option']:'';
						if($op==""){
							?>
							<!-- ส่วนนี้ แสดง รูปสไลด์
							<a href=""><img id="slide-img-1" src="images/up-images/nature-photo.png" class="slide" alt="" /></a>
							<a href=""><img id="slide-img-2" src="images/up-images/nature-photo1.png" class="slide" alt="" /></a>
							<a href=""><img id="slide-img-3" src="images/up-images/nature-photo2.png" class="slide" alt="" /></a>
							<a href=""><img id="slide-img-4" src="images/up-images/nature-photo3.png" class="slide" alt="" /></a>
							<a href=""><img id="slide-img-5" src="images/up-images/nature-photo4.png" class="slide" alt="" /></a>
							<a href=""><img id="slide-img-6" src="images/up-images/nature-photo4.png" class="slide" alt="" /></a>
							<a href=""><img id="slide-img-7" src="images/up-images/nature-photo6.png" class="slide" alt="" /></a> 
							<div id="slide-controls">
								<p id="slide-client" class="text"><strong>post: </strong><span></span></p>
								<p id="slide-desc" class="text"></p>
								<p id="slide-nav"></p>
							</div>
							-->
						<?php
							echo"<img src=\"images/itsolution.png\"/>";
						}elseif($op=="hrstock"){
							echo"<img src=\"images/hrstock.png\"/>";
						}elseif($op=="qalab"){
							echo"<img src=\"images/qalab.png\"/>";
						}else{
							echo"<img src=\"images/itsolution.png\"/>";
						}
						?>
					</div>
				</div>
			</div>
		</div>
		<div id="content">
			<div id="space-head"></div>
			<div id="leftmenu">
				<div id="leftmenu-head"></div>
				<div id="login"><?php include('lib/menu.php');//แสดง เมนูซ้ายมือ ?></div>
				<?php include('lib/listmenu.php');?>
				<div id="leftmenu-bt"></div>
			</div>
			<div id="main-content">
				<div id="main-content-head"></div>
				<div id="post"><?php include('lib/selectmodule.php'); // เรียก โมดูลต่าง ๆ มาใช้งาน?></div>
				<div id="main-content-bt"></div>
			</div>
		</div>
	</div>
	<div id="footer"><p>IT SOLUTION &copy 2010 | Power By <a href="http://www.kalamell.com"/>Kalamell.com</a> Design & Develop By <a href="http://www.kalamell.com"/>Bundit Sankhumpha</a> 0800565152 (kalamell@hotmail.com)</p> </div>
</body>
<script type='text/javascript'>
  var so = new SWFObject('js/media/player.swf','ply','320','200','9','#000000');
  so.addParam('allowfullscreen','true');
  so.addParam('allowscriptaccess','always');
  so.addParam('wmode','opaque');
  so.addVariable('file','http://localhost/hrstock/images/media/Elly_tran_ha/elly_tran_ha.flv');  // Path อย่าลืมแก้
  so.addVariable('image','http://localhost/hrstock/images/media/Elly_tran_ha/EllyTranHa2.jpg') // Path อย่าลืมแก้
  so.write('box-tv');
</script>
<script type="text/javascript">
    if(!window.slider) var slider={};slider.data=[{"id":"slide-img-1","client":"nature beauty","desc":"nature beauty photography"},{"id":"slide-img-2","client":"nature beauty","desc":"add your description here"},{"id":"slide-img-3","client":"nature beauty","desc":"add your description here"},{"id":"slide-img-4","client":"nature beauty","desc":"add your description here"},{"id":"slide-img-5","client":"nature beauty","desc":"add your description here"},{"id":"slide-img-6","client":"nature beauty","desc":"add your description here"},{"id":"slide-img-7","client":"nature beauty","desc":"add your description here"}];
   </script>
</html>