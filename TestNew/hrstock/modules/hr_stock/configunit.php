<?php
if(!isset($_SESSION['iduser'])){
	echo"<script language=\"javascript\">window.location.href='index.php';</script>";
	exit();
}
if(isset($_GET['del'])){
	$sql="Delete From stock_tb_unit Where unitid='".$_GET['del']."'";
	mysql_query("SET NAMES utf8");
	$rs=mysql_query($sql);
	if($rs){
		echo"<script languange=\"javascript\">window.location.href='index.php?option=hrstock&com_stock=configunit&type=unit';</script>";
	}
}elseif(isset($_GET['edit'])){
	if(isset($_POST['smunit'])){
		$sql="UPDATE stock_tb_unit SET unitname='".$_POST['txtunitname']."' Where unitid='".$_GET['edit']."'";
		mysql_query("SET NAMES utf8");
		$rs=mysql_query($sql);
		if($rs){
			echo"<script languange=\"javascript\">window.location.href='index.php?option=hrstock&com_stock=configunit&type=unit';</script>";
		}
	}
	$sql="Select * From stock_tb_unit Where unitid='".$_GET['edit']."'";
	mysql_query("SET NAMES utf8");
	$rs=mysql_query($sql);
	if(mysql_num_rows($rs)>0){
		$row=mysql_fetch_array($rs);
	}
	echo"<div id=\"hrStock\">";
	echo"<p>แก้ไขหน่วยนับวัสดุ</p>";
	echo"<form name=\"frmeditunit\" method=\"post\" action=\"\" onsubmit=\"return chkUnit();\">";
	echo"<table width=\"580\" cellpadding=\"1\" cellspacing=\"1\" style=\"background:#FFFFFF;\">";
	echo"<tr>";
	echo"<td width=\"200\" align=\"right\">รหัสหน่วยนับวัสดุ : </td>";
	echo"<td><input class=\"ipstock\" type=\"text\" name=\"txtunitid\" id=\"txtunitid\" style=\"width:20%;\" disabled=\"false\" readonly=\"readonly\" value=\"".$row['unitid']."\" /></td>";
	echo"</tr>";
	echo"<tr>";
	echo"<td align=\"right\">ชื่อหน่วยนับวัสดุ : </td>";
	echo"<td><input class=\"ipstock\" type=\"text\" name=\"txtunitname\" id=\"txtunitname\" value=\"".$row['unitname']."\"/></td>";
	echo"</tr>";
	echo"<tr>";
	echo"<td>&nbsp;</td>";
	echo"<td><input type=\"submit\" class=\"btadmin\" name=\"smunit\" value=\"บันทึก\" />&nbsp;<input type=\"button\" class=\"btadmin\" value=\"ยกเลิก\" onclick=\"javascript:window.location.href='index.php?option=hrstock&com_stock=configunit&type=unit';\"/></td>";
	echo"</tr>";
	echo"</table>";
	echo"</form>";
	echo"</div>";

}elseif(isset($_POST['smunit'])){
	$sql="Select unitid From stock_tb_unit Where unitid='".$_POST['txtunitid']."'";
	mysql_query("SET NAMES utf8");
	$rs=mysql_query($sql);
	if(mysql_num_rows($rs)>0){
		echo"<p>รหัสซ้ำ</p>";
	}else{
		$sql="INSERT INTO stock_tb_unit(unitid,unitname) Values('".$_POST['txtunitid']."','".$_POST['txtunitname']."')";
		mysql_query("SET NAMES utf8");
		$rs=mysql_query($sql);
		if($rs){
			echo"<script languange=\"javascript\">window.location.href='index.php?option=hrstock&com_stock=configunit&type=unit';</script>";
		}
	}
}else{
	echo"<div id=\"hrStock\">";
	echo"<p>ตั้งค่าหน่วยนับวัสดุ</p>";
	echo"<form name=\"frmaddunit\" method=\"post\" action=\"\" onsubmit=\"return chkUnit();\">";
	echo"<table width=\"580\" cellpadding=\"1\" cellspacing=\"1\" style=\"background:#FFFFFF;\">";
	echo"<tr>";
	echo"<td width=\"200\" align=\"right\">รหัสหน่วยนับวัสดุ : </td>";
	echo"<td><input class=\"ipstock\" type=\"text\" name=\"txtunitid\" id=\"txtunitid\" style=\"width:20%;\"/></td>";
	echo"</tr>";
	echo"<tr>";
	echo"<td align=\"right\">ชื่อหน่วยนับวัสดุ : </td>";
	echo"<td><input class=\"ipstock\" type=\"text\" name=\"txtunitname\" id=\"txtunitname\"/></td>";
	echo"</tr>";
	echo"<tr>";
	echo"<td>&nbsp;</td>";
	echo"<td><input type=\"submit\" class=\"btadmin\" name=\"smunit\" value=\"เพิ่มข้อมูล\" />&nbsp;<input type=\"reset\" class=\"btadmin\" value=\"ล้างข้อมุล\" /></td>";
	echo"</tr>";
	echo"</table>";
	echo"</form>";
	echo"</div>";
	echo"<div id=\"hrStock\">";
	echo"<p>รายการหน่วยนับวัสดุ</p>";
	echo"<table width=\"400\" cellpadding=\"1\" cellspacing=\"1\">";
	echo"<tr height=\"30\" bgcolor=\"#FFA0F0\">";
	echo"<td width=\"150\" align=\"center\"><b>รหัส หน่วยนับ</b></td>";
	echo"<td align=\"center\"><b>ชื่อ หน่วยนับ</b></td>";
	echo"<td align=\"center\"><b>ปรับปรุง</b></td>";
	echo"</tr>";
	$sqlunit="Select * From stock_tb_unit Order by unitid";
	mysql_query("SET NAMES utf8");
	$rs=mysql_query($sqlunit);
	if(mysql_num_rows($rs)==0){
		echo"<tr height=\"30\" bgcolor=\"#FFFFFF\">";
		echo"<td colspan=\"3\" align=\"center\">- - - - - - ยังไม่มีข้อมูลหน่วยนับวัสดุ - - - - - - </td>";
		echo"</tr>";
	}else{
		while($row=mysql_fetch_array($rs)){
			echo"<tr bgcolor=\"#FFFFFF\" height=\"25\">";
			echo"<td>&nbsp;".$row['unitid']."</td>";
			echo"<td>&nbsp;".$row['unitname']."</td>";
			echo"<td align=\"center\"><a href=\"index.php?option=hrstock&com_stock=configunit&type=unit&edit=".$row['unitid']."\"><img src=\"images/edit_24.png\" border=\"0\" width=\"18\"/></a>&nbsp;<a href=\"index.php?option=hrstock&com_stock=configunit&type=unit&del=".$row['unitid']."\" onclick=\"return confirm('คุณต้องการลบ หน่วย : ".$row['unitname']." นี้หรือไม่ ?');\"><img src=\"images/del_24.png\" border=\"0\" width=\"18\"/></a></td>";
			echo"</tr>";
		}
	}
	echo"</table>";
	echo"</div>";
}
?>