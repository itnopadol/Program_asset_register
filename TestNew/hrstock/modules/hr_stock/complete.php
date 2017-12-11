<?php
session_start();
chkSess();
$sql="Select * From stock_tb_beg_master Where datebeg='$timedate' And statusbeg='0'"; // ค้นหาจำนวนขอเิบิืก ณ วันนี้
mysql_query("SET NAMES utf8");
$rs=mysql_query($sql);
$today=mysql_num_rows($rs);

$sql="Select * From stock_tb_beg_master Where datebeg<'$timedate' And statusbeg='0'"; // ค้นหาจำนวนขอเบิก ณ วันก่อนหน้า
mysql_query("SET NAMES utf8");
$rs=mysql_query($sql);
$yesterday=mysql_num_rows($rs);

$sql="Select * From stock_tb_beg_master Where statusbeg='C'"; // ค้นหาจำนวนขอเบิกที่ถูกยกเลิกรายการ
mysql_query("SET NAMES utf8");
$rs=mysql_query($sql);
$begfail=mysql_num_rows($rs);
?>
<div id="hrStock">
<p style="font-weight:bold;font-size:14px;color:red;">รายการขออนุมัติ</p>
	<div id="box">
	<p style="margin:5px;">[&nbsp;<a href="index.php?option=hrstock&com_stock=begcomplete&type=today" class="cout2">รายการ ขออนุมัติ วันนี้&nbsp;<b style="color:red;"><?php echo $today;?></b>&nbsp;รายการ</a>&nbsp;]&nbsp;&nbsp;<input class="ipstock" type="text" name="searchq" id="searchq" maxlength="30" style="float:right;padding-left:18px;height:18px;background:url('images/srch.gif') left top;background-repeat:repeat-y;width:45%;" onkeydown="javascript:if(event.keyCode==13){window.location.href='index.php?option=hrstock&com_stock=begcomplete&type=search&keyword='+document.getElementById('searchq').value;}" /></p>
	<p style="margin:5px;">[&nbsp;<a href="index.php?option=hrstock&com_stock=begcomplete&type=yesterday" class="cout2">รายการ ที่ยังไม่ได้ทำรายการอนุมัติ&nbsp;<b style="color:red;"><?php echo $yesterday;?></b>&nbsp;รายการ</a>&nbsp;]&nbsp;</p>
	<p style="margin:5px;">[&nbsp;<a href="index.php?option=hrstock&com_stock=begcomplete&type=begfail" class="cout2">รายการที่ถูกยกเลิก&nbsp;<b style="color:red;"><?php echo $begfail;?></b>&nbsp;รายการ</a>&nbsp;]&nbsp;</p>
	</div>
