<?php
if(!isset($_SESSION['iduser'])){
	echo"<script language=\"javascript\">window.location.href='index.php';</script>";
	exit();
}
if(isset($_POST['sbadd'])){

	$e=explode("-",$_POST['txtdate']);
	$d=$e[2]."-".$e[0]."-".$e[1];


	$sqlsave="INSERT INTO stock_tb_receive_master(po,datedo,datereceive,iduser,supplierid) Values(";
	$sqlsave.="'".$_POST['txtpo']."','".$timedate."','$d','".$_SESSION['iduser']."','".$_POST['supplier']."')";
	mysql_query("SET NAMES utf8");
	$rssave=mysql_query($sqlsave);
	if($rssave){
		$selectadd="Select rid From stock_tb_receive_master ORDER BY stock_tb_receive_master.rid DESC limit 0,1";
		mysql_query("SET NAMES utf8");
		$rsadd=mysql_query($selectadd);
		if(mysql_num_rows($rsadd)>0){
			$rowadd=mysql_fetch_array($rsadd);
		}
		echo"<script language=\"javascript\">window.location.href='index.php?option=hrstock&com_stock=receivestock&receive=add&rid=".$rowadd['rid']."';</script>";
	}else{
		echo mysql_error();
	}
}elseif($_GET['delkind']){
	$sqldel="Delete From stock_tb_receive_master_sub Where no='".$_GET['delkind']."'";
	mysql_query("SET NAMES utf8");
	$rsdel=mysql_query($sqldel);
	if($rsdel){
		echo"<script language=\"javascript\">window.location.href='index.php?option=hrstock&com_stock=receivestock&receive=add&rid=".$_GET['rid']."';</script>";
	}
}elseif($_GET['rid']){
	if(isset($_POST['addkind'])){
		$sqlkind="Select * From stock_tb_receive_master_sub Where rid='".$_GET['rid']."' And kindtypeid='".$_POST['kindtype']."'";
		mysql_query("SET NAMES utf8");
		$rskind=mysql_query($sqlkind);
		if(mysql_num_rows($rskind)>0){
			echo"<script language=\"javascript\">alert('รายการนี้คุณได้ทำการเพิ่มไปแล้ว');window.location.href='index.php?option=hrstock&com_stock=receivestock&receive=add&rid=".$_GET['rid']."';</script>";
		}else{
			$sqlsave="INSERT INTO stock_tb_receive_master_sub(rid,kindtypeid,total) VALUES(";
			$sqlsave.="'".$_GET['rid']."','".$_POST['kindtype']."','".$_POST['total']."')";
			mysql_query("SET NAMES utf8");
			$rssave=mysql_query($sqlsave);
			if($rssave){
				echo"<script language=\"javascript\">window.location.href='index.php?option=hrstock&com_stock=receivestock&receive=add&rid=".$_GET['rid']."';</script>";
			}
		}
	}
	$selectadd="Select stock_tb_receive_master.*,tb_user.nameuser,tb_user.surname,stock_tb_supplier.suppliername From stock_tb_receive_master INNER JOIN stock_tb_supplier ON stock_tb_receive_master.supplierid=stock_tb_supplier.supplierid INNER JOIN tb_user ON stock_tb_receive_master.iduser=tb_user.iduser where stock_tb_receive_master.rid='".$_GET['rid']."' ORDER BY stock_tb_receive_master.rid";
		mysql_query("SET NAMES utf8");
		$rsadd=mysql_query($selectadd);
		if(mysql_num_rows($rsadd)>0){
			$rowadd=mysql_fetch_array($rsadd);
		}
		echo"<div id=\"hrStock\">";
		echo"<p>เพิ่มรายการรับวัสดุ&nbsp;&nbsp;&nbsp;<a href=\"index.php?option=hrstock&com_stock=receivestock&receive=add\" class=\"bl\">ย้อนกลับ</a></p>";
		echo"<table width=\"580\" cellpadding=\"2\" cellspacing=\"1\" border=\"0\" style=\"background:#FFFFFF;\">";
		echo"<tr height=\"25\" bgcolor=\"#E2E2E2\">";
		echo"<td colspan=\"2\">&nbsp;วันที่ทำรายการ : ".thaidate($rowadd['datedo'])."</td>";
		echo"</tr>";
		echo"<tr>";
		echo"<td align=\"right\" width=\"150\">เลขที่ PO อ้างอิง : </td>";
		echo"<td>".$rowadd['po']."</td>";
		echo"</tr>";
		echo"<tr>";
		echo"<td align=\"right\" width=\"150\">วันที่รับวัสดุ : </td>";
		echo"<td>".thaidate($rowadd['datereceive'])."</td>";
		echo"</tr>";
		echo"<tr>";
		echo"<td align=\"right\" width=\"150\">ผู้รับวัสดุ : </td>";
		echo"<td>".$rowadd['nameuser']." ".$rowadd['surname']."</td>";
		echo"</tr>";
		echo"<tr>";
		echo"<td align=\"right\" width=\"150\">Supplier : </td>";
		echo"<td>";
		$sqlsup="Select suppliername from stock_tb_supplier where supplierid='".$rowadd['supplierid']."'";
		mysql_query("SET NAMES utf8");
		$rssup=mysql_query($sqlsup);
		if(mysql_num_rows($rssup)>0){
			$rowsup=mysql_fetch_array($rssup);
			echo $rowsup['suppliername'];
		}
		echo"</td>";
		echo"</tr>";
		echo"</table>";
		echo"</div>";
		echo"<div id=\"hrStock\">";
		echo"<p>รายละเอียดรายการที่รับ</p>";
		
		echo"<table width=\"590\" cellpadding=\"0\" cellspacing=\"0\" border=\"0\" style=\"background:#FFFFFF;\">";
		echo"<tr>";
		echo"<td algin=\"left\" valign=\"top\" width=\"400\">";
			echo"<table width=\"400\" border=\"0\">";
			echo"<tr height=\"22\" bgcolor=\"#FD86E5\">";
			echo"<td align=\"center\"><b>ชื่อรายการ</b></td>";
			echo"<td align=\"center\"><b>จำนวน</b></td>";
			echo"<td align=\"center\"><b>หน่วย</b></td>";
			echo"<td align=\"center\"><b>ปรับปรุง</b></td>";
			echo"</tr>";
			$sqlkindtype="Select stock_tb_receive_master_sub.*,stock_tb_kind_type.*,stock_tb_unit.unitname From stock_tb_receive_master_sub INNER JOIN stock_tb_kind_type ON stock_tb_receive_master_sub.kindtypeid=stock_tb_kind_type.kindtypeid INNER JOIN stock_tb_unit ON stock_tb_kind_type.unitid=stock_tb_unit.unitid Where stock_tb_receive_master_sub.rid='".$_GET['rid']."' Order by stock_tb_receive_master_sub.no";
			mysql_query("SET NAMES utf8");
			$rskindtype=mysql_query($sqlkindtype);
			if(mysql_num_rows($rskindtype)==0){
				echo"<tr height=\"30\" bgcolor=\"#FFFFFF\">";
				echo"<td align=\"center\" colspan=\"4\">- - - - - ยังไม่มีการเพิ่มรายการ - - - - -</td>";
				echo"</tr>";
			}else{
				while($rowkind=mysql_fetch_array($rskindtype)){
					echo"<tr bgcolor=\"#FFFFFF\" onMouseOver=\"switchBg(this, 'trIn')\" onMouseOut=\"switchBg(this, 'trOut')\">";
					echo"<td>&nbsp;".$rowkind['kindtypename']."</td>";
					echo"<td>&nbsp;".$rowkind['total']."</td>";
					echo"<td>&nbsp;".$rowkind['unitname']."</td>";
					echo"<td align=\"center\"><a href=\"index.php?option=hrstock&com_stock=receivestock&receive=add&rid=".$_GET['rid']."&delkind=".$rowkind['no']."\" onclick=\"return confirm('คุณต้องการลบรายการ ".$rowkind['kindtypename']." นี้หรือไม่ ?');\"><img src=\"images/del_24.png\" width=\"16\" border=\"0\"/></a></td>";
					echo"</tr>";
				}
			}
			echo"</table>";
		echo"</td>";
		echo"<td algin=\"left\" valign=\"top\" width=\"180\">";
			echo"<form name=\"frmaddsub\" method=\"post\" action=\"\" onclick=\"return chkSub();\">";
			echo"<table width=\"175\" border=\"0\" style=\"border:1px solid;background:#FFFFFF;\">";
			echo"<tr>";
			echo"<td width=\"40\">วัสดุ</td>";
			echo"<td><select name=\"kindtype\" id=\"kindtype\" style=\"width:80%;\"><option>โปรดเลือกรายการ</option>";
			$sql="Select * from stock_tb_kind_type order by kindtypename";
			mysql_query("SET NAMES utf8");
			$rs=mysql_query($sql);
			while($row=mysql_fetch_array($rs)){
				echo"<option value=\"".$row['kindtypeid']."\">".$row['kindtypename']."</option>";
			}
			echo"</select></td>";
			echo"</tr>";
			echo"<tr>";
			echo"<td>จำนวน</td>";
			echo"<td><input type=\"text\" class=\"ipstock\" name=\"total\" id=\"total\" autocomplete=\"off\" style=\"width:60%;\" /></td>";
			echo"</tr>";
			echo"<td>&nbsp;</td>";
			echo"<td><input type=\"submit\" name=\"addkind\" class=\"btadmin\" value=\"เพิ่มรายการ\" />&nbsp;<input type=\"reset\" class=\"btadmin\"  value=\"ยกเลิก\" /></td>";
			echo"</tr>";
			echo"</table>";
			echo"</form>";
		echo"</td>";
		echo"</tr>";
		echo"</table>";
		echo"</div>";
}else{
	echo"<div id=\"hrStock\">";
	echo"<p>เพิ่มรายการรับวัสดุ</p>";
	echo"<form name=\"frmaddreceive\" action=\"\" method=\"POST\" onsubmit=\"return chkAddRe();\">";
	echo"<table width=\"580\" cellpadding=\"2\" cellspacing=\"1\" border=\"0\" style=\"background:#FFFFFF;\">";
	echo"<tr height=\"25\" bgcolor=\"#E2E2E2\">";
	echo"<td colspan=\"2\">&nbsp;วันที่ทำรายการ : ".thaidate($timedate)."</td>";
	echo"</tr>";
	echo"<tr>";
	echo"<td align=\"right\" width=\"150\">เลขที่ PO อ้างอิง : </td>";
	echo"<td><input class=\"ipstock\" type=\"text\" name=\"txtpo\" id=\"txtpo\" autocomplete=\"off\" /></td>";
	echo"</tr>";
	echo"<tr>";
	echo"<td align=\"right\" width=\"150\">วันที่รับวัสดุ : </td>";
	echo"<td><input class=\"ipstock\" type=\"text\" name=\"txtdate\" id=\"txtdate\" readonly=\"readonly\" onfocus=\"showCalendarControl(this);\" autocomplete=\"off\" style=\"width:20%;\" />&nbsp;<font style=\"color:red;\">ตัวอย่าง ปี-เดือน-วัน เช่น 2009-07-30 เป็นต้น</font></td>";
	echo"</tr>";
	echo"<tr>";
	echo"<td align=\"right\" width=\"150\">ผู้รับวัสดุ : </td>";
	echo"<td>".$_SESSION['nameuser']."</td>";
	echo"</tr>";
	echo"<tr>";
	echo"<td align=\"right\" width=\"150\">Supplier : </td>";
	echo"<td><select id=\"supplier\" name=\"supplier\"><option value=\"\">- - - - - - กรุณาเลือกร้านที่สั่งซื้อ - - - - - -</option>";
	$sqlsup="Select supplierid,suppliername from stock_tb_supplier order by suppliername";
	mysql_query("SET NAMES utf8");
	$rssup=mysql_query($sqlsup);
	while($rowsup=mysql_fetch_array($rssup)){
		echo"<option value=\"".$rowsup['supplierid']."\">".$rowsup['suppliername']."</option>";
	}
	echo"</select>";
	echo"</td>";
	echo"</tr>";
	echo"<tr>";
	echo"<td>&nbsp;</td>";
	echo"<td><input type=\"submit\" name=\"sbadd\" class=\"btadmin\" value=\"บันทึก\" />&nbsp;<input type=\"button\" class=\"btadmin\" value=\"ยกเลิก\" onclick=\"javascript:window.location.href='index.php?option=hrstock&com_stock=receivestock&receive=all';\"/></td>";
	echo"</tr>";
	echo"</table>";
	echo"</form>";
	echo"</div>";
}	
?>