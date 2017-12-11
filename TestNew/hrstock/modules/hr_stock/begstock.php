<?php
session_start();
session_register("sess_kindid");
session_register("sess_kindname");
session_register("sess_kindnum");
session_register("sess_unit");
//chkSess();
if($_GET['add']=="new"){
	echo"<p><u>รายการสต๊อกวัสดุที่มี</u></p>";
	echo"<select name=\"selectkind\" id=\"selectkind\" style=\"margin-left:5px;\" onclick=\"return selectKind();\"><option value=\"\">- - - - - เลือกประเภทของวัสดุที่ท่านต้องการ - - - - -</option>";
	$sql="Select * From stock_tb_kind Order by kindid";
	mysql_query("SET NAMES utf8");
	$rs=mysql_query($sql);
	while($row=mysql_fetch_array($rs)){
		echo"<option value=\"".$row['kindid']."\">ประเภท&nbsp;:&nbsp;".$row['kindname']."</option>";
	}
	echo"</select>&nbsp;&nbsp;[&nbsp;<img src=\"images/cart.gif\" width=\"17\" />&nbsp;<a class=\"cout\" href=\"index.php?option=hrstock&com_stock=begstock&bk=".$_GET['bk']."\">ดูตระกร้าของคุณ</a>&nbsp;]<br />";
	echo"<table width=\"580\" cellspacing=\"1\" cellpadding=\"1\" border=\"0\">";
	echo"<tr>";
	echo"<td width=\"400\" align=\"center\"><b>รายการวัสดุ</b></td>";
	//echo"<td width=\"90\" align=\"center\"><b>จำนวนคงเหลือ</b></td>";
	echo"<td width=\"90\" align=\"center\"><b>จองวัสดุ</b></td>";
	echo"</tr>";
	$sql="Select * From stock_tb_kind_type where kindid='".$_GET['kindid']."' Order by kindtypeid";
	mysql_query("SET NAMES utf8");
	$rs=mysql_query($sql);
	if(mysql_num_rows($rs)==0){
		echo"<tr height=\"25\" bgcolor=\"#FFFFFF\">";
		echo"<td colspan=\"3\" align=\"center\">- - - - ยังไม่มีีข้อมูล - - - - </td>";
		echo"</tr>";
	}
	while($row=mysql_fetch_array($rs)){
		echo"<tr height=\"25\" bgcolor=\"#FFFFFF\" onMouseOver=\"switchBg(this, 'mOUT')\" onMouseOut=\"switchBg(this, 'mIN')\">";
		echo"<td>&nbsp;".$row['kindtypename']."</td>";
		
		$sqlc="Select sum(beg) as t From stock_tb_beg_master_sub Where kindtypeid='".$row['kindtypeid']."'";
		mysql_query("SET NAMES utf8");
		$rsc=mysql_query($sqlc);
		if(mysql_num_rows($rsc)==0){
			$beg=0;
		}else{
			$fto=mysql_fetch_array($rsc);
			$beg=$fto['t'];
		}

		$sqlc="Select sum(total) as tc From stock_tb_receive_master_sub Where kindtypeid='".$row['kindtypeid']."'";
		mysql_query("SET NAMES utf8");
		$rsr=mysql_query($sqlc);
		if(mysql_num_rows($rsc)==0){
			$rec=0;
		}else{
			$frc=mysql_fetch_array($rsr);
			$rec=$frc['tc'];
		}
		
		$total=$rec-$beg;

	//	echo"<td align=\"right\">$total&nbsp;</td>";
		echo"<td align=\"center\">";
//		if($total<>0){
			echo"<a href=\"index.php?option=hrstock&com_stock=begstock&bk=".$_GET['bk']."&id=".$row['kindtypeid']."\"><img src=\"images/push.gif\" width=\"40\" border=\"0\" /></a></td>";
/*		}else{
			echo"<img src=\"images/nopush.gif\" width=\"40\" border=\"0\" /></td>";
		}*/
		echo"</tr>";
	}
	echo"</table>";	
}elseif(isset($_POST['savebeg'])){
	for($i=0;$i<count($_POST['beg_for']);$i++){
		if($_POST['beg_for'][$i]==""){
			echo"<p>กรุณาบอกวัตถุประสงค์ที่ต้องการเบิกด้วยครับ</p>";
			echo"<p><a href=\"javascript:window.history.back();\">ย้อนกลับ</a></p>";
			exit();
		}
	}
	if($_POST['txtdate']==""){
		echo"<p>กรุณากรอกข้อมูลเบื้องต้นให้ครบ</p>";
		echo"<p><a href=\"javascript:window.history.back();\">ย้อนกลับ</a></p>";
		exit();
	}
	if(count($_SESSION['sess_kindid'])==0){
		echo"<p>กรุณาเลือกรายการที่คุณต้องการ</p>";
		echo"<p><a href=\"javascript:window.history.back();\">ย้อนกลับ</a></p>";
		exit();
	}
	$ed=explode("-",$_POST['txtdate']);
	$txtdate=$ed[2]."-".$ed[0]."-".$ed[1];
	if($timeserver>"11.01" && $txtdate==$timedate){
		echo"<p>หมดเวลาการขอเบิกของ กรุณาเลือกวันทำการ ในวันถัดไปครับ</p>";
		echo"<p><a href=\"javascript:window.history.back();\">ย้อนกลับ</a></p>";
		exit();
	}
	$e=explode("-",$_POST['txtdate']);
	$d=$e[2]."-".$e[0]."-".$e[1];
	$sql="INSERT INTO stock_tb_beg_master(nobeg,begno,datedo,datebeg,iduser,statusbeg) Value(";
	$sql.="'".$_GET['bk']."','".$_POST['txtbegno']."','$txtdate','$d','".$_SESSION['iduser']."','0')";
	mysql_query("SET NAMES utf8");
	$rs=mysql_query($sql);
	if($rs){
		$beg=$_POST['beg_num'];
		$for=$_POST['beg_for'];
		$i=0;
		foreach($_SESSION['sess_kindid'] as $kid => $kvalue){
			$sqldetail="INSERT INTO stock_tb_beg_master_sub(nobeg,kindtypeid,total,forbeg) Value('".$_GET['bk']."','".$_SESSION['sess_kindid'][$kid]."','".$beg[$i]."','".$for[$i]."')";
			mysql_query("SET NAMES utf8");
			$rsdetail=mysql_query($sqldetail);
			$i++;
		}
		session_unregister("sess_kindid");
		session_unregister("sess_kindname");
		session_unregister("sess_kindnum");
		session_unregister("sess_unit");

		echo"<p style=\"font-size:14px;margin:3px;\">บันทึกข้อมูลสำเร็จเรียบร้อยแล้วครับ<p>";
		echo"<p style=\"font-size:14px;margin:3px;\">รหัสขอเบิกของท่านคือ : <font style=\"color:red;\"><b>".$_GET['bk']."</b></font></p>";
		echo"<p style=\"font-size:14px;margin:3px;\">กรุณาจดจำรหัสนี้เมื่อท่านได้ไปขอเบิกของ เพื่อยืนยันว่าท่านมารับของจริงครับ<p>";
		echo"<p style=\"font-size:14px;margin:3px;\">กด&nbsp;&nbsp;<a class=\"cout2\" href=\"index.php\">ที่นี่</a>&nbsp;&nbsp;เพื่อออกจากหน้านี้</p>";
	}else{
		echo"<p>".mysql_error()."</p>";
		exit();
	}
}else{
	if(isset($_GET['id'])){
		if(existsCart($_SESSION['sess_kindid'],$id)){
			echo"<script>";
			echo"alert('คุณได้ทำการเลือกรายการนี้ไปแล้วครับ');";
			echo"window.locaiton.href=window.history.back();";
			echo"</script>";
		}else{
			$sqlk="Select stock_tb_kind_type.*,stock_tb_unit.unitname From stock_tb_kind_type INNER JOIN stock_tb_unit ON stock_tb_kind_type.unitid=stock_tb_unit.unitid Where kindtypeid='".$_GET['id']."'";
			mysql_query("SET NAMES utf8");
			$rsk=mysql_query($sqlk);
			$arrk=mysql_fetch_array($rsk);
			$_SESSION['sess_kindid'][ ]=$arrk['kindtypeid'];
			$_SESSION['sess_kindname'][ ]=$arrk['kindtypename'];
			$_SESSION['sess_kindnum'][ ]=0;
			$_SESSION['sess_unit'][ ]=$arrk['unitname'];
			echo"<script>window.location.href='index.php?option=hrstock&com_stock=begstock&bk=".$_GET['bk']."'</script>";
		}		
	}
	echo"<p><u>ขอเบิกวัสดุอุปกรณ์</u></p>";
	echo"<form name=\"frmaddbeg\" action=\"\" method=\"POST\">";
	echo"<table width=\"580\" cellspacing=\"1\" cellpadding=\"1\" border=\"0\" style=\"background:#FFFFFF;\">";
		echo"<tr>";
			echo"<td width=\"180\" align=\"right\">เลขที่ใบเบิก : </td>";
			echo"<td><input class=\"ipstock\" type=\"text\" name=\"txtbegno\" id=\"txtbegno\" disabled=\"disabled\"/></td>";
		echo"</tr>";
		echo"<tr>";
			echo"<td align=\"right\">วันที่ทำรายการ : </td>";
			echo"<td>".thaidate($timedate)."</td>";
		echo"</tr>";
		echo"<tr>";
			echo"<td align=\"right\">วันที่ต้องการเบิก : </td>";
			echo"<td><input class=\"ipstock\" type=\"text\" name=\"txtdate\" id=\"txtdate\" readonly=\"readonly\" onfocus=\"showCalendarControl(this);\" autocomplete=\"off\" style=\"width:30%;\" />&nbsp;</td>";
		echo"</tr>";
		echo"<tr>";
			echo"<td align=\"right\">ผู้ขอเบิก: </td>";
			echo"<td>".$_SESSION['nameuser']."</td>";
		echo"</tr>";
		echo"<tr>";
			echo"<td>&nbsp;</td>";
			echo"<td><input class=\"btadmin\" type=\"submit\" name=\"savebeg\" value=\"บันทึกข้อมูล\"/>&nbsp;<input class=\"btadmin\" type=\"button\" value=\"ยกเลิก\"/></td>";
		echo"</tr>";
	echo"</table>";
	echo"<p><u>รายการที่คุณขอเบิก</u></p>";

	if(isset($_GET['del'])){
		$id=$_GET['del'];
		
		delCart($_SESSION['sess_kindid'],$id);
	}
	if(isset($_GET['delall'])){
		session_unregister("sess_kindid");
		session_unregister("sess_kindname");
		session_unregister("sess_kindnum");
		session_unregister("sess_unit");
	}
	echo"<p style=\"text-align:left;margin-top:10px;margin-left:50px;\"><a class=\"bl\" href=\"index.php?option=hrstock&com_stock=begstock&bk=".$_GET['bk']."&add=new\"><img src=\"images/add_24.png\" border=\"0\"  width=\"18\"/>&nbsp;เพิ่มรายการ</a>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<a class=\"bl\" href=\"index.php?option=hrstock&com_stock=begstock&bk=".$_GET['bk']."&delall=true\" onclick=\"return confirm('คุณต้องการรายการทั้งหมดที่คุณเลือกหรือไม่ ?');\"><img src=\"images/del_24.png\" width=\"18\" border=\"0\"/>&nbsp;ลบรายการทั้งหมด</a></p><center>";

	echo"<table width=\"580\" cellspacing=\"1\" cellpadding=\"1\" border=\"0\" style=\"border:1px solid;background:#D0D0D0;\">";
	echo"<tr height=\"30\" bgcolor=\"#00AEFF\">";
	echo"<td colspan=\"2\" align=\"center\">รายการ</td>";
	echo"<td align=\"center\">วัตถุประสงค์การเบิก</td>";
	echo"<td width=\"90\" align=\"center\">จำนวน</td>";
	echo"<td align=\"center\">หน่วย</td>";
	echo"</tr>";
	if(count($_SESSION['sess_kindid'])==0){
		echo"<tr height=\"30\" bgcolor=\"#FFFFFF\"><td colspan=\"5\" align=\"center\">คุณยังไม่มีการรายที่จะขอเบิก กรุณากด&nbsp;&nbsp;<a class=\"bl\" href=\"index.php?option=hrstock&com_stock=begstock&bk=".$_GET['bk']."&add=new\">ที่นี่</a>&nbsp;&nbsp;เพื่อขอเิบิกครับ</td></tr>";
	}else{
		foreach($_SESSION['sess_kindid'] as $kid => $kvalue){
			echo"<tr height=\"25\"  bgcolor=\"#FFFFFF\" onMouseOver=\"switchBg(this, 'mOUT')\" onMouseOut=\"switchBg(this, 'mIN')\">";
			echo"<td width=\"50\" align=\"center\"><a class=\"cout2\" href=\"index.php?option=hrstock&com_stock=begstock&bk=".$_GET['bk']."&del=".$_SESSION['sess_kindid'][$kid]."&name=".$_SESSION['sess_kindname'][$kid]."&total=".$_SESSION['sess_kindnum'][$kid]."\" onclick=\"return confirm('คุณต้องการรายการ : ".$_SESSION['sess_kindname'][$kid]." นี้หรือไม่ ?');\"><img src=\"images/del_24.png\" width=\"15\" border=\"0\"/></a></td>";
			echo"<td width=\"200\">&nbsp;".$_SESSION['sess_kindname'][$kid]."</td>";
			echo"<td width=\"150\" align=\"right\"><input class=\"ipstock\" type=\"text\" name=\"beg_for[]\" style=\"text-align:left;padding-right:2px;width:98%;\" autocomplete=\"off\"/></td>";
			echo"<td align=\"right\"><input class=\"ipstock\" type=\"text\" name=\"beg_num[]\" value=\"".$_SESSION['sess_kindnum'][$kid]."\" style=\"text-align:right;padding-right:2px;width:98%;\" autocomplete=\"off\" /></td>";
			echo"<td align=\"right\">".$_SESSION['sess_unit'][$kid]."&nbsp;</td>";
			echo"</tr>";
		}
	}
	echo"</table>";
	echo"<br />";
	echo"</center>";
	echo"<br />";
	echo"</form>";
}
?>