<?php
session_start();
session_register("pw5");
chkSess();
$sql="Select * From stock_tb_beg_master Where datebeg='$timedate' And statusbeg='R'"; // ค้นหาจำนวนขอเิบิืก ณ วันนี้
mysql_query("SET NAMES utf8");
$rs=mysql_query($sql);
$today=mysql_num_rows($rs);

$sql="Select stock_tb_beg_master.*,stock_tb_beg_master_sub.* From stock_tb_beg_master INNER JOIN stock_tb_beg_master_sub ON stock_tb_beg_master.nobeg=stock_tb_beg_master_sub.nobeg Where stock_tb_beg_master.datebeg<'$timedate' and stock_tb_beg_master.statusbeg='R' And stock_tb_beg_master_sub.receive='on' ORDER BY stock_tb_beg_master.nobeg";

mysql_query("SET NAMES utf8");
$rs=mysql_query($sql);
$yesterday=mysql_num_rows($rs);

?>
<p style="font-weight:bold;font-size:14px;color:red;">เบิกจ่ายวัสดุ</p>
	<p style="margin:5px;">[&nbsp;<a href="index.php?option=hrstock&com_stock=begcomplete&action=receive&type=today" class="cout2">รายการ จ่าย วันนี้&nbsp;<b style="color:red;"><?php echo $today;?></b>&nbsp;รายการ</a>&nbsp;]&nbsp;&nbsp;<input class="ipstock" type="text" name="searchq" id="searchq" maxlength="30" style="float:right;padding-left:18px;height:18px;background:url('images/srch.gif') left top;background-repeat:repeat-y;width:45%;" onkeydown="javascript:if(event.keyCode==13){window.location.href='index.php?option=hrstock&com_stock=begcomplete&action=receive&type=search&keyword='+document.getElementById('searchq').value;}" /></p>
	<p style="margin:5px;">[&nbsp;<a href="index.php?option=hrstock&com_stock=begcomplete&action=receive&type=yesterday" class="cout2">รายการที่ยังไม่ได้ทำการจ่าย&nbsp;<b style="color:red;"><?php echo $yesterday;?></b>&nbsp;รายการ</a>&nbsp;]&nbsp;</p>
