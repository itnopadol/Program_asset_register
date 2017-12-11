<?php
if(!isset($_SESSION['iduser'])){
	echo"<script language=\"javascript\">window.location.href='index.php';</script>";
	exit();
}
if(isset($_GET['deluser'])){
	$sqldel="Delete From stock_tb_module Where iduser='".$_GET['deluser']."'";
	mysql_query("SET NAMES utf8");
	$rsdel=@mysql_query($sqldel);
	if($rsdel){
		echo"<script language=\"javascript\">window.location.href='index.php?option=hrstock&com_stock=administrator';</script>";
	}else{
		echo mysql_error();
	}
}
if(isset($_GET['moduleuser'])){
	$muser=$_GET['moduleuser'];
	if($muser=="add"){
		if(isset($_POST['sbuser'])){
			$seek="Select iduser from stock_tb_module Where iduser='".$_POST['user']."'";
			mysql_query("SET NAMES utf8");
			$rsseek=mysql_query($seek);
			if(mysql_num_rows($rsseek)>0){
				echo"<p>คุณได้เพิ่มผู้ใช้นี้ไปแล้ว</p>";
			}else{
				$sqlsave="INSERT INTO stock_tb_module(iduser,typeuser) Values('".$_POST['user']."','".$_POST['type']."')";
				mysql_query("SET NAMES utf8");
				$rssave=@mysql_query($sqlsave);
				if($rssave){
					echo"<script language=\"javascript\">alert('บันทึกข้อมูลเรียบร้อย');window.location.href='index.php?option=hrstock&com_stock=administrator';</script>";
				}else{
					echo mysql_error();
				}
			}
		}
		echo"<p>เพิ่มข้อมูลผู้ใช้&nbsp;&nbsp;<a class=\"bl\" href=\"index.php?option=hrstock&com_stock=administrator\">ย้อนกลับ</a></p>";
		echo"<form name=\"frmaddmodule\" method=\"post\" action=\"\" onsubmit=\"return chkadduserstock();\">";
		echo"<table width=\"580\" cellspacing=\"1\" cellpadding=\"1\" border=\"0\" style=\"background:#FFFFFF;\">";
		echo"<tr >";
		echo"<td>ชื่อผู้ใช้งาน : </td>";
		echo"<td><select name=\"user\" id=\"user\" onclick=\"cuser();\"><option value=\"\">- - - - - - - - - - - - ชื่อผู้ใช้งาน- - - - - - - - - - - -</option>";
		$sqldep="Select depid,depname From tb_department order by depid";
		mysql_query("SET NAMES utf8");
		$rsdep=mysql_query($sqldep);
		while($dep=mysql_fetch_array($rsdep)){
			echo"<option class=\"op1\" value=\"0\">แผนก : ".$dep['depname']."</option>";
			$struser="Select iduser,nameuser,surname from tb_user where depid='".$dep['depid']."'";
			mysql_query("SET NAMES utf8");
			$rsstruser=mysql_query($struser);
			if(mysql_num_rows($rsstruser)==0){
				echo"<option class=\"op2\" value=\"1\">&nbsp;&nbsp;&nbsp;&nbsp;- - -ไม่มีพนักงาน</option>";
			}else{
				while($user=mysql_fetch_array($rsstruser)){
					echo"<option class=\"op3\" value=\"".$user['iduser']."\">&nbsp;&nbsp;&nbsp;&nbsp;".$user['nameuser']." ".$user['surname']."</option>";
				}
			}
		}
		echo"</select>";
		echo"</td>";
		echo"</tr>";
		echo"<tr>";
		echo"<td>ระดับผู้ใช้งาน : </td>";
		echo"<td><select name=\"type\" id=\"type\"><option value=\"\">- - - - - - - - - - - ระดับผู้ใช้งาน- - - - - - - - - - - </option>";
		$sqltype="Select * From stock_tb_type_user order by typeuser";
		mysql_query("SET NAMES utf8");
		$rstype=mysql_query($sqltype);
		while($type=mysql_fetch_array($rstype)){
			echo"<option value=\"".$type['typeuser']."\">".$type['typeusername']."</option>";
		}
		echo"</td>";
		echo"</tr>";
		echo"<tr>";
		echo"<td>&nbsp;</td>";
		echo"<td><input class=\"btadmin\" type=\"submit\" name=\"sbuser\" value=\"บันทึกข้อมูล\"/></td>";
		echo"</tr>";
		echo"</table>";
		echo"</form>";
	}elseif($muser=="edit"){
		echo"<p>แก้ข้อมูลประเภทการเข้าใช้งานของ User</p>";
		$sql="Select stock_tb_module.*,tb_user.nameuser,tb_user.surname From stock_tb_module INNER JOIN tb_user ON stock_tb_module.iduser=tb_user.iduser Where stock_tb_module.iduser='".$_GET['user']."'";
		mysql_query("SET NAMES utf8");
		$rs=mysql_query($sql);
		$row=mysql_fetch_array($rs);
		echo"<table width=\"450\" bgcolor=\"#FFFFFF\">";
		echo"<tr>";
		echo"<td>ชื่อ</td>";
		echo"<td>".$row['nameuser']." ".$row['surname']."</td>";
		echo"</tr>";
		echo"<td>ประเภทการเข้าใช้</td>";
		echo"<td>";
		echo"<select name=\"typeuser\"><option value=\"\">ประเภทการเข้าใช้งาน</option>";
		$sqltype="Select * From stock_tb_type_user order by typeuser";
		mysql_query("SET NAMES utf8");
		$rstype=mysql_query($sqltype);
		while($type=mysql_fetch_array($rstype)){
			if($row['typeuser']==$type['typeuser']){
				echo"<option value=\"".$type['typeuser']."\" selected>".$type['typeusername']."</option>";
			}else{
				echo"<option value=\"".$type['typeuser']."\">".$type['typeusername']."</option>";
			}
		}
		echo"</select>";
		echo"</td>";
		echo"</tr>";
		echo"</table>";
	}elseif($muser=="receive"){
		if(isset($_GET['confirm'])){
			if($_GET['confirm']=="ok"){
				$sql="UPDATE stock_tb_module SET typeuser='03' Where iduser='".$_GET['id']."'";
			}elseif($_GET['confirm']=="del"){
				$sql="DELETE From stock_tb_module Where iduser='".$_GET['id']."'";
			}
			mysql_query("SET NAMES utf8");
			$rs=mysql_query($sql);
			if($rs){
				echo"<script>window.location.href='index.php?option=hrstock&com_stock=administrator&moduleuser=receive';</script>";
			}else{
				echo mysql_error();
			}
		}
		echo"<p>ผู้ที่ร้องขอเข้าใช้งานโมดูล HR STOCK</p>";
		$sql="Select stock_tb_module.*,tb_user.nameuser,tb_user.surname,tb_department.depname From stock_tb_module INNER JOIN tb_user ON stock_tb_module.iduser=tb_user.iduser INNER JOIN tb_department ON tb_user.depid=tb_department.depid Where stock_tb_module.typeuser=''";
		mysql_query("SET NAMES utf8");
		$rs=mysql_query($sql);
		echo"<table width=\"550\" style='background:#F1F1F1;'>";
		echo"<tr>";
		echo"<td width=\"180\" align=\"center\">ชื่อ - นามสกุล</td>";
		echo"<td width=\"190\" align=\"center\">แผนก</td>";
		echo"<td width=\"80\" align=\"center\">ปรับปรุง</td>";
		echo"</tr>";
		if(mysql_num_rows($rs)==0){
			echo"<tr height=\"25\" bgcolor=\"#FFFFFF\">";
			echo"<td align=\"center\" colspan=\"3\">- - - - ไม่มีผู้ร้องขอ - - - -</td>";
			echo"</tr>";
		}else{
			while($row=mysql_fetch_array($rs)){
				echo"<tr height=\"25\" bgcolor=\"#FFFFFF\">";
				echo"<td>&nbsp;".$row['nameuser']." ".$row['surname']."</td>";
				echo"<td>&nbsp;".$row['depname']."</td>";
				echo"<td align=\"center\"><a href=\"index.php?option=hrstock&com_stock=administrator&moduleuser=receive&confirm=ok&id=".$row['iduser']."\"><img src=\"images/opts_32.png\" border=\"0\" width=\"25\"/></a>&nbsp;&nbsp;<a href=\"index.php?option=hrstock&com_stock=administrator&moduleuser=receive&confirm=del&id=".$row['iduser']."\" onclick=\"return confirm('คุณต้องการที่จะลบ User name นี้ออกจากการขอใช้บริการหรือไม่?')\"><img src=\"images/close_32.png\" border=\"0\" width=\"25\"/></a></td>";
				echo"</tr>";
			}
		}
		echo"</table>";
		echo"</center>";
	}
}else{
	echo"<p><u>กำหนดสิทธิ์ผู้เข้าใช้งานโมดูล HR Stock</u>&nbsp;&nbsp;<a class=\"bl\" href=\"index.php?option=hrstock&com_stock=administrator&moduleuser=add\">เพิ่มผุ้ใช้งาน</a>";
	$sql="Select * from stock_tb_module where typeuser=''";
	mysql_query("SET NAMES utf8");
	$rssee=mysql_query($sql);
	echo"&nbsp;|&nbsp;<a class=\"bl\" href=\"index.php?option=hrstock&com_stock=administrator&moduleuser=receive\">มีผู้ร้องขอเข้าใช้งานโมดูลนี้&nbsp;".mysql_num_rows($rssee)."&nbsp;คน</a>";	
	echo"</p>";
	$sqluser="Select stock_tb_module.*,tb_user.nameuser,tb_user.surname,stock_tb_type_user.typeusername,tb_department.depname From stock_tb_module INNER JOIN tb_user ON stock_tb_module.iduser = tb_user.iduser INNER JOIN stock_tb_type_user ON stock_tb_module.typeuser = stock_tb_type_user.typeuser INNER JOIN tb_department ON tb_user.depid=tb_department.depid ORDER BY stock_tb_module.no";
	mysql_query("SET NAMES utf8");
	$rsuser=@mysql_query($sqluser);
	echo"<table class=\"tb\" width=\"580\" cellspacing=\"1\" cellpadding=\"1\" border=\"0\">";
	echo"<tr height=\"30\" bgcolor=\"#FF62D5\">";
	echo"<td align=\"center\"><b>ลำดับที่</b></td>";
	echo"<td align=\"center\"><b>ชื่อ - สกุล</b></td>";
	echo"<td align=\"center\"><b>แผนก</b></td>";
	echo"<td align=\"center\"><b>ระดับของผู้ใช้</b></td>";
	echo"<td align=\"center\"><b>ปรับแต่ง</b></td>";
	echo"</tr>";
	if(mysql_num_rows($rsuser)==0){
		echo"<tr height=\"30\" bgcolor=\"#FFFFFF\">";
		echo"<td colspan=\"5\" align=\"center\"> - - - - - ยังไม่มีผู้ใช้ใน โมดูล HR Stock นี้ - - - - - </td>";
		echo"</tr>";
	}else{
		$i=1;
		while($row=mysql_fetch_array($rsuser)){
			echo"<tr height=\"25\" bgcolor=\"#FFFFFF\" onMouseOver=\"switchBg(this, 'trIn')\" onMouseOut=\"switchBg(this, 'trOut')\">";
			echo"<td align=\"center\">$i</td>";
			echo"<td>&nbsp;".$row['nameuser']." ".$row['surname']."</td>";
			echo"<td>&nbsp;".$row['depname']."</td>";
			echo"<td>&nbsp;".$row['typeusername']."</td>";
			echo"<td align=\"center\"><a class=\"bl\" href=\"index.php?option=hrstock&com_stock=administrator&moduleuser=edit&user=".$row['iduser']."\"><img src=\"images/edit_24.png\" width=\"18\" border=\"0\" /></a>&nbsp;<a href=\"index.php?option=hrstock&com_stock=administrator&deluser=".$row['iduser']."\" onclick=\"return confirm('คุณต้องการลบ คุณ ".$row['nameuser']." ".$row['surname']." ออกจากโมดูลนี้หรือไม่ ?');\"><img src=\"images/del_24.png\" width=\"18\" border=\"0\" /></a></td>";
			echo"</tr>";
			$i++;
		}
	}
	echo"</table>";
}
?>