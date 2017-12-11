<?php
if(!isset($_SESSION['nameuser'])){
	echo"<meta http-equiv=\"refresh\" content=\"3;url=index.php\">";
	echo"<p style=\"color:red;cont-size:14px;\">กรุณา Login ให้ถูกต้องก่อน</p>";
	exit();
}
if(isset($_POST['edit'])){
	$sqledit="UPDATE tb_user ";
	$sqledit.="SET prefixid='".$_POST['prefix']."',";
	$sqledit.="nameuser='".$_POST['txtname']."',";
	$sqledit.="surname='".$_POST['txtsurname']."',";
	$sqledit.="pw='".md5($_POST['txtpw'])."',";
	$sqledit.="pwfix='".$_POST['txtpw']."',";
	$sqledit.="depid='".$_POST['department']."',";
	$sqledit.="avatar='".$_POST['avata']."'";
	$sqledit.=" Where iduser='".$_SESSION['iduser']."'";
	mysql_query("SET NAMES utf8");
	$rsedit=@mysql_query($sqledit);
	if(!$rsedit){
		echo"<p style=\"color:red;\">".mysql_error()."</p>";
		echo"<p style=\"color:red;\">ติดต่อ I.T. ครับ</p>";
	}else{
		echo"<p>ขอแสดงความดีใจด้วย เราได้ทำการแก้ไขข้อมูลให้คุณเสร็จเรียบร้อยแล้ว</p>";
		echo"<hr />";
		echo"<p>User name ของคุณคือ : <b style=\"color:red;\">".strtoupper($_POST['txtusername'])."</b>";
		echo"<p>Password ใหม่ ของคุณคือ : <b style=\"color:red;\">".$_POST['txtpw']."</b></br>";
		echo"<hr />";
		echo"<p><b>กรุณาจดจำ User name และ Password ของคุณด้วยครับ</b></p>";
		echo"<p>เพื่อการทำงานที่สมบูรณ์แบบ กรุณา <b><a class=\"cout\" href=\"?logout=true\">ออกจากระบบ</a></b> ก่อนครับ</p>"; 
	}
	exit();
}
$sql="Select * From tb_user Where iduser='".$_SESSION['iduser']."'";
mysql_query("SET NAMES utf8");
$rs=mysql_query($sql);
$rows=mysql_fetch_array($rs);
?>
<div id="regis">
<form name="frmedit" method="POST" action="" onsubmit="return chkEdit();">
<table width="600" cellpadding="1" cellspacing="1">
<tr bgcolor="#E2E2E2">
	<td colspan="2" align="center">:: แก้ไขประวัติส่วนตัว ::</td>
</tr>
<tr>
	<td align="right" width="200">รหัสพนักงาน&nbsp;:&nbsp;</td>
	<td align="left" width="400">&nbsp;<input class="id1" type="text" name="txtid" id="txtid" readonly="readonly" value="<?php echo $rows['iduser'];?>"/></td>
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
			if($rows['prefixid']==$row['prefixid']){
				echo"<option class=\"id1\" value=\"".$row['prefixid']."\" selected>".$row['prefixnamel']."</option>";
			}else{
				echo"<option class=\"id1\" value=\"".$row['prefixid']."\">".$row['prefixnamel']."</option>";
			}
		}
		?>
	</td>
</tr>
<tr>
	<td align="right">ชื่อ&nbsp;:&nbsp;</td>
	<td align="left">&nbsp;<input class="id2" type="text" name="txtname" maxlength="50" id="txtname" autocomplete="off" value="<?php echo $rows['nameuser'];?>" /></td>
</tr>
<tr>
	<td align="right">นามสกุล&nbsp;:&nbsp;</td>
	<td align="left">&nbsp;<input class="id2" type="text" name="txtsurname" maxlength="50" id="txtsurname" autocomplete="off"  value="<?php echo $rows['surname'];?> "/></td>
</tr>
<tr>
	<td align="right">ชื่อสำหรับ Log in&nbsp;:&nbsp;</td>
	<td align="left">&nbsp;<input class="id2" type="text" name="txtusername" maxlength="20" id="txtusername" readonly="readonly" value="<?php echo $rows['username'];?>" /></td>
</tr>
<tr>
	<td align="right">รหัสผ่านเก่า&nbsp;:&nbsp;</td>
	<td align="left">&nbsp;<input class="id2" type="text" name="txtpwold" maxlength="20" id="txtpwold" autocomplete="off" readonly="readonly" value="<?php echo $rows['pwfix'];?>"  /></td>
</tr>
<tr>
	<td align="right">รหัสผ่านใหม่&nbsp;:&nbsp;</td>
	<td align="left">&nbsp;<input class="id2" type="password" name="txtpw" maxlength="20" id="txtpw" autocomplete="off" /></td>
</tr>
<tr>
	<td align="right">ยืนยันรหัสผ่านใหม่&nbsp;:&nbsp;</td>
	<td align="left">&nbsp;<input class="id2" type="password" name="txtpwcf" maxlength="20" id="txtpwcf" autocomplete="off" /></td>
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
			if($rows['depid']==$row['depid']){
				echo"<option class=\"id1\" value=\"".$row['depid']."\" selected>".$row['depname']." / ".$row['fname']."</option>";
			}else{
				echo"<option class=\"id1\" value=\"".$row['depid']."\">".$row['depname']." / ".$row['fname']."</option>";
			}
		}
		?>
	</td>
