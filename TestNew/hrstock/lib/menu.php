<?php
if(isset($_GET['logout'])){
	if($_GET['logout']=="true"){
		session_destroy();
		$chkuser=false;
		echo"<script language=\"javascript\">window.location=\"index.php\";</script>";
	}
}
if(isset($_SESSION["nameuser"])){
	$chkuser=true;
}else{
	$chkuser=false;
	if(isset($_POST['txtname']) && isset($_POST['txtpass'])){
		if($_POST['txtname']<>"" && $_POST['txtpass']<>""){
			$sql="Select tb_user.*,tb_prefix.prefixnamel From tb_user INNER JOIN tb_prefix On tb_user.prefixid=tb_prefix.prefixid Where username='".$_POST['txtname']."' And pw='".md5($_POST['txtpass'])."'";
			$rs=rsquery($sql);
			$n=mysql_num_rows($rs);
			if($n==0){
				$chkuser=false;
				echo"<script language=\"javascript\">alert('ชื่อผู้ใช้ หรือ รหัสผ่าน ไม่ถูกต้อง');</script>";
			}else{
				$fuser=mysql_fetch_array($rs);
				session_register("iduser");
				$_SESSION['iduser']=$fuser['iduser'];
				session_register("status");
				$_SESSION['status']=$fuser['statusUser'];
				$chkuser=true;
				session_register("user");
				$_SESSION['nameuser']=$fuser['nameuser']."&nbsp;".$fuser['surname'];
				session_register("avatar");
				$_SESSION['avatar']=$fuser['avatar'];
			}
		}
	}
}
if($chkuser==false){
	echo"<form name=\"frmadd\" method=\"POST\" action=\"\">";
	echo"<label>User name :</label><br />";
	echo"<input class=\"txt1\" type=\"text\" name=\"txtname\" id=\"txtname\" autocomplete=\"off\" /><br />";
	echo"<label>Password :</label><br />";
	echo"<input class=\"txt1\" type=\"password\" name=\"txtpass\" id=\"txtpass\" autocomplete=\"off\" /><br />";
	echo"<input class=\"bt1\" type=\"submit\" value=\"ลงชื่อเข้าใช้\" style=\"width:80px;margin-top:5px;\" />";
	echo"</form>";
}else{
	?>
	<ul class="login">
		<h3><?php echo _avatar($_SESSION['avatar']);?></h3>
		<li><img src="images/addbk_16.gif"/>&nbsp;สวัสดี <?php echo $_SESSION['nameuser']?></li>
		<li class="icon"><a href="index.php?option=editaccount">แก้ไขข้อมูลส่วนตัว</a></li>
		<li class="icon"><a href="?logout=true">ออกจากระบบ</a></li>
	</ul>
	<?php
	
}
?>	
