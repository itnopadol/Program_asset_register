<?php
if(!isset($_SESSION['iduser'])){
	echo"<script language=\"javascript\">window.location.href='index.php';</script>";
	exit();
}
if(isset($_GET['deldetail'])){
	$sql="Delete From stock_tb_receive_master Where rid='".$_GET['deldetail']."'";
	$rs=rsquery($sql);
	if($rs){
		echo"<script>window.location.href='index.php?option=".$_GET['option']."&com_stock=".$_GET['com_stock']."&receive=".$_GET['receive']."'</script>";
		exit();
	}else{
		echo"ERROR";
	}
}
if(isset($_GET['viewdetail'])){

	$selectadd="Select stock_tb_receive_master.*,tb_user.nameuser,tb_user.surname,stock_tb_supplier.suppliername From stock_tb_receive_master INNER JOIN stock_tb_supplier ON stock_tb_receive_master.supplierid=stock_tb_supplier.supplierid INNER JOIN tb_user ON stock_tb_receive_master.iduser=tb_user.iduser where stock_tb_receive_master.rid='".$_GET['viewdetail']."' ORDER BY stock_tb_receive_master.rid";
	mysql_query("SET NAMES utf8");
	$rsadd=mysql_query($selectadd);
	if(mysql_num_rows($rsadd)>0){
		$rowadd=mysql_fetch_array($rsadd);
	}
	echo"<table width=\"580\" cellpadding=\"2\" cellspacing=\"1\" border=\"0\" style=\"background:#FFFFFF;\">";
	echo"<tr height=\"25\" bgcolor=\"#E2E2E2\">";
	echo"<td colspan=\"2\">&nbsp;วันที่ทำรายการ : ".thaidate($rowadd['datedo'])."&nbsp;&nbsp;&nbsp;&nbsp;<a class=\"bl\" href=\"index.php?option=hrstock&com_stock=receivestock&receive=all\">ย้อนกลับ</a></td>";
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
	echo"<p>รายละเอียดรายการที่รับ</p>";		
	echo"<table width=\"400\" cellpadding=\"1\" cellspacing=\"1\" border=\"0\">";
	echo"<tr bgcolor=\"#C2EAFF\" height=\"25\">";
	echo"<td align=\"center\"><b>ชื่อรายการ</b></td>";
	echo"<td align=\"center\"><b>จำนวน</b></td>";
	echo"<td align=\"center\"><b>หน่วย</b></td>";
	echo"</tr>";
	$sqlkindtype="Select stock_tb_receive_master_sub.*,stock_tb_kind_type.*,stock_tb_unit.unitname From stock_tb_receive_master_sub INNER JOIN stock_tb_kind_type ON stock_tb_receive_master_sub.kindtypeid=stock_tb_kind_type.kindtypeid INNER JOIN stock_tb_unit ON stock_tb_kind_type.unitid=stock_tb_unit.unitid Where stock_tb_receive_master_sub.rid='".$_GET['viewdetail']."' Order by stock_tb_receive_master_sub.no";
	mysql_query("SET NAMES utf8");
	$rskindtype=mysql_query($sqlkindtype);
	if(mysql_num_rows($rskindtype)==0){
		echo"<tr height=\"30\" bgcolor=\"#FFFFFF\">";
		echo"<td align=\"center\" colspan=\"3\">- - - - - ยังไม่มีการเพิ่มรายการ - - - - -</td>";
		echo"</tr>";
	}else{
		while($rowkind=mysql_fetch_array($rskindtype)){
			echo"<tr height=\"22\" bgcolor=\"#FFFFFF\" onMouseOver=\"switchBg(this, 'trIn')\" onMouseOut=\"switchBg(this, 'trOut')\">";
			echo"<td>&nbsp;".$rowkind['kindtypename']."&nbsp;</td>";
			echo"<td align=\"right\">&nbsp;".$rowkind['total']."&nbsp;</td>";
			echo"<td align=\"right\">&nbsp;".$rowkind['unitname']."&nbsp;</td>";
			echo"</tr>";
		}
	}
	echo"</table>";
}else{

	

	if(!isset($start)){
		$start = 0;
	}
	$limit = '20'; // แสดงผลหน้าละกี่หัวข้อ

	echo"<div id=\"hrStock\">";
	echo"<p><u>การรับวัสดุ</u></p>";
	echo"<p>รายการการรับวัสดุทั้งหมด</p>";
	echo"<table width=\"580\" cellpadding=\"1\" cellspacing=\"1\" border=\"0\">";
	echo"<tr bgcolor=\"#74C6FF\" height=\"30\">";
	echo"<td width=\"40\" align=\"center\"><b>ลำดับ</b></td>";
	echo"<td align=\"center\"><b>เลขที่ PO</b></td>";
	echo"<td width=\"150\" align=\"center\"><b>ผู้รับ</b></td>";
	echo"<td width=\"70\" align=\"center\"><b>จำนวนรายการ</b></td>";
	echo"<td width=\"60\" align=\"center\"><b>รายการ</b></td>";
	echo"</tr>";

	$Qtotal = mysql_query("Select stock_tb_receive_master.*,tb_user.nameuser,tb_user.surname from stock_tb_receive_master INNER JOIN tb_user ON stock_tb_receive_master.iduser=tb_user.iduser Order by stock_tb_receive_master.rid"); //คิวรี่ คำสั่ง
	$total = mysql_num_rows($Qtotal); // หาจำนวน record

	$sql="Select stock_tb_receive_master.*,tb_user.nameuser,tb_user.surname from stock_tb_receive_master INNER JOIN tb_user ON stock_tb_receive_master.iduser=tb_user.iduser Order by stock_tb_receive_master.rid Limit $start,$limit";

	mysql_query("SET NAMES utf8");
	$rs=mysql_query($sql);
	if(mysql_num_rows($rs)==0){
		echo"<tr height=\"30\" bgcolor=\"#FFFFFF\">";
		echo"<td colspan=\"5\" align=\"center\">- - - - - ยังไม่มีการรับวัสดุเข้า - - - - -</td>";
		echo"</tr>";
	}else{
		$i=1;
		while($row=mysql_fetch_array($rs)){
			echo"<tr height=\"22\" bgcolor=\"#FFFFFF\" onMouseOver=\"switchBg(this, 'trIn')\" onMouseOut=\"switchBg(this, 'trOut')\">";
			echo"<td align=\"center\">$i</td>";
			echo"<td>&nbsp;".$row['po']."</td>";
			echo"<td>&nbsp;".$row['nameuser']." ".$row['surname']."</td>";
			$scout="Select count(no) as c From stock_tb_receive_master_sub Where rid='".$row['rid']."'";
			$rscout=mysql_query($scout);
			if(mysql_num_rows($rscout)>0){
				$f=mysql_fetch_array($rscout);
			}
			echo"<td align=\"center\">".$f['c']."</td>";
			echo"<td align=\"center\"><a href=\"index.php?option=hrstock&com_stock=receivestock&receive=all&viewdetail=".$row['rid']."\"><img src=\"images/edit_24.png\" width=\"18\" border=\"0\" /></a>";
			if($f['c']=="0"){
				echo"&nbsp;<a href=\"index.php?option=hrstock&com_stock=receivestock&receive=all&deldetail=".$row['rid']."\"><img src=\"images/del_24.png\" width=\"18\" border=\"0\" /></a>";
			}
			echo"</td>";
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
				echo "[<a class=\"cout\" href='index.php?option=".$_GET['option']."&com_stock=".$_GET['com_stock']."&receive=".$_GET['receive']."&start=".$limit*($i-1)."&page=$i'>$i</A>]"; //ลิ้งค์ แบ่งหน้า เงื่อนไขที่ 1
			}else{
				echo "[<a class=\"cout\" href='index.php?option=".$_GET['option']."&com_stock=".$_GET['com_stock']."&receive=".$_GET['receive']."&start=".$limit*($i-1)."&page=$i'>$i</A>]"; //ลิ้งค์ แบ่งหน้า  //ลิ้งค์ แบ่งหน้า เงื่อนไขที่ 2
			}			
		}
		echo"</p>";

	echo"</div>";
}
?>