</div>
<?php
if(isset($_GET['type'])){
	if($_GET['type']=="today"){
		?>
		<div id="hrStock">
		<p>รายการขอเบิกวันนี้&nbsp;<b style="color:blue;"><?php echo thaidate($timedate);?></b>&nbsp;[&nbsp;<b style="color:red;"><?php echo $today;?></b>&nbsp;รายการ&nbsp;]</p>
		<table width="580" cellpadding="1" cellspacing="1" border="0" style="border:1px solid;">
			<tr height="25" bgcolor="#FB90DE">
				<td width="50" align="center">ลำดับที่</td>
				<td width="170" align="center">ผู้ขอเบิก</td>
				<td width="210" align="center">ส่วนงาน</td>
				<td width="80" align="center">จำนวนรายการที่ขอเบิก</td>
				<td width="80" align="center">ทำรายการ</td>
			</tr>
			<?php
			$sql="Select stock_tb_beg_master.*,count(stock_tb_beg_master_sub.nobeg) as total,tb_user.nameuser,tb_user.surname,tb_department.depname From stock_tb_beg_master INNER JOIN stock_tb_beg_master_sub ON stock_tb_beg_master.nobeg=stock_tb_beg_master_sub.nobeg INNER JOIN tb_user ON stock_tb_beg_master.iduser=tb_user.iduser INNER JOIN tb_department ON tb_user.depid=tb_department.depid Where stock_tb_beg_master.datebeg='$timedate' and stock_tb_beg_master.statusbeg='0' GROUP BY nobeg,iduser" ;

			mysql_query("SET NAMES utf8");
			$rstoday=mysql_query($sql);
			$no=1;
			while($row=mysql_fetch_array($rstoday)){
				echo"<tr bgcolor=\"#FFFFFF\" height=\"22\" onMouseOver=\"switchBg(this, 'mOUT')\" onMouseOut=\"switchBg(this, 'mIN')\">";
				echo"<td align=\"center\">$no</td>";
				echo"<td>&nbsp;".$row['nameuser']."&nbsp;".$row['surname']."</td>";
				echo"<td>&nbsp;".$row['depname']."</td>";
				echo"<td align=\"center\">&nbsp;".$row['total']."</td>";
				echo"<td align=\"center\"><a href=\"index.php?option=hrstock&com_stock=begcomplete&type=view&id=".$row['nobeg']."\"><img src=\"images/opts.gif\" border=\"0\"/></a></td>";
				echo"</tr>";
				$no++;
			}
			?>
		</table>
		</div>
		<?php
		echo"<p style=\"margin-top:10px;text-align:left;\">สรุปรายการวัสดุที่ขอเบิกวันนี้</p>";
		$sql="Select sum(stock_tb_beg_master_sub.total) as total,stock_tb_kind_type.kindtypename,stock_tb_unit.unitname,stock_tb_beg_master.datebeg,stock_tb_beg_master.statusbeg From stock_tb_beg_master_sub INNER JOIN stock_tb_beg_master ON stock_tb_beg_master_sub.nobeg=stock_tb_beg_master.nobeg INNER JOIN stock_tb_kind_type ON stock_tb_beg_master_sub.kindtypeid=stock_tb_kind_type.kindtypeid INNER JOIN stock_tb_unit ON stock_tb_kind_type.unitid=stock_tb_unit.unitid Where stock_tb_beg_master.datebeg='$timedate' And stock_tb_beg_master.statusbeg='0'  Group by stock_tb_beg_master_sub.kindtypeid ";
		mysql_query("SET NAMES utf8");
		$rs=mysql_query($sql);
		while($row=mysql_fetch_array($rs)){
			echo"<p style=\"text-align:left;margin-left:5px;font-size:13px;\">&nbsp;".$row['kindtypename']."&nbsp;จำนวน&nbsp;:&nbsp;".$row['total']."&nbsp;".$row['unitname']."</p>";
		}
	}elseif($_GET['type']=="yesterday"){
		?>
		<div id="hrStock">
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
			$sql="Select stock_tb_beg_master.*,count(stock_tb_beg_master_sub.nobeg) as total,tb_user.nameuser,tb_user.surname,tb_department.depname From stock_tb_beg_master INNER JOIN stock_tb_beg_master_sub ON stock_tb_beg_master.nobeg=stock_tb_beg_master_sub.nobeg INNER JOIN tb_user ON stock_tb_beg_master.iduser=tb_user.iduser INNER JOIN tb_department ON tb_user.depid=tb_department.depid Where stock_tb_beg_master.datebeg<'$timedate' and stock_tb_beg_master.statusbeg='0' GROUP BY nobeg,iduser" ;
			mysql_query("SET NAMES utf8");
			$rstoday=mysql_query($sql);
			$no=1;
			while($row=mysql_fetch_array($rstoday)){
				echo"<tr bgcolor=\"#FFFFFF\" height=\"22\" onMouseOver=\"switchBg(this, 'mOUT')\" onMouseOut=\"switchBg(this, 'mIN')\">";
				echo"<td align=\"center\">$no</td>";
				echo"<td>&nbsp;".$row['nameuser']."&nbsp;".$row['surname']."</td>";
				echo"<td>&nbsp;".$row['depname']."</td>";
				echo"<td align=\"center\">&nbsp;".$row['total']."</td>";
				echo"<td align=\"center\"><a href=\"index.php?option=hrstock&com_stock=begcomplete&type=view&id=".$row['nobeg']."\"><img src=\"images/opts.gif\" border=\"0\"/></a></td>";
				echo"</tr>";
				$no++;
			}
			?>
		</table>
		</div>
	<?php
		echo"<p style=\"margin-top:10px;text-align:left;\">สรุปรายการวัสดุที่ขอเบิก</p>";
			$sql="Select sum(stock_tb_beg_master_sub.total) as total,stock_tb_kind_type.kindtypename,stock_tb_unit.unitname,stock_tb_beg_master.datebeg,stock_tb_beg_master.statusbeg From stock_tb_beg_master_sub INNER JOIN stock_tb_beg_master ON stock_tb_beg_master_sub.nobeg=stock_tb_beg_master.nobeg INNER JOIN stock_tb_kind_type ON stock_tb_beg_master_sub.kindtypeid=stock_tb_kind_type.kindtypeid INNER JOIN stock_tb_unit ON stock_tb_kind_type.unitid=stock_tb_unit.unitid Where stock_tb_beg_master.datebeg<'$timedate' And stock_tb_beg_master.statusbeg='0'  Group by stock_tb_beg_master_sub.kindtypeid ";
		mysql_query("SET NAMES utf8");
		$rs=mysql_query($sql);
		while($row=mysql_fetch_array($rs)){
			echo"<p style=\"text-align:left;margin-left:5px;font-size:13px;\">&nbsp;".$row['kindtypename']."&nbsp;จำนวน&nbsp;:&nbsp;".$row['total']."&nbsp;".$row['unitname']."</p>";
		}
	}elseif($_GET['type']=="begfail"){
		?>
		<div id="hrStock">
		<p>รายการที่ถูกยกเลิก&nbsp;[&nbsp;<b style="color:red;"><?php echo $begfail;?></b>&nbsp;รายการ&nbsp;]</p>
		<table width="580" cellpadding="1" cellspacing="1" border="0" style="border:1px solid;">
			<tr height="25" bgcolor="#FB90DE">
				<td width="50" align="center">ลำดับที่</td>
				<td width="170" align="center">ผู้ขอเบิก</td>
				<td width="210" align="center">ส่วนงาน</td>
				<td width="80" align="center">จำนวนรายการที่ขอเบิก</td>
				<td width="80" align="center">ทำรายการ</td>
			</tr>
			<?php
			$sql="Select stock_tb_beg_master.*,count(stock_tb_beg_master_sub.nobeg) as total,tb_user.nameuser,tb_user.surname,tb_department.depname From stock_tb_beg_master INNER JOIN stock_tb_beg_master_sub ON stock_tb_beg_master.nobeg=stock_tb_beg_master_sub.nobeg INNER JOIN tb_user ON stock_tb_beg_master.iduser=tb_user.iduser INNER JOIN tb_department ON tb_user.depid=tb_department.depid Where stock_tb_beg_master.statusbeg='C' GROUP BY nobeg,iduser" ;
			mysql_query("SET NAMES utf8");
			$rstoday=mysql_query($sql);
			$no=1;
			while($row=mysql_fetch_array($rstoday)){
				echo"<tr bgcolor=\"#FFFFFF\" height=\"22\" onMouseOver=\"switchBg(this, 'mOUT')\" onMouseOut=\"switchBg(this, 'mIN')\">";
				echo"<td align=\"center\">$no</td>";
				echo"<td>&nbsp;".$row['nameuser']."&nbsp;".$row['surname']."</td>";
				echo"<td>&nbsp;".$row['depname']."</td>";
				echo"<td align=\"center\">&nbsp;".$row['total']."</td>";
				echo"<td align=\"center\"><a href=\"index.php?option=hrstock&com_stock=begcomplete&type=view&id=".$row['nobeg']."\"><img src=\"images/opts.gif\" border=\"0\"/></a></td>";
				echo"</tr>";
				$no++;
			}
			?>
		</table>
		</div>
	<?php
		echo"<p style=\"margin-top:10px;text-align:left;\">สรุปรายการวัสดุที่ขอเบิก</p>";
		$sql="Select sum(stock_tb_beg_master_sub.total) as total,stock_tb_kind_type.kindtypename,stock_tb_unit.unitname,stock_tb_beg_master.datebeg,stock_tb_beg_master.statusbeg From stock_tb_beg_master_sub INNER JOIN stock_tb_beg_master ON stock_tb_beg_master_sub.nobeg=stock_tb_beg_master.nobeg INNER JOIN stock_tb_kind_type ON stock_tb_beg_master_sub.kindtypeid=stock_tb_kind_type.kindtypeid INNER JOIN stock_tb_unit ON stock_tb_kind_type.unitid=stock_tb_unit.unitid Where stock_tb_beg_master.statusbeg='C'  Group by stock_tb_beg_master_sub.kindtypeid ";
		mysql_query("SET NAMES utf8");
		$rs=mysql_query($sql);
		while($row=mysql_fetch_array($rs)){
			echo"<p style=\"text-align:left;margin-left:5px;font-size:13px;\">&nbsp;".$row['kindtypename']."&nbsp;จำนวน&nbsp;:&nbsp;".$row['total']."&nbsp;".$row['unitname']."</p>";
		}
	}elseif($_GET['type']=="view"){
		if(isset($_POST['btok'])){

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
				$sql="UPDATE stock_tb_beg_master SET datebegtotal='$timedate',statusbeg='R' Where nobeg='".$_GET['id']."'";
			}
			mysql_query("SET NAMES utf8");

			$rssave=mysql_query($sql);

			if($rssave){
				
				for($i=0;$i<count($_POST['receive']);$i++){
					$sql="UPDATE stock_tb_beg_master_sub SET receive='on',beg='".$tbeg[$i]."' Where nobeg='".$_GET['id']."' and kindtypeid='".$_POST['receive'][$i]."'";

					$rs=rsQuery($sql);
				}
				echo"<p>บันทึกข้อมูลเรียบร้อยแล้วครับ</p>";
				
				echo"<meta http-equiv=\"refresh\" content=\"1;url=index.php?option=hrstock&com_stock=begcomplete\"/>";
				exit();

			}else{
				echo mysql_error();
			}
		}
		if(isset($_POST['btcancel'])){
			$sql="UPDATE stock_tb_beg_master SET  datebegtotal='$timedate',statusbeg='C' Where nobeg='".$_GET['id']."'";
			mysql_query("SET NAMES utf8");
			$rsdel=mysql_query($sql);
			if($rsdel){
				echo"<p>บันทึกข้อมูลเรียบร้อยแล้วครับ</p>";
				echo"<meta http-equiv=\"refresh\" content=\"1;url=index.php?option=hrstock&com_stock=begcomplete\"/>";
				exit();
			}else{
				echo mysql_error();
			}
		}
		echo"<div id=\"hrStock\">";
		$sql="Select stock_tb_beg_master.*,tb_user.nameuser,tb_user.surname,tb_user.pw,tb_department.depname From stock_tb_beg_master INNER JOIN tb_user ON stock_tb_beg_master.iduser=tb_user.iduser INNER JOIN tb_department ON tb_user.depid=tb_department.depid Where nobeg='".$_GET['id']."'";
		mysql_query("SET NAMES utf8");
		$rs=mysql_query($sql);
		if(mysql_num_rows($rs)>0){
			$row=mysql_fetch_array($rs);
		}
		$chk=$row['statusbeg'];
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
		$sql="Select stock_tb_beg_master_sub.*,stock_tb_kind_type.kindtypename From stock_tb_beg_master_sub INNER JOIN stock_tb_kind_type ON stock_tb_beg_master_sub.kindtypeid=stock_tb_kind_type.kindtypeid Where stock_tb_beg_master_sub.nobeg='".$_GET['id']."' order by nobegsub";
		mysql_query("SET NAMES utf8");
		$rsdetail=mysql_query($sql);
		$q=0;
		while($arr=mysql_fetch_array($rsdetail)){

			$sqlc="Select sum(beg) as t From stock_tb_beg_master_sub INNER JOIN stock_tb_beg_master ON stock_tb_beg_master_sub.nobeg=stock_tb_beg_master.nobeg  Where kindtypeid='".$arr['kindtypeid']."' and stock_tb_beg_master_sub.receive='on' and (stock_tb_beg_master.statusbeg='1' or stock_tb_beg_master.statusbeg='R')";
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
			echo"<td align=\"center\">";


			if($chk=="0"){
				$t="";
			}else{
				$t="readonly";
			}
			 

			if($arr['receive']=="on"){
				echo"<input type=\"checkbox\" name=\"receive[]\" checked value=\"".$arr['kindtypeid']."\" /></td>";
			}else{
				echo"<input type=\"checkbox\" name=\"receive[]\" value=\"".$arr['kindtypeid']."\"/></td>";
			}
			echo"<td>&nbsp;".$arr['kindtypename']."</td>";
			echo"<td>&nbsp;".$arr['forbeg']."</td>";
			echo"<td align=\"right\">&nbsp;".$arr['total']."&nbsp;</td>";
			echo"<td align=\"right\">$total&nbsp;</td>";

			$sbeg=$arr['beg'];
			if($sbeg==""){
				$sbeg="0";
			}
			
			if($t==""){
				echo"<td>&nbsp;<input type=\"text\" name=\"txtbeg[]\" value=\"$sbeg\" class=\"ipstock\" style=\"text-align:right;width:90%;\" autocomplete=\"off\" /></td>";
			}else{
				echo"<td>&nbsp;<input type=\"text\" name=\"txtbeg[]\" value=\"$sbeg\" class=\"ipstock\" readonly=\"$t\" style=\"text-align:right;width:90%;\" autocomplete=\"off\" /></td>";
			}
				echo"</tr>";
			$q++;
		}
		echo"</table>";
		echo"<br /><br />";
		if($t==""){
			echo"<input type=\"submit\" name=\"btok\" value=\"\" style=\"margin-left:10px;width:32px;height:32px;border:0px;background:url('images/opts_32.png');\" /><input type=\"submit\" name=\"btcancel\" value=\"\" style=\"margin-left:10px;width:32px;height:32px;border:0px;background:url('images/close_32.png');\" onclick=\"return confirm('คุณต้องการยกเลิกรายการเบิกนี้หรือไม่');\" />";
		}
		echo"</form>";
	echo"</div>";
	}elseif($_GET['type']=="search"){
		?>
		<div id="hrStock">
		<p>รายการที่ถูกค้นหา&nbsp;[&nbsp;<b style="color:red;"><?php echo $begfail;?></b>&nbsp;รายการ&nbsp;]</p>
		<table width="580" cellpadding="1" cellspacing="1" border="0" style="border:1px solid;">
			<tr height="25" bgcolor="#FB90DE">
				<td width="50" align="center">ลำดับที่</td>
				<td width="170" align="center">ผู้ขอเบิก</td>
				<td width="210" align="center">ส่วนงาน</td>
				<td width="80" align="center">จำนวนรายการที่ขอเบิก</td>
				<td width="80" align="center">ทำรายการ</td>
			</tr>
			<?php
			$sql="Select stock_tb_beg_master.*,count(stock_tb_beg_master_sub.nobeg) as total,tb_user.nameuser,tb_user.surname,tb_department.depname From stock_tb_beg_master INNER JOIN stock_tb_beg_master_sub ON stock_tb_beg_master.nobeg=stock_tb_beg_master_sub.nobeg INNER JOIN tb_user ON stock_tb_beg_master.iduser=tb_user.iduser INNER JOIN tb_department ON tb_user.depid=tb_department.depid Where stock_tb_beg_master.nobeg='".trim($_GET['keyword'])."' GROUP BY nobeg,iduser" ;
			mysql_query("SET NAMES utf8");
			$rstoday=mysql_query($sql);
			$no=1;
			if(mysql_num_rows($rstoday)==0){
				echo"<tr height=\"30\" bgcolor=\"#FFFFFF\"><td colspan=\"5\" align=\"center\">หมายเลขเบิก : ".$_GET['keyword']." อาจไม่มีในระบบ</td></tr>";
			}else{
				while($row=mysql_fetch_array($rstoday)){
					echo"<tr bgcolor=\"#FFFFFF\" height=\"22\" onMouseOver=\"switchBg(this, 'mOUT')\" onMouseOut=\"switchBg(this, 'mIN')\">";
					echo"<td align=\"center\">$no</td>";
					echo"<td>&nbsp;".$row['nameuser']."&nbsp;".$row['surname']."</td>";
					echo"<td>&nbsp;".$row['depname']."</td>";
					echo"<td align=\"center\">&nbsp;".$row['total']."</td>";
					echo"<td align=\"center\"><a href=\"index.php?option=hrstock&com_stock=begcomplete&type=view&id=".$row['nobeg']."\"><img src=\"images/opts.gif\" border=\"0\"/></a></td>";
					echo"</tr>";
					$no++;
				}
			}
			?>
		</table>
		</div>
	<?php
		echo"<p style=\"margin-top:10px;text-align:left;\">สรุปรายการวัสดุที่ขอเบิก</p>";
		$sql="Select sum(stock_tb_beg_master_sub.total) as total,stock_tb_kind_type.kindtypename,stock_tb_unit.unitname,stock_tb_beg_master.datebeg,stock_tb_beg_master.statusbeg From stock_tb_beg_master_sub INNER JOIN stock_tb_beg_master ON stock_tb_beg_master_sub.nobeg=stock_tb_beg_master.nobeg INNER JOIN stock_tb_kind_type ON stock_tb_beg_master_sub.kindtypeid=stock_tb_kind_type.kindtypeid INNER JOIN stock_tb_unit ON stock_tb_kind_type.unitid=stock_tb_unit.unitid Where stock_tb_beg_master.nobeg='".$_GET['keyword']."'  Group by stock_tb_beg_master_sub.kindtypeid ";
		mysql_query("SET NAMES utf8");
		$rs=mysql_query($sql);
		while($row=mysql_fetch_array($rs)){
			echo"<p style=\"text-align:left;margin-left:5px;font-size:13px;\">&nbsp;".$row['kindtypename']."&nbsp;จำนวน&nbsp;:&nbsp;".$row['total']."&nbsp;".$row['unitname']."</p>";
		}
	}
}

