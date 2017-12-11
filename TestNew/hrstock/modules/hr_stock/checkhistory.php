<div id="hrStock">
<p>ตรวจสอบประวัติการเบิกจ่ายวัสดุ</p>
<center>
<form name="frmsearch" method="POST" action="">
<table width="500" cellpadding="2" cellspacing="1" border="0" style="border:1px solid #999999;">
<tr>
<td colspan="2" align="center">
<tr style="border-bottom:1px solid #999999;">
<td width="150">หน่วยงาน : </td>
<td width="350"><select name="dep" style="width:98%;"><option value="">- - - - - - เลือกหน่วยงานที่ท่านต้องการ - - - - - -</option><option value="*">เลือกดูทั้งหมด</option>
<?php
$sql="Select * From tb_department Order by depid";
$rs=rsQuery($sql);
while($row=mysql_fetch_array($rs)){
	echo"<option value=\"".$row['depid']."\">".$row['depname']."</option>";
}
?>
</select></td>
</tr>
<tr style="border-bottom:1px solid #999999;">
<td>ช่วงวันที่ : </td>
<td>จาก&nbsp;&nbsp;<input type="text" class="txtA" name="txtdate1" readonly="readonly" style="width:35%;" onfocus="showCalendarControl(this);" />&nbsp;&nbsp;ถึง&nbsp;&nbsp;<input type="text" class="txtA" name="txtdate2" readonly="readonly" style="width:35%;" onfocus="showCalendarControl(this);" /></td>
</tr>
<tr>
<td>&nbsp;</td>
<td><input type="submit" name="bt" value="ค้นหา" style="border:1px solid;"  /></td>
</tr>
</table>
</form>
</div>
<?php 
if(isset($_POST['bt'])){
	if($_POST['dep']<>""){
		echo"<div id=\"hrStock\" style=\"margin-bottom:10px;\">";

		$e=explode("-",$_POST['txtdate1']);
		$d=$e[2]."-".$e[0]."-".$e[1];
		$e2=explode("-",$_POST['txtdate2']);
		$d2=$e2[2]."-".$e2[0]."-".$e2[1];




		echo"<p>คุณได้ทำการเลือกช่วงวันที่ : ".thaidate($d)." ถึงวันที่ : ".thaidate($d2)."&nbsp;&nbsp;<input type=\"button\" name=\"bbt\" value=\"ส่งออก\" style=\"border:1px solid;\"/></p>";
		if($_POST['dep']=="*"){
			$sql="Select depid,depname From tb_department order by depid";
			$rs=rsQuery($sql);
			while($row=mysql_fetch_array($rs)){
				$sql="Select stock_tb_beg_master.*,tb_user.* From stock_tb_beg_master INNER JOIN tb_user ON stock_tb_beg_master.iduser=tb_user.iduser Where tb_user.depid='".$row['depid']."' And stock_tb_beg_master.statusbeg='1' And stock_tb_beg_master.datebegtotal BETWEEN '$d' AND '$d2' order by stock_tb_beg_master.nobeg";
				$rs2=rsQuery($sql);				
				if(mysql_num_rows($rs2)<>0){
					echo"<div style=\"padding:5px;margin-top:10px;margin-bottom:10px;border:1px solid;\" onMouseOver=\"switchBg(this, 'mOUT')\" onMouseOut=\"switchBg(this, 'mIN')\">";
				 	echo"<p><a class=\"c\" href=\"#\" id=\"id".$row['depid']."\" onclick=\"javascript:doc('tb".$row['depid']."','id".$row['depid']."');\" style=\"width:50px;background:url('images/p.png')no-repeat;\">&nbsp;&nbsp;&nbsp;&nbsp;</a> แผนก : ".$row['depname']."</p>";
					echo"<div id=\"tb".$row['depid']."\" style=\"display:none;\" >";
					while($row2=mysql_fetch_array($rs2)){
						echo"<table width=\"550\" cellpadding=\"1\" cellspacing=\"1\" border=\"0\" style=\"margin-top:5px;margin-bottom:5px;border:1px solid;\">";
						echo"<tr>";
				 		echo"<td colspan=\"4\" bgcolor=\"#FFFFFF\">เลขที่เบิก : ".$row2['nobeg']." วันที่จ่ายวัสดุ : ".thaidate($row2['datebegtotal'])."</td>";
						echo"</tr>";
						echo"<tr height=\"30\" bgcolor=\"#DCFFED\">";
						echo"<td width=\"250\">&nbsp;<b>รายการ</b></td>";
						echo"<td width=\"180\">&nbsp;<b>ผู้เบิก</b></td>";
						echo"<td width=\"60\">&nbsp;<b>จำนวน</b></td>";
						echo"<td width=\"60\">&nbsp;<b>หน่วย</b></td>";
						echo"</tr>";
						$sql="Select stock_tb_beg_master_sub.*,stock_tb_kind_type.*,stock_tb_unit.unitname From stock_tb_beg_master_sub INNER JOIN stock_tb_kind_type ON stock_tb_beg_master_sub.kindtypeid=stock_tb_kind_type.kindtypeid INNER JOIN stock_tb_unit ON stock_tb_kind_type.unitid=stock_tb_unit.unitid Where stock_tb_beg_master_sub.nobeg='".$row2['nobeg']."' And stock_tb_beg_master_sub.receive='on' order by stock_tb_beg_master_sub.kindtypeid";
						$rs3=rsQuery($sql);
						while($row3=mysql_fetch_array($rs3)){
							echo"<tr height=\"25\" bgcolor=\"#FFFFFF\">";
							echo"<td>&nbsp;".$row3['kindtypename']."</td>";
							echo"<td>&nbsp;".$row2['nameuser']." ".$row2['surname']."</td>";
							echo"<td>&nbsp;".$row3['beg']."</td>";
							echo"<td>&nbsp;".$row3['unitname']."</td>";
							echo"</tr>";
						}
						echo"</table>";
					}
					echo"</div>";
					echo"</div>";
				}
			}
		}else{
			$sql="Select depid,depname From tb_department Where depid='".$_POST['dep']."' order by depid";
			$rs=rsQuery($sql);
			while($row=mysql_fetch_array($rs)){
				$sql="Select stock_tb_beg_master.*,tb_user.* From stock_tb_beg_master INNER JOIN tb_user ON stock_tb_beg_master.iduser=tb_user.iduser Where tb_user.depid='".$row['depid']."' And stock_tb_beg_master.statusbeg='1' And stock_tb_beg_master.datebegtotal BETWEEN '$d' AND '$d2' order by stock_tb_beg_master.nobeg";
				$rs2=rsQuery($sql);				
				if(mysql_num_rows($rs2)<>0){
					echo"<div style=\"padding:5px;margin-top:10px;margin-bottom:10px;border:1px solid;\">";
				 	echo"<p><a class=\"c\" href=\"#\" id=\"id".$row['depid']."\" onclick=\"javascript:doc('tb".$row['depid']."','id".$row['depid']."');\" style=\"width:50px;background:url('images/p.png')no-repeat;\">&nbsp;&nbsp;&nbsp;&nbsp;</a> แผนก : ".$row['depname']."</p>";
					echo"<div id=\"tb".$row['depid']."\" style=\"display:none;\">";
					while($row2=mysql_fetch_array($rs2)){
						echo"<table width=\"550\" cellpadding=\"1\" cellspacing=\"1\" border=\"0\" style=\"margin-top:5px;margin-bottom:5px;border:1px solid;\">";
						echo"<tr>";
				 		echo"<td colspan=\"4\" bgcolor=\"#FFFFFF\">เลขที่เบิก : ".$row2['nobeg']." วันที่จ่ายวัสดุ : ".thaidate($row2['datebegtotal'])."</td>";
						echo"</tr>";
						echo"<tr height=\"30\" bgcolor=\"#DCFFED\">";
						echo"<td width=\"250\">&nbsp;<b>รายการ</b></td>";
						echo"<td width=\"180\">&nbsp;<b>ผู้เบิก</b></td>";
						echo"<td width=\"60\">&nbsp;<b>จำนวน</b></td>";
						echo"<td width=\"60\">&nbsp;<b>หน่วย</b></td>";
						echo"</tr>";
						$sql="Select stock_tb_beg_master_sub.*,stock_tb_kind_type.*,stock_tb_unit.unitname From stock_tb_beg_master_sub INNER JOIN stock_tb_kind_type ON stock_tb_beg_master_sub.kindtypeid=stock_tb_kind_type.kindtypeid INNER JOIN stock_tb_unit ON stock_tb_kind_type.unitid=stock_tb_unit.unitid Where stock_tb_beg_master_sub.nobeg='".$row2['nobeg']."' And stock_tb_beg_master_sub.receive='on' order by stock_tb_beg_master_sub.kindtypeid";
						$rs3=rsQuery($sql);
						while($row3=mysql_fetch_array($rs3)){
							echo"<tr height=\"25\" bgcolor=\"#FFFFFF\">";
							echo"<td>&nbsp;".$row3['kindtypename']."</td>";
							echo"<td>&nbsp;".$row2['nameuser']." ".$row2['surname']."</td>";
							echo"<td>&nbsp;".$row3['beg']."</td>";
							echo"<td>&nbsp;".$row3['unitname']."</td>";
							echo"</tr>";
						}
						echo"</table>";
					}
					echo"</div>";
					echo"</div>";
				}
			}
		}
		echo"</div>";
		unset($_POST['bt']);
	}
}
?>