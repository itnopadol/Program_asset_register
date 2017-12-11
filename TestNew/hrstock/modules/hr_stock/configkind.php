<?php
if(!isset($_SESSION['iduser'])){
	echo"<script language=\"javascript\">window.location.href='index.php';</script>";
	exit();
}
if(isset($_GET['del'])){
	$sql="Delete From stock_tb_kind Where kindid='".$_GET['del']."'";
	mysql_query("SET NAMES utf8");
	$rs=mysql_query($sql);
	if($rs){
		echo"<script languange=\"javascript\">window.location.href='index.php?option=hrstock&com_stock=configunit&type=kind';</script>";
	}
}elseif(isset($_GET['edit'])){
	if(isset($_POST['smunit'])){
		$sql="UPDATE stock_tb_kind SET kindname='".$_POST['txtkindname']."' Where kindid='".$_GET['edit']."'";
		mysql_query("SET NAMES utf8");
		$rs=mysql_query($sql);
		if($rs){
			echo"<p>บันทึกข้อมูลเรียบร้อย</p>";
			echo"<script language=\"javascript\">window.location.href='index.php?option=hrstock&com_stock=configunit&type=kind';</script>";
		}
	}
	$sql="Select * From stock_tb_kind Where kindid='".$_GET['edit']."'";
	mysql_query("SET NAMES utf8");
	$rs=mysql_query($sql);
	if(mysql_num_rows($rs)>0){
		$row=mysql_fetch_array($rs);
	}
	echo"<div id=\"hrStock\">";
	echo"<p>ตั้งค่าประเภทวัสดุ</p>";
	echo"<form name=\"frmeditkind\" method=\"post\" action=\"\" onsubmit=\"return chkKind();\">";
	echo"<table width=\"580\" cellpadding=\"1\" cellspacing=\"1\" style=\"background:#FFFFFF;\">";
	echo"<tr>";
	echo"<td align=\"right\">ชื่อประเภทวัสดุ : </td>";
	echo"<td><input class=\"ipstock\" type=\"text\" name=\"txtkindname\" id=\"txtkindname\" value=\"".$row['kindname']."\"/></td>";
	echo"</tr>";
	echo"<tr>";
	echo"<td>&nbsp;</td>";
	echo"<td><input type=\"submit\" class=\"btadmin\" name=\"smunit\" value=\"เพิ่มข้อมูล\" />&nbsp;<input type=\"reset\" class=\"btadmin\" value=\"ยกเลิก\" onclick=\"javascript:window.location.href='index.php?option=hrstock&com_stock=configunit&type=kind';\" /></td>";
	echo"</tr>";
	echo"</table>";
	echo"</form>";
	echo"</div>";
}elseif(isset($_GET['addkind'])){
	include "configtype.php";
}else{
	if(isset($_POST['smunit'])){
		$sql="Select kindname From stock_tb_kind Where kindname='".$_POST['txtkindname']."'";
		mysql_query("SET NAMES utf8");
		$rs=mysql_query($sql);
		if(mysql_num_rows($rs)>0){
			echo"<p>ชื่อประเภทซ้ำ</p>";
		}else{
			$sql="INSERT INTO stock_tb_kind(kindname) Values('".$_POST['txtkindname']."')";
			mysql_query("SET NAMES utf8");
			$rs=mysql_query($sql);
			if($rs){
				echo"<script languange=\"javascript\">window.location.href='index.php?option=hrstock&com_stock=configunit&type=kind';</script>";
			}
		}
	}
	echo"<div id=\"hrStock\">";
	echo"<p>ตั้งค่าประเภทวัสดุ</p>";
	echo"<form name=\"frmaddkind\" method=\"post\" action=\"\" onsubmit=\"return chkKind();\">";
	echo"<table width=\"580\" cellpadding=\"1\" cellspacing=\"1\" style=\"background:#FFFFFF;\">";
	echo"<tr>";
	echo"<td align=\"right\">ชื่อประเภทวัสดุ : </td>";
	echo"<td><input class=\"ipstock\" type=\"text\" name=\"txtkindname\" id=\"txtkindname\"/></td>";
	echo"</tr>";
	echo"<tr>";
	echo"<td>&nbsp;</td>";
	echo"<td><input type=\"submit\" class=\"btadmin\" name=\"smunit\" value=\"เพิ่มข้อมูล\" />&nbsp;<input type=\"reset\" class=\"btadmin\" value=\"ล้างข้อมุล\" /></td>";
	echo"</tr>";
	echo"</table>";
	echo"</form>";
	echo"</div>";
	echo"<div id=\"hrStock\">";
	echo"<p>รายการประเภทวัสดุ</p>";
	echo"<table width=\"400\" cellpadding=\"1\" cellspacing=\"1\">";
	echo"<tr height=\"30\" bgcolor=\"#FFA0F0\" onMouseOver=\"switchBg(this, 'trIn')\" onMouseOut=\"switchBg(this, 'trOut')\">";
	echo"<td align=\"center\"><b>ชื่อประเภทวัสดุ</b></td>";
	echo"<td align=\"center\"><b>ปรับปรุง</b></td>";
	echo"<td width=\"80\" align=\"center\"><b>เพิ่มวัสดุในประเภท</b></td>";
	echo"</tr>";
	$sqlkind="Select * From stock_tb_kind Order by kindid";
	mysql_query("SET NAMES utf8");
	$rs=mysql_query($sqlkind);
	if(mysql_num_rows($rs)==0){
		echo"<tr height=\"30\" bgcolor=\"#FFFFFF\">";
		echo"<td colspan=\"3\" align=\"center\">- - - - - - ยังไม่มีข้อมูลหน่วยนับวัสดุ - - - - - - </td>";
		echo"</tr>";
	}else{
		while($row=mysql_fetch_array($rs)){
			echo"<tr bgcolor=\"#FFFFFF\" height=\"25\">";
			echo"<td>&nbsp;".$row['kindname']."</td>";
			echo"<td align=\"center\"><a href=\"index.php?option=hrstock&com_stock=configunit&type=kind&edit=".$row['kindid']."\"><img	src=\"images/edit_24.png\" border=\"0\" width=\"18\"/></a>&nbsp;<a href=\"index.php?option=hrstock&com_stock=configunit&type=kind&del=".$row['kindid']."\" onclick=\"return confirm('คุณต้องการลบ หน่วย : ".$row['kindname']." นี้หรือไม่ ?');\"><img src=\"images/del_24.png\" border=\"0\" width=\"18\"/></a></td>";
			echo"<td align=\"center\"><a href=\"index.php?option=hrstock&com_stock=configunit&type=kind&addkind=".$row['kindid']."\"><img src=\"images/add_24.png\" border=\"0\" width=\"18\"/></a></td>";
			echo"</tr>";
		}
	}
	echo"</table>";
	echo"</div>";
}
?>