<?php
if(isset($_GET['type'])){
	if($_GET['type']=="today"){
		?>
		<div id="hrStock">
		<p>รายการจ่ายวันนี้&nbsp;<b style="color:blue;"><?php echo thaidate($timedate);?></b>&nbsp;[&nbsp;<b style="color:red;"><?php echo $today;?></b>&nbsp;รายการ&nbsp;]</p>
		<table width="580" cellpadding="1" cellspacing="1" border="0" style="border:1px solid;">
			<tr height="25" bgcolor="#FB90DE">
				<td width="50" align="center">ลำดับที่</td>
				<td width="170" align="center">ผู้ขอเบิก</td>
				<td width="210" align="center">ส่วนงาน</td>
				<td width="80" align="center">จำนวนรายการที่ขอเบิก</td>
				<td width="80" align="center">ทำรายการ</td>
			</tr>
			<?php
			$sql="Select stock_tb_beg_master.*,count(stock_tb_beg_master_sub.nobeg) as total,tb_user.nameuser,tb_user.surname,tb_department.depname From stock_tb_beg_master INNER JOIN stock_tb_beg_master_sub ON stock_tb_beg_master.nobeg=stock_tb_beg_master_sub.nobeg INNER JOIN tb_user ON stock_tb_beg_master.iduser=tb_user.iduser INNER JOIN tb_department ON tb_user.depid=tb_department.depid Where stock_tb_beg_master.datebeg='$timedate' and stock_tb_beg_master.statusbeg='R' And stock_tb_beg_master_sub.receive='on' GROUP BY nobeg,iduser" ;

			mysql_query("SET NAMES utf8");
			$rstoday=mysql_query($sql);
			$no=1;
			while($row=mysql_fetch_array($rstoday)){
				echo"<tr bgcolor=\"#FFFFFF\" height=\"22\" onMouseOver=\"switchBg(this, 'mOUT')\" onMouseOut=\"switchBg(this, 'mIN')\">";
				echo"<td align=\"center\">$no</td>";
				echo"<td>&nbsp;".$row['nameuser']."&nbsp;".$row['surname']."</td>";
				echo"<td>&nbsp;".$row['depname']."</td>";
				echo"<td align=\"center\">&nbsp;".$row['total']."</td>";
				echo"<td align=\"center\"><a href=\"index.php?option=hrstock&com_stock=begcomplete&action=receive&type=view&id=".$row['nobeg']."\"><img src=\"images/opts.gif\" border=\"0\"/></a></td>";
				echo"</tr>";
				$no++;
			}
			?>
		</table>
		<?php
		echo"<p style=\"margin-top:10px;text-align:left;\">สรุปรายการวัสดุที่ขอเบิกวันนี้</p>";
		$sql="Select sum(stock_tb_beg_master_sub.total) as total,stock_tb_kind_type.kindtypename,stock_tb_unit.unitname,stock_tb_beg_master.datebeg,stock_tb_beg_master.statusbeg From stock_tb_beg_master_sub INNER JOIN stock_tb_beg_master ON stock_tb_beg_master_sub.nobeg=stock_tb_beg_master.nobeg INNER JOIN stock_tb_kind_type ON stock_tb_beg_master_sub.kindtypeid=stock_tb_kind_type.kindtypeid INNER JOIN stock_tb_unit ON stock_tb_kind_type.unitid=stock_tb_unit.unitid Where stock_tb_beg_master.datebeg='$timedate' And stock_tb_beg_master.statusbeg='R' And stock_tb_beg_master_sub.receive='on' Group by stock_tb_beg_master_sub.kindtypeid ";
		mysql_query("SET NAMES utf8");
		$rs=mysql_query($sql);
		while($row=mysql_fetch_array($rs)){
			echo"<p style=\"text-align:left;margin-left:5px;font-size:13px;\">&nbsp;".$row['kindtypename']."&nbsp;จำนวน&nbsp;:&nbsp;".$row['total']."&nbsp;".$row['unitname']."</p>";
		}
	}elseif($_GET['type']=="yesterday"){
		?>
		<p>รายการที่ยังไม่ได้ทำการจ่าย&nbsp;[&nbsp;<b style="color:red;"><?php echo $yesterday;?></b>&nbsp;รายการ&nbsp;]</p>
		<table width="580" cellpadding="1" cellspacing="1" border="0" style="border:1px solid;">
			<tr height="25" bgcolor="#FB90DE">
				<td width="50" align="center">ลำดับที่</td>
				<td width="170" align="center">ผู้ขอเบิก</td>
				<td width="210" align="center">ส่วนงาน</td>
				<td width="80" align="center">จำนวนรายการที่ขอเบิก</td>
				<td width="80" align="center">ทำรายการ</td>
			</tr>
			<?php
			$sql="Select stock_tb_beg_master.*,count(stock_tb_beg_master_sub.nobeg) as total,tb_user.nameuser,tb_user.surname,tb_department.depname From stock_tb_beg_master INNER JOIN stock_tb_beg_master_sub ON stock_tb_beg_master.nobeg=stock_tb_beg_master_sub.nobeg INNER JOIN tb_user ON stock_tb_beg_master.iduser=tb_user.iduser INNER JOIN tb_department ON tb_user.depid=tb_department.depid Where stock_tb_beg_master.datebeg<'$timedate' and stock_tb_beg_master.statusbeg='R' And stock_tb_beg_master_sub.receive='on' GROUP BY nobeg,iduser" ;
			mysql_query("SET NAMES utf8");
			$rstoday=mysql_query($sql);
			$no=1;
			while($row=mysql_fetch_array($rstoday)){
				echo"<tr bgcolor=\"#FFFFFF\" height=\"22\" onMouseOver=\"switchBg(this, 'mOUT')\" onMouseOut=\"switchBg(this, 'mIN')\">";
				echo"<td align=\"center\">$no</td>";
				echo"<td>&nbsp;".$row['nameuser']."&nbsp;".$row['surname']."</td>";
				echo"<td>&nbsp;".$row['depname']."</td>";
				echo"<td align=\"center\">&nbsp;".$row['total']."</td>";
				echo"<td align=\"center\"><a href=\"index.php?option=hrstock&com_stock=begcomplete&action=receive&type=view&id=".$row['nobeg']."\"><img src=\"images/opts.gif\" border=\"0\"/></a></td>";
				echo"</tr>";
				$no++;
			}
			?>
		</table>
	<?php
		echo"<p style=\"margin-top:10px;text-align:left;\">สรุปรายการวัสดุที่ขอเบิก</p>";
			$sql="Select sum(stock_tb_beg_master_sub.total) as total,stock_tb_kind_type.kindtypename,stock_tb_unit.unitname,stock_tb_beg_master.datebeg,stock_tb_beg_master.statusbeg From stock_tb_beg_master_sub INNER JOIN stock_tb_beg_master ON stock_tb_beg_master_sub.nobeg=stock_tb_beg_master.nobeg INNER JOIN stock_tb_kind_type ON stock_tb_beg_master_sub.kindtypeid=stock_tb_kind_type.kindtypeid INNER JOIN stock_tb_unit ON stock_tb_kind_type.unitid=stock_tb_unit.unitid Where stock_tb_beg_master.datebeg<'$timedate' And stock_tb_beg_master.statusbeg='R' And stock_tb_beg_master_sub.receive='on' Group by stock_tb_beg_master_sub.kindtypeid ";
		mysql_query("SET NAMES utf8");
		$rs=mysql_query($sql);
		while($row=mysql_fetch_array($rs)){
			echo"<p style=\"text-align:left;margin-left:5px;font-size:13px;\">&nbsp;".$row['kindtypename']."&nbsp;จำนวน&nbsp;:&nbsp;".$row['total']."&nbsp;".$row['unitname']."</p>";
		}
	}elseif($_GET['type']=="view"){

		if(isset($_POST['btok'])){
			if($_SESSION['pw5']<>md5($_POST['txtpass'])){
				echo"<p style=\"margin:10px;font-size:14px;font-weight:bold;color:red;\">กรุณาใส่รหัสผ่านของผู้เิบิกให้ถูกต้อง</p>";
			}else{

				for($i=0;$i<count($_POST['txtbeg']);$i++){
					$bb=$_POST['txtbeg'][$i];
					if($bb<>"0"){
						$tbeg[]=$bb;
					}
				}
				
					
				$chkc=count($_POST['receive']);

				if($chkc==""){
					$sql="UPDATE stock_tb_beg_master SET datebegtotal='$timedate',statusbeg='C' Where nobeg='".$_GET['id']."'";
				}else{
					$sql="UPDATE stock_tb_beg_master SET datebegtotal='$timedate',statusbeg='1' Where nobeg='".$_GET['id']."'";
				}

				
				 mysql_query("SET NAMES utf8");
				$rssave=mysql_query($sql);
				if($rssave){
					$sql="Update stock_tb_beg_master_sub SET receive='' Where nobeg='".$_GET['id']."'";
					$rssss=rsQuery($sql);

					for($i=0;$i<count($_POST['receive']);$i++){
						$sql="UPDATE stock_tb_beg_master_sub SET receive='on',beg='".$tbeg[$i]."' Where nobeg='".$_GET['id']."' and kindtypeid='".$_POST['receive'][$i]."'";
						$rs=rsQuery($sql);
					}
					echo"<p>บันทึกข้อมูลเรียบร้อยแล้วครับ</p>";
					echo"<meta http-equiv=\"refresh\" content=\"1;url=index.php?option=hrstock&com_stock=begcomplete&action=receive\"/>";
					exit();
				}else{
					echo mysql_error();
				}
			}
		}
		if(isset($_POST['btcancel'])){
			if($_SESSION['pw5']<>md5($_POST['txtpass'])){
				echo"<p style=\"margin:10px;font-size:14px;font-weight:bold;color:red;\">กรุณาใส่รหัสผ่านของผู้เิบิกให้ถูกต้อง</p>";
			}else{
				$sql="UPDATE stock_tb_beg_master SET  datebegtotal='$timedate',statusbeg='C' Where nobeg='".$_GET['id']."'";
				mysql_query("SET NAMES utf8");
				$rsdel=mysql_query($sql);
				if($rsdel){
					echo"<p>บันทึกข้อมูลเรียบร้อยแล้วครับ</p>";
					echo"<meta http-equiv=\"refresh\" content=\"1;url=index.php?option=hrstock&com_stock=begcomplete&action=receive\"/>";
					exit();
				}else{
					echo mysql_error();
				}
			}
		}
		$sql="Select stock_tb_beg_master.*,tb_user.nameuser,tb_user.surname,tb_user.pw,tb_department.depname From stock_tb_beg_master INNER JOIN tb_user ON stock_tb_beg_master.iduser=tb_user.iduser INNER JOIN tb_department ON tb_user.depid=tb_department.depid Where nobeg='".$_GET['id']."'";
		mysql_query("SET NAMES utf8");
		$rs=mysql_query($sql);
		if(mysql_num_rows($rs)>0){
			$row=mysql_fetch_array($rs);
		}
		$_SESSION['pw5']=$row['pw'];
		echo"<table width=\"580\" cellspacing=\"1\" cellpadding=\"0\" border=\"0\" style=\"background:#FFFFFF;\">";
		echo"<tr height=\"22\">";
			echo"<td bgcolor=#D6EFFD width=\"180\" align=\"right\">เลขที่อ้างอิง : </td>";
			echo"<td bgcolor=#A6DDFD width=\"400\"><b>&nbsp;".$row['nobeg']."</b></td>";
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
			echo"<td width=\"40\" align=\"center\">จ่าย</td>";
			echo"<td width=\"150\" align=\"center\">รายการ</td>";
			echo"<td width=\"150\" align=\"center\">ขอเบิกเืพื่อ</td>";
			echo"<td align=\"center\">จำนวนที่ขอเบิก</td>";
			echo"<td align=\"center\">ยอดคงเหลือในสต๊อก</td>";
			echo"<td align=\"center\">จำนวนจ่ายจริง</td>";
		echo"</tr>";

		if(isset($_GET['c'])){
			$sql="Select stock_tb_beg_master_sub.*,stock_tb_kind_type.kindtypename From stock_tb_beg_master_sub INNER JOIN stock_tb_kind_type ON stock_tb_beg_master_sub.kindtypeid=stock_tb_kind_type.kindtypeid Where stock_tb_beg_master_sub.nobeg='".$_GET['id']."' order by nobegsub";
			mysql_query("SET NAMES utf8");
		}else{
			$sql="Select stock_tb_beg_master_sub.*,stock_tb_kind_type.kindtypename From stock_tb_beg_master_sub INNER JOIN stock_tb_kind_type ON stock_tb_beg_master_sub.kindtypeid=stock_tb_kind_type.kindtypeid Where stock_tb_beg_master_sub.receive='on' And stock_tb_beg_master_sub.nobeg='".$_GET['id']."' order by nobegsub";
			mysql_query("SET NAMES utf8");
		}
		
		$rsdetail=mysql_query($sql);
		$ss=1;
		while($arr=mysql_fetch_array($rsdetail)){

			$sqlc="Select sum(stock_tb_beg_master_sub.beg) as t From stock_tb_beg_master_sub INNER JOIN stock_tb_beg_master ON stock_tb_beg_master_sub.nobeg=stock_tb_beg_master.nobeg Where kindtypeid='".$arr['kindtypeid']."' And stock_tb_beg_master.statusbeg='1'";
			mysql_query("SET NAMES utf8");
			$rsc=mysql_query($sqlc);
			if(mysql_num_rows($rsc)==0){
				$beg=0;
			}else{
				$fto=mysql_fetch_array($rsc);
				$beg=$fto['t'];
			}

			$sqlc="Select sum(total) as tc From stock_tb_receive_master_sub Where kindtypeid='".$arr['kindtypeid']."'";
			mysql_query("SET NAMES utf8");
			$rsr=mysql_query($sqlc);
			if(mysql_num_rows($rsc)==0){
				$rec=0;
			}else{
				$frc=mysql_fetch_array($rsr);
				$rec=$frc['tc'];
			}
		
			$total=$rec-$beg;


			echo"<tr height=\"25\" bgcolor=\"#FFFFFF\">";
			echo"<td align=\"center\"><input type=\"checkbox\" id=\"c".$arr['kindtypeid']."\" name=\"receive[]\" value=\"".$arr['kindtypeid']."\" checked onclick=\"fnSwitch2('c".$arr['kindtypeid']."','t".$arr['kindtypeid']."');\" /></td>";
			echo"<td>&nbsp;".$arr['kindtypename']."</td>";
			echo"<td>&nbsp;".$arr['forbeg']."</td>";
			echo"<td align=\"right\">&nbsp;".$arr['total']."&nbsp;</td>";
			echo"<td align=\"right\">$total&nbsp;</td>";
			echo"<td>&nbsp;<input type=\"text\" id=\"t".$arr['kindtypeid']."\" name=\"txtbeg[]\" value=\"".$arr['beg']."\" class=\"ipstock\" style=\"text-align:right;width:90%;\" autocomplete=\"off\" /></td>";
			echo"</tr>";
		}
		echo"</table>";
		echo"<br />";
		echo"<p>รหัสผ่านผู้รับของ&nbsp;:&nbsp;<input type=\"password\" name=\"txtpass\" class=\"ipstock\" />";
		echo"<br /><br />";
		echo"<input type=\"submit\" name=\"btok\" value=\"\" style=\"margin-left:10px;width:32px;height:32px;border:0px;background:url('images/opts_32.png');\" /><input type=\"submit\" name=\"btcancel\" value=\"\" style=\"margin-left:10px;width:32px;height:32px;border:0px;background:url('images/close_32.png');\" onclick=\"return confirm('คุณต้องการยกเลิกรายการเบิกนี้หรือไม่');\" />";
		echo"</form>";
	}elseif($_GET['type']=="search"){
		?>
		<p>รายการที่ถูกค้นหา</p>
		<table width="580" cellpadding="1" cellspacing="1" border="0" style="border:1px solid;">
			<tr height="25" bgcolor="#FB90DE">
				<td width="50" align="center">ลำดับที่</td>
				<td width="170" align="center">ผู้ขอเบิก</td>
				<td width="210" align="center">ส่วนงาน</td>
				<td width="80" align="center">จำนวนรายการที่ขอเบิก</td>
				<td width="80" align="center">ทำรายการ</td>
			</tr>
			<?php
			$sql="Select stock_tb_beg_master.*,count(stock_tb_beg_master_sub.nobeg) as total,tb_user.nameuser,tb_user.surname,tb_department.depname From stock_tb_beg_master INNER JOIN stock_tb_beg_master_sub ON stock_tb_beg_master.nobeg=stock_tb_beg_master_sub.nobeg INNER JOIN tb_user ON stock_tb_beg_master.iduser=tb_user.iduser INNER JOIN tb_department ON tb_user.depid=tb_department.depid Where stock_tb_beg_master.nobeg='".$_GET['keyword']."' And stock_tb_beg_master_sub.receive='on' GROUP BY nobeg,iduser" ;
			mysql_query("SET NAMES utf8");
			$rstoday=mysql_query($sql);
			$no=1;
			while($row=mysql_fetch_array($rstoday)){
				echo"<tr bgcolor=\"#FFFFFF\" height=\"22\" onMouseOver=\"switchBg(this, 'mOUT')\" onMouseOut=\"switchBg(this, 'mIN')\">";
				echo"<td align=\"center\">$no</td>";
				echo"<td>&nbsp;".$row['nameuser']."&nbsp;".$row['surname']."</td>";
				echo"<td>&nbsp;".$row['depname']."</td>";
				echo"<td align=\"center\">&nbsp;".$row['total']."</td>";
				echo"<td align=\"center\"><a href=\"index.php?option=hrstock&com_stock=begcomplete&action=receive&type=view&id=".$row['nobeg']."\"><img src=\"images/opts.gif\" border=\"0\"/></a></td>";
				echo"</tr>";
				$no++;
			}
			?>

	<?php
		echo"<p style=\"margin-top:10px;text-align:left;\">สรุปรายการวัสดุที่ขอเบิก</p>";
		$sql="Select sum(stock_tb_beg_master_sub.total) as total,stock_tb_kind_type.kindtypename,stock_tb_unit.unitname,stock_tb_beg_master.datebeg,stock_tb_beg_master.statusbeg From stock_tb_beg_master_sub INNER JOIN stock_tb_beg_master ON stock_tb_beg_master_sub.nobeg=stock_tb_beg_master.nobeg INNER JOIN stock_tb_kind_type ON stock_tb_beg_master_sub.kindtypeid=stock_tb_kind_type.kindtypeid INNER JOIN stock_tb_unit ON stock_tb_kind_type.unitid=stock_tb_unit.unitid Where stock_tb_beg_master.nobeg='".$_GET['keyword']."' And stock_tb_beg_master_sub.receive='on'  Group by stock_tb_beg_master_sub.kindtypeid ";
		mysql_query("SET NAMES utf8");
		$rs=mysql_query($sql);
		while($row=mysql_fetch_array($rs)){
			echo"<p style=\"text-align:left;margin-left:5px;font-size:13px;\">&nbsp;".$row['kindtypename']."&nbsp;จำนวน&nbsp;:&nbsp;".$row['total']."&nbsp;".$row['unitname']."</p>";
		}
	}
}

