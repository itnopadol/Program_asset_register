<?php
session_start();
include"../../connect.inc.php";
include"../../configfunction.php";
$message = $_POST["tMessage"];
$times=date("H:i:s");
if(!$message=="" && isset($_SESSION['iduser'])){
	$sql="INSERT INTO tb_chat(subject,datefix,timefix,ipuser,userby) Values('$message','$timedate','$times','".$_SERVER['REMOTE_ADDR']."','".$_SESSION['iduser']."')";
	mysql_query("SET NAMES utf8");
	$rs=mysql_query($sql);
	if(!$rs){
		echo"<p>".mysql_error()."</p>";
		exit();
	}
}
$sql="Select tb_chat.*,tb_user.nameuser From tb_chat INNER JOIN tb_user ON tb_chat.userby=tb_user.iduser Where datefix='$timedate' Order by no DESC";
mysql_query("SET NAMES utf8");
$rss=mysql_query($sql);
if(mysql_num_rows($rss)==0){
	echo"<p>ยังไม่มีผู้ฝากข้อความ</p>";
}else{
	while($row=mysql_fetch_array($rss)){
		echo $s .=$s;
		$message=nl2br($row['subject']);
		
		$pic="<img src=\"images/icons/blank.gif\"/>";
		$message=str_replace("-_-",$pic,$message);

		$pic="<img src=\"images/icons/eek.gif\"/>";
		$message=str_replace("O-O",$pic,$message);

		$pic="<img src=\"images/icons/grin.gif\"/>";
		$message=str_replace("^-^",$pic,$message);

		$pic="<img src=\"images/icons/lol.gif\"/>";
		$message=str_replace("^<^",$pic,$message);
		
		$pic="<img src=\"images/icons/roll.gif\"/>";
		$message=str_replace("-:-",$pic,$message);

		$pic="<img src=\"images/icons/smile.gif\"/>";
		$message=str_replace("-o-",$pic,$message);

		$pic="<img src=\"images/icons/evil.gif\"/>";
		$message=str_replace(":@",$pic,$message);
		
		$pic='<img src="images/icons/555.gif" border="0"/>';
		$message=str_replace("555",$pic,$message);

		$pic='<img src="images/icons/blue.gif" border="0"/>';
		$message=str_replace("T-T",$pic,$message);

		$pic='<img src="images/icons/smokin.gif" border="0">';
		$message=str_replace(":-)",$pic,$message);
		
		$pic='<img src="images/icons/tasty.gif" border="0"/>';
		$message=str_replace(":D",$pic,$message);




		echo"<p style=\"background:#000000;color:#FFFFFF;font-size:8px;\">มีผู้ฝากข้อความเมื่อ ".$row['timefix']."</p>";
		echo"<p style=\"font-size:14px;\">$message</p>";
		echo"<hr style=\"width:145px;border:1px solid red;\">";
		echo"<br />";
	}
}
echo"<div id=\"mydiv\"></div>";


?>