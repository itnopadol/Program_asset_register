<?php
if(!isset($_POST['txtid'])){
	?>
<h3>สมัครขอใช้บริการ</h3>
<form name="frmregis" action="" method="POST" onsubmit="return chkRegis();">
<table width="600" cellpadding="1" cellspacing="1">
<tr>
	<td align="right" width="200">รหัสพนักงาน&nbsp;:&nbsp;</td>
	<td align="left" width="400">&nbsp;<input class="id1" type="text" name="txtid" id="txtid" maxlength="10" autocomplete="off" /></td>
</tr>
<tr>
	<td align="right">คำหน้าหน้าชื่อ&nbsp;:&nbsp;</td>
	<td align="left">&nbsp;<select name="prefix" id="prefix" size="1">
		<option value=""> - - - - - - - - คำนำหน้า - - - - - - - -</option>
		<?php
		$sql="Select * From tb_prefix Order by prefixid";
		mysql_query("SET NAMES utf8");
		$rs=mysql_query($sql);
		while($row=mysql_fetch_array($rs)){
			echo"<option class=\"id1\" value=\"".$row['prefixid']."\">".$row['prefixnamel']."</option>";
		}
		?>
	</td>
</tr>
<tr>
	<td align="right">ชื่อ&nbsp;:&nbsp;</td>
	<td align="left">&nbsp;<input class="id2" type="text" name="txtname" maxlength="50" id="txtname" autocomplete="off" /></td>
</tr>
<tr>
	<td align="right">นามสกุล&nbsp;:&nbsp;</td>
	<td align="left">&nbsp;<input class="id2" type="text" name="txtsurname" maxlength="50" id="txtsurname" autocomplete="off" /></td>
</tr>
<tr>
	<td align="right">ชื่อสำหรับ Log in&nbsp;:&nbsp;</td>
	<td align="left">&nbsp;<input class="id2" type="text" name="txtusername" maxlength="20" id="txtusername" autocomplete="off" />&nbsp;*ภาษาอังกฤษ หรือ ตัวเลข เท่านั้น</td>
</tr>
<tr>
	<td align="right">รหัสผ่าน&nbsp;:&nbsp;</td>
	<td align="left">&nbsp;<input class="id2" type="password" name="txtpw" maxlength="20" id="txtpw" autocomplete="off" />&nbsp;*ภาษาอังกฤษ หรือ ตัวเลข เท่านั้น</td>
</tr>
<tr>
	<td align="right">ยืนยันรหัสผ่าน&nbsp;:&nbsp;</td>
	<td align="left">&nbsp;<input class="id2" type="password" name="txtpwcf" maxlength="20" id="txtpwcf" autocomplete="off" />&nbsp;*ภาษาอังกฤษ หรือ ตัวเลข เท่านั้น</td>
</tr>
<tr>
	<td align="right">ส่วนงาน/แผนก&nbsp;:&nbsp;</td>
	<td align="left">&nbsp;<select class="id2" name="department" id="department" size="1">
		<option value=""> - - - - - - - - - - - - - - - - - เลือกส่วนงาน / แผนก - - - - - - - - - - - - - -</option>
		<?php
		$sql="Select tb_department.*,tb_faction.*,tb_factory.* From tb_department INNER JOIN tb_faction ON tb_department.fid=tb_faction.fid INNER JOIN tb_factory ON tb_faction.facid=tb_factory.facid Order by depid";
		mysql_query("SET NAMES utf8");
		$rs=mysql_query($sql);
		while($row=mysql_fetch_array($rs)){
			echo"<option class=\"id1\" value=\"".$row['depid']."\">".$row['depname']." / ".$row['fname']."</option>";
		}
		?>
	</td>
</tr>
<tr>
	<td align="right"  valign="top">รูปภาพแทนตัวคุณ :&nbsp;</td>
	<td valign="top">
		<input type="radio" name="avata" value="baby.gif"/><img src="images/avata/baby.gif"/>
		<input type="radio" name="avata" value="CA0PCBOH.gif"/><img src="images/avata/CA0PCBOH.gif"/>
		<input type="radio" name="avata" value="CA2301A3.gif"/><img src="images/avata/CA2301A3.gif"/><br/><br/>
		<input type="radio" name="avata" value="CAK3SVMF.gif"/><img src="images/avata/CAK3SVMF.gif"/>
		<input type="radio" name="avata" value="CASL88YA.gif"/><img src="images/avata/CASL88YA.gif"/>
		<input type="radio" name="avata" value="cat.gif"/><img src="images/avata/cat.gif"/><br/><br/>
		<input type="radio" name="avata" value="d11.jpg"/><img src="images/avata/d11.jpg"/>
		<input type="radio" name="avata" value="d19.jpg"/><img src="images/avata/d19.jpg"/>
		<input type="radio" name="avata" value="d24.jpg"/><img src="images/avata/d24.jpg"/><br/><br/>
		<input type="radio" name="avata" value="d34.jpg"/><img src="images/avata/d34.jpg"/>
		<input type="radio" name="avata" value="default.jpg"/><img src="images/avata/default.jpg"/>
		<input type="radio" name="avata" value="dirtygirl_frantic.gif"/><img src="images/avata/dirtygirl_frantic.gif"/><br/><br/>
		<input type="radio" name="avata" value="display04.jpg"/><img src="images/avata/display04.jpg"/>
		<input type="radio" name="avata" value="display_02.jpg"/><img src="images/avata/display_02.jpg"/>
		<input type="radio" name="avata" value="display_04.gif"/><img src="images/avata/display_04.gif"/><br/><br/>
		<input type="radio" name="avata" value="display_07.jpg"/><img src="images/avata/display_07.jpg"/>
		<input type="radio" name="avata" value="display_12.gif"/><img src="images/avata/display_12.gif"/>
		<input type="radio" name="avata" value="display_14.gif"/><img src="images/avata/display_14.gif"/><br/><br/>
		<input type="radio" name="avata" value="fanchan.jpg"/><img src="images/avata/fanchan.jpg"/>
		<input type="radio" name="avata" value="model12.jpg"/><img src="images/avata/model12.jpg"/>
		<input type="radio" name="avata" value="movie.gif"/><img src="images/avata/movie.gif"/><br/><br/>
		<input type="radio" name="avata" value="invaderzim_gir.gif"/><img src="images/avata/invaderzim_gir.gif"/>
	</td>
</tr>
<tr height="30">
	<td>&nbsp;</td>
	<td>&nbsp;<input type="submit" class="bt2" value="ยืนยันการลงทะเบียน" style="width:120px;" />&nbsp;&nbsp;<input type="reset" class="bt2" value="ยกเลิก" style="width:100px;" onclick="javascript:window.location.href='index.php';" /></td>
</tr>
</table>
</form>
<?php
}else{
	//ค้นหาว่า มีคนใช้ รหัสพนักงานนี้หรือยัง
	$sql="Select iduser from tb_user Where iduser='".$_POST['txtid']."'";
	mysql_query("SET NAMES utf8");
	$rs=mysql_query($sql);
	if(mysql_num_rows($rs)>0){
		echo"<p>มีการใช้รหัสพนักงาน : <b style=\"color:red;\">".strtoupper($_POST['txtid'])."</b> ลงทะเบียนใช้งานไปแล้วครับ</p>";
		echo"<p><a href=\"javascript:window.history.go(-1);\">ลงทะเบียนใหม่อีกครั้ง</a></p>";
	}else{
		$sql="Select username from tb_user Where username='".$_POST['txtusername']."'";
		mysql_query("SET NAMES utf8");
		$rs=mysql_query($sql);
		if(mysql_num_rows($rs)>0){
			echo"<p>มีการใช้ Username : <b style=\"color:red;\">".strtoupper($_POST['txtusername'])."</b> ลงทะเบียนใช้งานไปแล้วครับ</p>";
			echo"<p><a href=\"javascript:window.history.go(-1);\">ลงทะเบียนใหม่อีกครั้ง</a></p>";
		}else{
			$sql="INSERT INTO tb_user(iduser,prefixid,nameuser,surname,username,pw,pwfix,depid,statusUser,avatar) Values('".strtoupper($_POST['txtid'])."',";
			$sql.="'".$_POST['prefix']."','".$_POST['txtname']."','".$_POST['txtsurname']."','".strtoupper($_POST['txtusername'])."','".md5($_POST['txtpw'])."',";
			$sql.="'".$_POST['txtpw']."','".$_POST['department']."','02','".$_POST['avata']."')";
			mysql_query("SET NAMES utf8");
			$rs=@mysql_query($sql);
			if(!$rs){
				echo"<p style=\"color:red;\">".mysql_error()."</p>";
				echo"<p style=\"color:red;\">ติดต่อ I.T. ครับ</p>";
			}else{
				echo"<p>ขอแสดงความดีใจด้วย เราได้ทำการลงทะเบียนให้คุณเสร็จเรียบร้อยแล้ว</p>";
				echo"<hr />";
				echo"<p>User name ของคุณคือ : <b style=\"color:red;\">".strtoupper($_POST['txtusername'])."</b>";
				echo"<p>Password ของคุณคือ : <b style=\"color:red;\">".$_POST['txtpw']."</b></br>";
				echo"<hr />";
				echo"<p><b>กรุณาจดจำ User name และ Password ของคุณด้วยครับ</b></p>";
			}
		}
	}
}
?>