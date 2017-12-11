<div id="hrStock">
<?php
chkSess();
if(isset($_GET['action'])){
	$sql="Select stock_tb_beg_master.*,tb_user.nameuser,tb_user.surname,tb_user.pw,tb_department.depname From stock_tb_beg_master INNER JOIN tb_user ON stock_tb_beg_master.iduser=tb_user.iduser INNER JOIN tb_department ON tb_user.depid=tb_department.depid Where nobeg='".$_GET['id']."'";
		mysql_query("SET NAMES utf8");
		$rs=mysql_query($sql);
		if(mysql_num_rows($rs)>0){
			$row=mysql_fetch_array($rs);
		}
		echo"<a class=\"bl\" href=\"javascript:window.history.back();\">ย้อนกลับ</a>";
		echo"<table width=\"580\" cellspacing=\"1\" cellpadding=\"0\" border=\"0\" style=\"background:#FFFFFF;\">";
		echo"<tr height=\"22\">";
			echo"<td bgcolor=#D6EFFD width=\"180\" align=\"right\">สถานการเบิก : </td>";
			if($row['statusbeg']=="0"){
				$sbeg="ยังไม่ได้ทำรายการ";
			}elseif($row['statusbeg']=="1"){
				$sbeg="<font style=\"color:green;\">เสร็จสมบูรณ์</font>";
			}elseif($row['statusbeg']=="R"){
				$sbeg="<img src=\"images/opts.gif\" width=\"20\"/>&nbsp;<font style=\"color:green;\">อนุมัติการเบิก</font>";
			}else{
				$sbeg="<img src=\"images/del_24.png\" width=\"20\"/>&nbsp;<font style=\"color:red;\">ยกเลิกรายการ</font>";
			}
			echo"<td bgcolor=#A6DDFD width=\"400\"><b>&nbsp;$sbeg</b></td>";
		echo"</tr>";
		echo"<tr height=\"22\">";
			echo"<td bgcolor=#D6EFFD align=\"right\">วันที่ทำรายการ : </td>";
			echo"<td bgcolor=#A6DDFD><b>&nbsp;".thaidate($row['datedo'])."</b></td>";
		echo"</tr>";
		echo"<tr height=\"22\">";
			echo"<td bgcolor=#D6EFFD align=\"right\">วันที่ต้องการเบิก : </td>";
			echo"<td bgcolor=#A6DDFD><b>&nbsp;".thaidate($row['datebeg'])."</b></td>";
		echo"</tr>";
		echo"<tr height=\"22\">";
			echo"<td bgcolor=#D6EFFD align=\"right\">ผู้ขอเบิก: </td>";
			echo"<td bgcolor=#A6DDFD><b>&nbsp;".$row['nameuser']."&nbsp;".$row['surname']."</b></td>";
		echo"</tr>";
		echo"<tr height=\"22\">";
			echo"<td bgcolor=#D6EFFD align=\"right\">แผนก: </td>";
			echo"<td bgcolor=#A6DDFD><b>&nbsp;".$row['depname']."</b></td>";
		echo"</tr>";
		echo"</table>";
		// รายละเอียด
		echo"<form name=\"frmbegcomplete\" method=\"POST\" action=\"\">";
		echo"<table width=\"580\" cellspacing=\"1\" cellpadding=\"0\" border=\"0\" style=\"background:#73D85F;\">";
		echo"<tr bgcolor=\"#FAD9DD\" height=\"30\">";
			echo"<td width=\"\" align=\"center\">จ่าย</td>";
			echo"<td width=\"320\" align=\"center\">รายการ</td>";
			echo"<td width=\"80\" align=\"center\">จำนวนที่ขอเบิก</td>";
			echo"<td width=\"80\" align=\"center\">จำนวนอนุมัติ</td>";
		echo"</tr>";
		$sql="Select stock_tb_beg_master_sub.*,stock_tb_kind_type.kindtypename From stock_tb_beg_master_sub INNER JOIN stock_tb_kind_type ON stock_tb_beg_master_sub.kindtypeid=stock_tb_kind_type.kindtypeid Where stock_tb_beg_master_sub.nobeg='".$_GET['id']."' order by nobegsub";
		mysql_query("SET NAMES utf8");
		$rsdetail=mysql_query($sql);
		while($arr=mysql_fetch_array($rsdetail)){
			echo"<tr height=\"25\" bgcolor=\"#FFFFFF\" onMouseOver=\"switchBg(this, 'mOUT')\" onMouseOut=\"switchBg(this, 'mIN')\">";
			echo"<td align=\"center\">";
			if($arr['receive']=="on"){
				echo"<img src=\"images/opts.gif\" width=\"20\"/>&nbsp;<font style=\"font-bold:weight;color:green;\">จ่าย</font>";
			}elseif($arr['receive']==""){
				if($row['statusbeg']=="0"){
					echo"-";
				}else{
					echo"<img src=\"images/del_24.png\" width=\"20\"/>&nbsp;<font style=\"font-bold:weight;color:red;\">ไม่จ่าย</font>";
				}
			}
			echo"</td>";
			echo"<td>&nbsp;".$arr['kindtypename']."</td>";
			echo"<td align=\"right\">&nbsp;".$arr['total']."&nbsp;</td>";
			echo"<td align=\"right\">&nbsp;".$arr['beg']."&nbsp;</td>";
			echo"</tr>";
		}
		echo"</table>";
}else{	
	$sql="Select stock_tb_beg_master.* From stock_tb_beg_master Where stock_tb_beg_master.iduser='".$_SESSION['iduser']."' Order by nobeg DESC";
	mysql_query("SET NAMES utf8");
	$rs=mysql_query($sql);
	$numtotal=mysql_num_rows($rs);
	?>
	<p>ประวัติการเบิกวัสดุของคุณ&nbsp;:&nbsp;<?php echo $numtotal;?>&nbsp;รายการ</p>
	<center>
	<table width="580" cellpadding="1" cellspacing="1" border="0">
		<tr height="25">
		<td align="center"><b>หมายเลขอ้างอิง</b></td>
		<td align="center"><b>วันที่ทำรายการ</b></td>
		<td align="center"><b>วันที่ขอเบิก</b></td>
		<td align="center"><b>การจ่าย</b></td>
		<td align="center"><b>รายการ</b></td>
	</tr>
	<?php
	mysql_query("SET NAMES utf8");
	$rs=mysql_query($sql);
	while($row=mysql_fetch_array($rs)){
		echo"<tr height=\"22\" bgcolor=\"#FFFFFF\" onMouseOver=\"switchBg(this, 'mOUT')\" onMouseOut=\"switchBg(this, 'mIN')\">";
		echo"<td>&nbsp;".$row['nobeg']."</td>";
		echo"<td>&nbsp;".thaidate($row['datedo'])."</td>";
		echo"<td>&nbsp;".thaidate($row['datebeg'])."</td>";
		echo"<td align=\"center\">";
		if($row['statusbeg']=="0"){
			echo"ยังไม่ได้มีการทำรายการ";
		}elseif($row['statusbeg']=="1"){
			echo"<img src=\"images/flag_24.gif\" width=\"15\"/>&nbsp;<font style=\"color:blue;font-weight:bold\">เสร็จสมบูรณ์</font>";
		}elseif($row['statusbeg']=="R"){
			echo"<img src=\"images/opts.gif\" width=\"15\"/>&nbsp;<font style=\"color:green;\">อนุัมัติเบิก</font>";
		}elseif($row['statusbeg']=="C"){
			echo"<img src=\"images/del_24.png\" width=\"15\"/>&nbsp;<font style=\"color:red;\">ยกเลิก</font>";
		}
		echo"</td>";
		echo"<td align=\"center\"><a href=\"index.php?option=hrstock&com_stock=history&action=view&id=".$row['nobeg']."\"><img src=\"images/opts_32.png\" width=\"22\" border=\"0\"/></a></td>";
		echo"</tr>";
	}
	?>
	</table>
	</center>
<?php
}
?>
</div>