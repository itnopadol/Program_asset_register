<div id="hrStock">
<p style="font-size:14px;color:red;margin-bottom:5px;">ตรวจสอบสต๊อกวัสดุสำนักงาน</p>
<?php
echo"<p>เลือกประเภทวัสดุสำนักงาน&nbsp;:&nbsp;<select id=\"type\" name=\"type\" onclick=\"return slKind();\"><option value=\"\">- - - - - - เลือกประเภที่ต้องการ- - - - - - -</option>";
echo"<option value=\"all\">ดูประเภททั้งหมด</option>";
$sql="Select * From stock_tb_kind Order by kindid";
mysql_query("SET NAMES utf8");
$rs=mysql_query($sql);
while($row=mysql_fetch_array($rs)){
	echo"<option value=\"".$row['kindid']."\">ประเภท&nbsp;:&nbsp;".$row['kindname']."</option>";
}
echo"</select>";
?>
</div>
<div id="hrStock">
<?php
if($_GET['id']=="all"){
	echo"<p>ดูข้อมูลทั้งหมด</p>";
	echo"<table width=\"580\" cellspacing=\"1\" cellpadding=\"1\" border=\"0\">";
	echo"<tr height=\"30\" bgcolor=\"#00B9FE\">";
	echo"<td align=\"left\" width=\"301\"><b>&nbsp;รายการ</b></td>";
	echo"<td align=\"center\" width=\"93\"><b>ยอดรับ</b></td>";
	echo"<td align=\"center\" width=\"93\"><b>ยอดจ่าย</b></td>";
	echo"<td align=\"center\" width=\"93\"><b>คงเหลือ</b></td>";
	echo"</tr>";

	if(!isset($start)){
		$start = 0;
	}
	$limit = '20'; // แสดงผลหน้าละกี่หัวข้อ

	/* หาจำนวน record ทั้งหมด
	ปล. อันนี้ต้องใช้กับตัวแบ่งนะ ห้ามเอาออก*/
	$Qtotal = mysql_query("Select * From stock_tb_kind_type"); //คิวรี่ คำสั่ง
	$total = mysql_num_rows($Qtotal); // หาจำนวน record

	/*คิวรี่ข้อมูลออกมาเพื่อแสดงผล */
	$sql="Select * From stock_tb_kind_type Order by kindtypeid Limit $start,$limit";
	mysql_query("SET NAMES utf8");
	$Query = mysql_query($sql); //คิวรี่คำสั่ง
	$totalp = mysql_num_rows($Query); // หาจำนวน record ที่เรียกออกมา
	if($totalp==0){
		echo"<tr height=\"30\">";
		echo"<td colspan=\"4\" align=\"center\">- - - - - - - - - - ยังไม่มีเรื่องแจ้งซ่อมเข้ามา - - - - - - - - - -</td>";
		echo"</tr>";
		/*	วนลูปข้อมูล */
	}else{
		$i=$start;
		while($arr = mysql_fetch_array($Query)){
			
			$sqlc="Select sum(total) as t From stock_tb_receive_master_sub Where kindtypeid='".$arr['kindtypeid']."'";
			mysql_query("SET NAMES utf8");
			$rsc=mysql_query($sqlc);
			if(mysql_num_rows($rsc)==0){
				$receive=0;
			}else{
				$fto=mysql_fetch_array($rsc);
				$receive=$fto['t'];
			}
			if($receive==""){
				$receive=0;
			}
	
			$sqlc="Select sum(beg) as tc From stock_tb_beg_master_sub INNER JOIN stock_tb_beg_master ON stock_tb_beg_master.nobeg=stock_tb_beg_master_sub.nobeg Where kindtypeid='".$arr['kindtypeid']."' and statusbeg='1' and receive='on' ";
			mysql_query("SET NAMES utf8");
			$rsr=mysql_query($sqlc);
			if(mysql_num_rows($rsc)==0){
				$rec=0;
			}else{
				$frc=mysql_fetch_array($rsr);
				$rec=$frc['tc'];
			}
			if($rec==""){
				$rec=0;
			}

			$totals=$receive-$rec;
			
			echo"<tr height=\"23\" bgcolor=\"#FFFFFF\" onMouseOver=\"switchBg(this, 'trIN2')\" onMouseOut=\"switchBg(this, 'trOUT2')\">";
			echo"<td>&nbsp;<a class=\"cout2\" href=\"index.php?option=hrstock&com_stock=report&action=checkstock&id=view&kind=".$arr['kindtypeid']."\">".$arr['kindtypename']."</a></td>";
			echo"<td align=\"right\">$receive&nbsp;</td>";
			echo"<td align=\"right\">$rec&nbsp;</td>";
			echo"<td align=\"right\">$totals&nbsp;</td>";
			echo"</tr>";
			$i++;
		}
	}
	echo"</table>";

	/* ตัวแบ่งหน้า */
	$page = ceil($total/$limit); // เอา record ทั้งหมด หารด้วย จำนวนที่จะแสดงของแต่ละหน้า

	/* เอาผลหาร มาวน เป็นตัวเลข เรียงกัน เช่น สมมุติว่าหารได้ 3 เอามาวลก็จะได้ 1 2 3 */
	echo"<p style=\"text-align:center;\">คุณอยู่หน้าที่ ".$_GET['page']."</p>";
	echo"<p style=\"text-align:center;\">";
	for($i=1;$i<=$page;$i++){			
		if($_GET['page']==$i){ //ถ้าตัวแปล page ตรง กับ เลขที่วนได้
			echo "[<a class=\"cout\" href='index.php?option=hrstock&com_stock=report&action=checkstock&id=all&start=".$limit*($i-1)."&page=$i'>$i</A>]"; //ลิ้งค์ แบ่งหน้า เงื่อนไขที่ 1
		}else{
			echo "[<a class=\"cout\" href='index.php?option=hrstock&com_stock=report&action=checkstock&id=all&start=".$limit*($i-1)."&page=$i'>$i</A>]"; //ลิ้งค์ แบ่งหน้า เงื่อนไขที่ 2
		}			
	}
	echo"</p>";
}elseif($_GET['id']=="view"){
	$sql="Select * From stock_tb_kind_type Where kindtypeid='".$_GET['kind']."'";
	$rs=rsQuery($sql);
	$row=mysql_fetch_array($rs);
	echo"<p>ประวัติการรับ / จ่าย วัสด&nbsp;&nbsp;<a href=\"javascript:window.history.back();\">ย้อนกลับ</a></p>";
	echo"<p><b style=\"font-size:14px;color:red;\">".$row['kindtypename']."</b></p>";
	echo"<br />";
	echo"<table width=\"580\" cellspacing=\"1\" cellpadding=\"1\" border=\"0\">";
	echo"<tr><td colspan=\"4\" align=\"left\">&nbsp;&nbsp;ประวัติการรับวัสดุ</td></tr>";
	echo"<tr height=\"30\" bgcolor=\"#00B9FE\">";
	echo"<td align=\"center\"><b>หมายเลข PO<b></td>";
	echo"<td align=\"center\"><b>วันที่ทำรายการ<b></td>";
	echo"<td align=\"center\"><b>วันที่รับ<b></td>";
	echo"<td align=\"center\"><b>จำนวน<b></td>";
	echo"</tr>";
	$sql="Select stock_tb_receive_master_sub.*,stock_tb_receive_master.* From stock_tb_receive_master_sub INNER JOIN stock_tb_receive_master ON stock_tb_receive_master_sub.rid=stock_tb_receive_master.rid Where stock_tb_receive_master_sub.kindtypeid='".$_GET['kind']."'";
	$rs=rsQuery($sql);
	if(mysql_num_rows($rs)==0){
		echo"<tr bgcolor=\"#FFFFFF\" height=\"25\"><td colspan=\"4\" align=\"center\">- - - - - - - - - - ยังไม่มีประวัติการรับวัสดุชนิดนี้ - - - - - - - - - -</td></tr>";
	}else{
		while($row=mysql_fetch_array($rs)){
			echo"<tr bgcolor=\"#FFFFFF\" height=\"22\">";
			echo"<td>&nbsp;".$row['po']."</td>";
			echo"<td>&nbsp;".thaidate($row['datedo'])."</td>";
			echo"<td>&nbsp;".thaidate($row['datereceive'])."</td>";
			echo"<td align=\"right\">&nbsp;".$row['total']."&nbsp;</td>";
			echo"</tr>";
			$totalreceive=$totalreceive+$row['total'];
		}
	}
	if($totalreceive==""){
		$totalreceive=0;
	}
	echo"</table>";
	echo"<p style=\"margin-left:5px;\">รวมรับทั้งสิ้น&nbsp;:&nbsp;$totalreceive</p><br />";

	echo"<table width=\"580\" cellspacing=\"1\" cellpadding=\"1\" border=\"0\">";
	echo"<tr><td colspan=\"5\" align=\"left\">&nbsp;&nbsp;ประวัติการจ่ายวัสดุ</td></tr>";
	echo"<tr height=\"30\" bgcolor=\"#00B9FE\">";
	echo"<td align=\"center\"><b>หมายเลขการทำรายการ<b></td>";
	echo"<td align=\"center\"><b>วันที่จ่าย<b></td>";
	echo"<td align=\"center\"><b>ผู้ัรับ<b></td>";
	echo"<td align=\"center\"><b>แผนก<b></td>";
	echo"<td align=\"center\"><b>จำนวน</b></td>";
	echo"</tr>";

	$sql="Select stock_tb_beg_master_sub.*,stock_tb_beg_master.*,tb_user.nameuser,tb_user.surname,tb_department.depname From stock_tb_beg_master_sub INNER JOIN stock_tb_beg_master ON stock_tb_beg_master_sub.nobeg=stock_tb_beg_master.nobeg INNER JOIN tb_user ON stock_tb_beg_master.iduser=tb_user.iduser INNER JOIN tb_department ON tb_user.depid=tb_department.depid  Where stock_tb_beg_master_sub.kindtypeid='".$_GET['kind']."' And stock_tb_beg_master.statusbeg='1' And stock_tb_beg_master_sub.receive='on' Order by tb_department.depid,stock_tb_beg_master.iduser";





	$rs=rsQuery($sql);
	if(mysql_num_rows($rs)==0){
		echo"<tr bgcolor=\"#FFFFFF\" height=\"25\"><td colspan=\"5\" align=\"center\">- - - - - - - - - - ยังไม่มีประวัติการรับวัสดุชนิดนี้ - - - - - - - - - -</td></tr>";
	}else{
		while($row=mysql_fetch_array($rs)){
			echo"<tr bgcolor=\"#FFFFFF\" height=\"22\">";
			echo"<td>&nbsp;".$row['nobeg']."</td>";
			echo"<td>&nbsp;".thaidate($row['datebeg'])."</td>";
			echo"<td>&nbsp;".$row['nameuser']."&nbsp;".$row['surname']."</td>";
			echo"<td>&nbsp;".$row['depname']."</td>";
			echo"<td align=\"right\">&nbsp;".$row['beg']."&nbsp;</td>";
			echo"</tr>";
			$totalbeg=$totalbeg+$row['beg'];
		}
	}
	if($totalbeg==""){
		$totalbeg=0;
	}
	echo"</table>";
	echo"<p style=\"margin-left:5px;\">รวมจ่ายทั้งสิ้น&nbsp;:&nbsp;$totalbeg</p><br />";

}else{
	echo"<table width=\"580\" cellspacing=\"1\" cellpadding=\"1\" border=\"0\">";
	echo"<tr height=\"30\" bgcolor=\"#00B9FE\" >";
	echo"<td align=\"left\" width=\"301\"><b>&nbsp;รายการ</b></td>";
	echo"<td align=\"center\" width=\"93\"><b>ยอดรับ</b></td>";
	echo"<td align=\"center\" width=\"93\"><b>ยอดจ่าย</b></td>";
	echo"<td align=\"center\" width=\"93\"><b>คงเหลือ</b></td>";
	echo"</tr>";

	if(!isset($start)){
		$start = 0;
	}
	$limit = '20'; // แสดงผลหน้าละกี่หัวข้อ

	/* หาจำนวน record ทั้งหมด
	ปล. อันนี้ต้องใช้กับตัวแบ่งนะ ห้ามเอาออก*/
	$Qtotal = mysql_query("Select * From stock_tb_kind_type Where kindid='".$_GET['id']."'"); //คิวรี่ คำสั่ง
	$total = mysql_num_rows($Qtotal); // หาจำนวน record

	/*คิวรี่ข้อมูลออกมาเพื่อแสดงผล */
	$sql="Select * From stock_tb_kind_type Where kindid='".$_GET['id']."' Order by kindtypeid Limit $start,$limit";
	mysql_query("SET NAMES utf8");
	$Query = mysql_query($sql); //คิวรี่คำสั่ง
	$totalp = mysql_num_rows($Query); // หาจำนวน record ที่เรียกออกมา
	if($totalp==0){
		echo"<tr height=\"30\">";
		echo"<td colspan=\"4\" align=\"center\">- - - - - - - - - - ยังไม่มีเรื่องแจ้งซ่อมเข้ามา - - - - - - - - - -</td>";
		echo"</tr>";
		/*	วนลูปข้อมูล */
	}else{
		$i=$start;
		while($arr = mysql_fetch_array($Query)){
			
			$sqlc="Select sum(total) as t From stock_tb_receive_master_sub Where kindtypeid='".$arr['kindtypeid']."'";
			mysql_query("SET NAMES utf8");
			$rsc=mysql_query($sqlc);
			if(mysql_num_rows($rsc)==0){
				$receive=0;
			}else{
				$fto=mysql_fetch_array($rsc);
				$receive=$fto['t'];
			}
			if($receive==""){
				$receive=0;
			}
	

			$sqlc="Select sum(beg) as tc From stock_tb_beg_master_sub INNER JOIN stock_tb_beg_master ON stock_tb_beg_master.nobeg=stock_tb_beg_master_sub.nobeg Where kindtypeid='".$arr['kindtypeid']."' and statusbeg='1' and receive='on' ";
			mysql_query("SET NAMES utf8");
			$rsr=mysql_query($sqlc);
			if(mysql_num_rows($rsc)==0){
				$rec=0;
			}else{
				$frc=mysql_fetch_array($rsr);
				$rec=$frc['tc'];
			}
			if($rec==""){
				$rec=0;
			}

			$totals=$receive-$rec;
			
			echo"<tr height=\"23\" bgcolor=\"#FFFFFF\" onMouseOver=\"switchBg(this, 'trIN2')\" onMouseOut=\"switchBg(this, 'trOUT2')\">";
			echo"<td>&nbsp;<a class=\"cout2\" href=\"index.php?option=hrstock&com_stock=report&action=checkstock&id=view&kind=".$arr['kindtypeid']."\">".$arr['kindtypename']."</a></td>";
			echo"<td align=\"right\">$receive&nbsp;</td>";
			echo"<td align=\"right\">$rec&nbsp;</td>";
			echo"<td align=\"right\">$totals&nbsp;</td>";
			echo"</tr>";
			$i++;
		}
	}
	echo"</table>";

	/* ตัวแบ่งหน้า */
	$page = ceil($total/$limit); // เอา record ทั้งหมด หารด้วย จำนวนที่จะแสดงของแต่ละหน้า

	/* เอาผลหาร มาวน เป็นตัวเลข เรียงกัน เช่น สมมุติว่าหารได้ 3 เอามาวลก็จะได้ 1 2 3 */
	echo"<p style=\"text-align:center;\">คุณอยู่หน้าที่ ".$_GET['page']."</p>";
	echo"<p style=\"text-align:center;\">";
	for($i=1;$i<=$page;$i++){			
		if($_GET['page']==$i){ //ถ้าตัวแปล page ตรง กับ เลขที่วนได้
			echo "[<a class=\"cout\" href='index.php?option=hrstock&com_stock=report&action=checkstock&id=all&start=".$limit*($i-1)."&page=$i'>$i</A>]"; //ลิ้งค์ แบ่งหน้า เงื่อนไขที่ 1
		}else{
			echo "[<a class=\"cout\" href='index.php?option=hrstock&com_stock=report&action=checkstock&id=all&start=".$limit*($i-1)."&page=$i'>$i</A>]"; //ลิ้งค์ แบ่งหน้า เงื่อนไขที่ 2
		}			
	}
	echo"</p>";
}
?>
</div>