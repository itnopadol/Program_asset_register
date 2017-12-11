<?php
if(!isset($_SESSION['iduser'])){
	echo"<script language=\"javascript\">window.location.href='index.php';</script>";
	exit();
}
if(isset($_GET['delkindtype'])){
	$sqldel="Delete From stock_tb_kind_type Where kindtypeid='".$_GET['delkindtype']."'";
	mysql_query("SET NAMES utf8");
	$rsdel=mysql_query($sqldel);
	if($rsdel){
		echo"<script language=\"javascript\">window.location.href='index.php?option=hrstock&com_stock=configunit&type=kind&addkind=".$_GET['addkind']."';</script>";
	}
}elseif(isset($_GET['editkindtype'])){
	if(isset($_POST['editnew'])){
		$sqledit="UPDATE stock_tb_kind_type SET kindtypename='".$_POST['txtkindtype']."',unitid='".$_POST['unit']."' Where kindtypeid='".$_GET['editkindtype']."'";
		mysql_query("SET NAMES utf8");
		$rsedit=mysql_query($sqledit);
		if($rsedit){
			echo"<script language=\"javascript\">window.location.href='index.php?option=hrstock&com_stock=configunit&type=kind&addkind=".$_GET['addkind']."';</script>";
		}
	}
	echo"<div id=\"hrStock\">";
	$sql="select kindname from stock_tb_kind where kindid='".$_GET['addkind']."'";
	mysql_query("SET NAMES utf8");
	$rs=mysql_query($sql);
	if(mysql_num_rows($rs)>0){
		$row1=mysql_fetch_array($rs);
	}
	echo"<p>ประเภทวัสดุ : ".$row1['kindname']."&nbsp;&nbsp;&nbsp;<a class=\"bl\" href=\"index.php?option=hrstock&com_stock=configunit&type=kind&addkind=".$_GET['addkind']."\">ย้อนกลับ</a></p>";
	echo"<p><u>แก้ไขรายการ</u></p>";
	$sql="Select * from stock_tb_kind_type where kindtypeid='".$_GET['editkindtype']."'";
	mysql_query("SET NAMES utf8");
	$rs=mysql_query($sql);
	if(mysql_num_rows($rs)>0){
		$rowedit=mysql_fetch_array($rs);
	}
	echo"<form name=\"frmeditunittype\" method=\"POST\" action=\"\" onsubmit=\"return chkKind2();\">";
	echo"<table width=\"580\" cellpacing=\"1\" cellpadding=\"1\" style=\"background:#FFFFFF;\">";
	echo"<tr>";
	echo"<td width=\"150\" align=\"right\">ชื่อรายการ : </td>";
	echo"<td><input id=\"txtkindtype\" class=\"ipstock\" type=\"text\" name=\"txtkindtype\" value=\"".$rowedit['kindtypename']."\" />";
	echo"</tr>";
	echo"<tr>";
	echo"<td align=\"right\">หน่วยรายการ : </td>";
	echo"<td><select id=\"unit\" name=\"unit\"><option value=\"\">- - - - - - กรุณาเลือกหน่วยนับ - - - - - -</option>";
	$sql="select * from stock_tb_unit order by unitid";
	mysql_query("SET NAMES utf8");
	$rs=mysql_query($sql);
	while($row=mysql_fetch_array($rs)){
		if($rowedit['unitid']==$row['unitid']){
			echo"<option value=\"".$row['unitid']."\" selected>".$row['unitname']."</option>";
		}else{
			echo"<option value=\"".$row['unitid']."\">".$row['unitname']."</option>";
		}
	}
	echo"</select>";
	echo"</td>";
	echo"</tr>";
	echo"<tr>";
	echo"<td>&nbsp;</td>";
	echo"<td><input name=\"editnew\" type=\"submit\" class=\"btadmin\" value=\"แ้ก้ไขรายการ\" />&nbsp;<input type=\"reset\" class=\"btadmin\" value=\"ยกเลิก\"/ onclick=\"javascript:window.location.href='index.php?option=hrstock&com_stock=configunit&type=kind&addkind=".$_GET['addkind']."';\"></td>";
	echo"</tr>";
	echo"</table>";
	echo"</form>";
	echo"</div>";
}elseif(isset($_POST['addnew'])){
	$sql="Select kindtypename From stock_tb_kind_type Where kindtypename='".$_POST['txtkindtype']."'";
	mysql_query("SET NAMES utf8");
	$rs=mysql_query($sql);
	if(mysql_num_rows($rs)>0){
		echo"<p>ชื่อรายการซ้ำ</p>";
	}else{
		$sqlsave="INSERT INTO stock_tb_kind_type(kindid,kindtypename,unitid) VALUES(";
		$sqlsave.="'".$_GET['addkind']."','".$_POST['txtkindtype']."','".$_POST['unit']."')";
		mysql_query("SET NAMES utf8");
		$rssave=mysql_query($sqlsave);
		if($rssave){
			echo"<script language=\"javascript\">window.location.href='index.php?option=hrstock&com_stock=configunit&type=kind&addkind=".$_GET['addkind']."';</script>";
		}else{
			echo"<p>".mysql_error()."</p>";
		}
	}
}else{
	echo"<div id=\"hrStock\">";
	$sql="select kindname from stock_tb_kind where kindid='".$_GET['addkind']."'";
	mysql_query("SET NAMES utf8");
	$rs=mysql_query($sql);
	if(mysql_num_rows($rs)>0){
		$row1=mysql_fetch_array($rs);
	}
	echo"<p>ประเภทวัสดุ : ".$row1['kindname']."&nbsp;&nbsp;&nbsp;<a class=\"bl\" href=\"index.php?option=hrstock&com_stock=configunit&type=kind\">ย้อนกลับ</a></p>";
	echo"<p><u>เพิ่มรายการในประเภท</u></p>";
	echo"<form name=\"frmaddunittype\" method=\"POST\" action=\"\" onsubmit=\"return chkKind2();\">";
	echo"<table width=\"580\" cellpacing=\"1\" cellpadding=\"1\" style=\"background:#FFFFFF;\">";
	echo"<tr>";
	echo"<td width=\"150\" align=\"right\">ชื่อรายการ : </td>";
	echo"<td><input id=\"txtkindtype\" class=\"ipstock\" type=\"text\" name=\"txtkindtype\" />";
	echo"</tr>";
	echo"<tr>";
	echo"<td align=\"right\">หน่วยรายการ : </td>";
	echo"<td><select id=\"unit\" name=\"unit\"><option value=\"\">- - - - - - กรุณาเลือกหน่วยนับ - - - - - -</option>";
	$sql="select * from stock_tb_unit order by unitid";
	mysql_query("SET NAMES utf8");
	$rs=mysql_query($sql);
	while($row=mysql_fetch_array($rs)){
		echo"<option value=\"".$row['unitid']."\">".$row['unitname']."</option>";
	}
	echo"</select>";
	echo"</td>";
	echo"</tr>";
	echo"<tr>";
	echo"<td>&nbsp;</td>";
	echo"<td><input name=\"addnew\" type=\"submit\" class=\"btadmin\" value=\"เพิ่มรายการ\" />&nbsp;<input type=\"reset\" class=\"btadmin\" value=\"ยกเลิก\"/></td>";
	echo"</tr>";
	echo"</table>";
	echo"</form>";
	echo"</div>";
	echo"<div id=\"hrStock\">";
	echo"<p>รายการของประเภทวัสดุ : ".$row1['kindname']."</p>";
	$sql="Select stock_tb_kind_type.*,stock_tb_unit.* From stock_tb_kind_type INNER JOIN stock_tb_unit ON stock_tb_kind_type.unitid=stock_tb_unit.unitid Where stock_tb_kind_type.kindid='".$_GET['addkind']."'";
	mysql_query("SET NAMES utf8");
	$rs=mysql_query($sql);
	echo"<table width=\"580\" cellpadding=\"1\" cellspacing=\"1\">";
	echo"<tr bgcolor=\"#007EFF\" height=\"30\">";
	echo"<td width=\"50\" align=\"center\"><b>ลำดับ</b></td>";
	echo"<td align=\"center\"><b>รายการ</b></td>";
	echo"<td align=\"center\"><b>หน่วยนับ</b></td>";
	echo"<td width=\"80\"  align=\"center\"><b>ปรับแต่ง</b></td>";
	echo"</tr>";
	if(mysql_num_rows($rs)==0){
		echo"<tr bgcolor=\"#FFFFFF\" height=\"30\">";
		echo"<td colspan=\"4\" align=\"center\">- - - - - ยังไม่มีได้มีการเพิ่มรายการใด ๆ - - - - - </td>";
		echo"</tr>";
	}else{
		$i=1;
		while($row=mysql_fetch_array($rs)){
			echo"<tr bgcolor=\"#FFFFFF\">";
			echo"<td align=\"center\">$i</td>";
			echo"<td>&nbsp;".$row['kindtypename']."</td>";
			echo"<td>&nbsp;".$row['unitname']."</td>";
			echo"<td align=\"center\"><a href=\"index.php?option=hrstock&com_stock=configunit&type=kind&addkind=9&editkindtype=".$row['kindtypeid']."\"><img src=\"images/edit_24.png\" width=\"18\" border=\"0\" /></a>&nbsp;<a href=\"index.php?option=hrstock&com_stock=configunit&type=kind&addkind=9&delkindtype=".$row['kindtypeid']."\" onclick=\"return confirm('คุณต้องการลบรายการ : ".$row['kindtypename']." นี้หรือไม่ ?');\"><img src=\"images/del_24.png\" width=\"18\" border=\"0\" /></a></td>";
			echo"</tr>";
			$i++;
		}
	}
	echo"</table>";
	echo"</div>";
}
?>