</tr>
<tr>
	<td align="right"  valign="top">รูปภาพแทนตัวคุณ :&nbsp;</td>
	<td valign="top">
		<input type="radio" name="avata" value="baby.gif" <?php if($rows['avatar']=="babay.gif"){ echo "checked"; } ?>/><img src="images/avata/baby.gif"/>
		<input type="radio" name="avata" value="CA0PCBOH.gif" <?php if($rows['avatar']=="CA0PCBOH.gif"){ echo "checked"; } ?>/><img src="images/avata/CA0PCBOH.gif"/>
		<input type="radio" name="avata" value="CA2301A3.gif" <?php if($rows['avatar']=="CA2301A3.gif"){ echo "checked"; } ?>/><img src="images/avata/CA2301A3.gif"/><br/><br/>
		<input type="radio" name="avata" value="CAK3SVMF.gif" <?php if($rows['avatar']=="CAK3SVMF.gif"){ echo "checked"; } ?>/><img src="images/avata/CAK3SVMF.gif"/>
		<input type="radio" name="avata" value="CASL88YA.gif" <?php if($rows['avatar']=="CASL88YA.gif"){ echo "checked"; } ?>/><img src="images/avata/CASL88YA.gif"/>
		<input type="radio" name="avata" value="cat.gif" <?php if($rows['avatar']=="cat.gif"){ echo "checked"; } ?>/><img src="images/avata/cat.gif"/><br/><br/>
		<input type="radio" name="avata" value="d11.jpg" <?php if($rows['avatar']=="d11.jpg"){ echo "checked"; } ?>/><img src="images/avata/d11.jpg"/>
		<input type="radio" name="avata" value="d19.jpg" <?php if($rows['avatar']=="d19.jpg"){ echo "checked"; } ?>/><img src="images/avata/d19.jpg"/>
		<input type="radio" name="avata" value="d24.jpg" <?php if($rows['avatar']=="d24.jpg"){ echo "checked"; } ?>/><img src="images/avata/d24.jpg"/><br/><br/>
		<input type="radio" name="avata" value="d34.jpg" <?php if($rows['avatar']=="d34.jpg"){ echo "checked"; } ?>/><img src="images/avata/d34.jpg"/>
		<input type="radio" name="avata" value="default.jpg" <?php if($rows['avatar']=="default.jpg"){ echo "checked"; } ?>/><img src="images/avata/default.jpg"/>
		<input type="radio" name="avata" value="dirtygirl_frantic.gif" <?php if($rows['avatar']=="dirtygirl_frantic.gif"){ echo "checked"; } ?>/><img src="images/avata/dirtygirl_frantic.gif"/><br/><br/>
		<input type="radio" name="avata" value="display04.jpg" <?php if($rows['avatar']=="display04.jpg"){ echo "checked"; } ?>/><img src="images/avata/display04.jpg"/>
		<input type="radio" name="avata" value="display_02.jpg" <?php if($rows['avatar']=="display_02.jpg"){ echo "checked"; } ?>/><img src="images/avata/display_02.jpg"/>
		<input type="radio" name="avata" value="display_04.gif" <?php if($rows['avatar']=="display_04.gif"){ echo "checked"; } ?>/><img src="images/avata/display_04.gif"/><br/><br/>
		<input type="radio" name="avata" value="display_07.jpg" <?php if($rows['avatar']=="display_07.jpg"){ echo "checked"; } ?>/><img src="images/avata/display_07.jpg"/>
		<input type="radio" name="avata" value="display_12.gif" <?php if($rows['avatar']=="display_12.gif"){ echo "checked"; } ?>/><img src="images/avata/display_12.gif"/>
		<input type="radio" name="avata" value="display_14.gif" <?php if($rows['avatar']=="display_14.gif"){ echo "checked"; } ?>/><img src="images/avata/display_14.gif"/><br/><br/>
		<input type="radio" name="avata" value="fanchan.jpg" <?php if($rows['avatar']=="fanchan.jpg"){ echo "checked"; } ?>/><img src="images/avata/fanchan.jpg"/>
		<input type="radio" name="avata" value="model12.jpg" <?php if($rows['avatar']=="model12.jpg"){ echo "checked"; } ?>/><img src="images/avata/model12.jpg"/>
		<input type="radio" name="avata" value="movie.gif" <?php if($rows['avatar']=="movie.gif"){ echo "checked"; } ?>/><img src="images/avata/movie.gif"/><br/><br/>
		<input type="radio" name="avata" value="invaderzim_gir.gif" <?php if($rows['avatar']=="invaderzim_gir.gif"){ echo "checked"; } ?>/><img src="images/avata/invaderzim_gir.gif"/>
	</td>
</tr>
<tr height="30">
	<td>&nbsp;</td>
	<td>&nbsp;<input type="submit" class="bt2" value="ยืนยันแก้ไข" style="width:120px;" />&nbsp;&nbsp;<input type="button" class="bt2" value="ยกเลิก" style="width:100px;" onclick="javascript:window.location='index.php';" /></td>
</tr>
</table>
<input type="hidden" name="edit" value="1"/>
</form>
</div>