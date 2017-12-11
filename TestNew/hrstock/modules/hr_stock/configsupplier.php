<?php
if(!isset($_SESSION['iduser'])){
	echo"<script language=\"javascript\">window.location.href='index.php';</script>";
	exit();
}
if(isset($_POST['addsup'])){
	$sqlsave="INSERT INTO stock_tb_supplier(suppliername,addr,tel,contact) VALUES(";
	$sqlsave.="'".$_POST['txtsupname']."','".$_POST['txtaddr']."','".$_POST['txttel']."','".$_POST['txtcontact']."')";
	mysql_query("SET NAME utf8");
	$rssave=mysql_query($sqlsave);
	if($rssave){
		echo"<script language=\"javascript\">window.location.href='index.php?option=hrstock&com_stock=configunit&type=supplier';</script>";
	}
}elseif(isset($_GET['editsup'])){
	if(isset($_POST['editsup'])){
		$sqledit="UPDATE stock_tb_supplier SET suppliername='".$_POST['txtsupname']."',addr='".$_POST['txtaddr']."',tel='".$_POST['txttel']."',contact='".$_POST['txtcontact']."' Where supplierid='".$_GET['editsup']."'";
		mysql_query("SET NAMES utf8");
		$rsedit=mysql_query($sqledit);
		if($rsedit){
			echo"<script language=\"javascript\">window.location.href='index.php?option=hrstock&com_stock=configunit&type=supplier';</script>";
		}
	}
	$sql="select * from stock_tb_supplier where supplierid='".$_GET['editsup']."'";
	mysql_query("SET NAMES utf8");
	$rs=mysql_query($sql);
	if(mysql_num_rows($rs)>0){
		$row=mysql_fetch_array($rs);
	}
	echo"<div id=\"hrStock\">";
	echo"<p><u>แก้ไขข้อมูล Supplier</u></p>";
	echo"<form name=\"frmeditsup\" method=\"POST\" action=\"\" onsubmit=\"return chksup();\">";
	echo"<table width=\"580\" cellspacing=\"1\" cellpadding=\"1\" style=\"background:#FFFFFF;\">";
	echo"<tr>";
	echo"<td width=\"150\" align=\"right\">ชื่อ Supplier : </td>";
	echo"<td><input class=\"ipstock\" type=\"text\" name=\"txtsupname\" id=\"txtsupname\" value=\"".$row['suppliername']."\"/>&nbsp;*</td>";
	echo"</tr>";
	echo"<tr>";
	echo"<td valign=\"top\" align=\"right\">ที่อยู่ : </td>";
	echo"<td><textarea class=\"ipstock\" name=\"txtaddr\" id=\"txtaddr\" />".$row['addr']."</textarea></td>";
	echo"</tr>";
	echo"<tr>";
	echo"<td align=\"right\">เบอร์ติดต่อ : </td>";
	echo"<td><input class=\"ipstock\"  type=\"text\" name=\"txttel\" id=\"txttel\" value=\"".$row['tel']."\" /></td>";
	echo"</tr>";
	echo"<tr>";
	echo"<td align=\"right\">ผู้ที่ติดต่อ : </td>";
	echo"<td><input class=\"ipstock\"  type=\"text\" name=\"txtcontact\" id=\"txtcontact\" value=\"".$row['contact']."\" /></td>";
	echo"</tr>";
	echo"<tr>";
	echo"<td>&nbsp;</td>";
	echo"<td><input class=\"btadmin\" type=\"submit\" name=\"editsup\" value=\"แก้ไขข้อมูล\"/>&nbsp;<input class=\"btadmin\" type=\"reset\" value=\"ยกเลิก\"/></td>";
	echo"</tr>";
	echo"</table>";
	echo"</form>";
	echo"</div>";
}elseif(isset($_GET['delsup'])){
	$sqldel="Delete From stock_tb_supplier Where supplierid='".$_GET['delsup']."'";
	mysql_query("SET NAMES utf8");
	$rsdel=mysql_query($sqldel);
	if($rsdel){
		echo"<script language=\"javascript\">window.location.href='index.php?option=hrstock&com_stock=configunit&type=supplier';</script>";
	}
}else{
	echo"<div id=\"hrStock\">";
	echo"<p><u>ตั้งค่า Supplier</u></p>";
	echo"<form name=\"frmaddsup\" method=\"POST\" action=\"\" onsubmit=\"return chksup();\">";
	echo"<table width=\"580\" cellspacing=\"1\" cellpadding=\"1\" style=\"background:#FFFFFF;\">";
	echo"<tr>";
	echo"<td width=\"150\" align=\"right\">ชื่อ Supplier : </td>";
	echo"<td><input class=\"ipstock\" type=\"text\" name=\"txtsupname\" id=\"txtsupname\" />&nbsp;*</td>";
	echo"</tr>";
	echo"<tr>";
	echo"<td valign=\"top\" align=\"right\">ที่อยู่ : </td>";
	echo"<td><textarea class=\"ipstock\" name=\"txtaddr\" id=\"txtaddr\" /></textarea></td>";
	echo"</tr>";
	echo"<tr>";
	echo"<td align=\"right\">เบอร์ติดต่อ : </td>";
	echo"<td><input class=\"ipstock\"  type=\"text\" name=\"txttel\" id=\"txttel\" /></td>";
	echo"</tr>";
	echo"<tr>";
	echo"<td align=\"right\">ผู้ที่ติดต่อ : </td>";
	echo"<td><input class=\"ipstock\"  type=\"text\" name=\"txtcontact\" id=\"txtcontact\" /></td>";
	echo"</tr>";
	echo"<tr>";
	echo"<td>&nbsp;</td>";
	echo"<td><input class=\"btadmin\" type=\"submit\" name=\"addsup\" value=\"เพิ่มข้อมูล\"/>&nbsp;<input class=\"btadmin\" type=\"reset\" value=\"ยกเลิก\"/></td>";
	echo"</tr>";
	echo"</table>";
	echo"</form>";
	echo"</div>";
	echo"<div id=\"hrStock\">";
	echo"<p><u>รายการ Supplier</u></p>";
	echo"<table width=\"580\" cellspacing=\"1\" cellpadding=\"1\">";
	echo"<tr bgcolor=\"#FFB750\" height=\"30\">";
	echo"<td width=\"50\" align=\"center\"><b>ลำดับที่</b></td>";
	echo"<td align=\"center\"><b>ชื่อ supplier</b></td>";
	echo"<td align=\"center\"><b>ผู้ติดต่อ</b></td>";
	echo"<td width=\"80\" align=\"center\"><b>ปรับแต่ง</b></td>";
	echo"</tr>";
	$sql="Select * from stock_tb_supplier order by supplierid";
	mysql_query("SET NAMES utf8");
	$rs=mysql_query($sql);
	if(mysql_num_rows($rs)==0){
		echo"<tr bgcolor=\"#FFFFFF\" height=\"30\">";
		echo"<td colspan=\"4\" align=\"center\">- - - - - ยังไม่มีการเพิ่มร้านค้า - - - - -</td>";
		echo"</tr>";
	}else{
		$i=1;
		while($row=mysql_fetch_array($rs)){
			echo"<tr bgcolor=\"#FFFFFF\">";
			echo"<td align=\"center\">$i</td>";
			echo"<td>&nbsp;".$row['suppliername']."</td>";
			echo"<td>&nbsp;".$row['contact']."</td>";
			echo"<td align=\"center\"><a href=\"index.php?option=hrstock&com_stock=configunit&type=supplier&editsup=".$row['supplierid']."\"/><img src=\"images/edit_24.png\" border=\"0\" width=\"18\"/></a>&nbsp;<a href=\"index.php?option=hrstock&com_stock=configunit&type=supplier&delsup=".$row['supplierid']."\" onclick=\"return confirm('คุณต้องการลบ supplier : ".$row['suppliername']." นี้หรือไม่?');\"/><img src=\"images/del_24.png\" border=\"0\" width=\"18\"/></td>";
			echo"</tr>";
			$i++;
		}
	}
	echo"</table>";
	echo"</div>";
}
?>