<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>เพิ่มข้อมูลหนังสือ</title>
</head>

<body>

<?php
	require("connect_db.php");
	$rs=mysql_query("SELECT*FROM users WHERE username='$_GET[username]'") or die(mysql_error());
	list($username,$passwd,$fullname,$lastname,$address,$phone,$email)=mysql_fetch_row($rs);
	
	
?>
<h1>แก้ไขข้อมูลผู้ใช้</h1>
<form method='post' action='update_user.php' enctype='multipart/form-data'>
	<p>Username : 
	  <input type='text' name='username' value="<?php echo $username ?>" size='80' /></p>
    <p>Password : 
      <input type='password' name='passwd' value="<?php echo $passwd ?>" size='40'/></p>
  <p>ชื่อ : 
    <input type='text' name='fullname' value="<?php echo $fullname ?>" size='20'/></p>
  <p>สกุล : 
    <input type='text' name='lastname' value="<?php echo $lastname ?>" size='20'/></p>
  <p>ที่ยู่ : 
    <textarea name='address' rows='5' cols='40' /><?php echo $address ?></textarea></p>
  <p>เบอร์โทร: <input type='text' name='phone' value="<?php echo $phone ?>" size='40'/></p>
  <p>E-mail : <input type='text' name='email' value="<?php echo $email ?>" size='40'/></p>
  <p><input type="hidden" name="type" value="3" /></p>
  <hr>


<p><input type="submit" name="add" value="บันทึกข้อมูล" />&nbsp;&nbsp;<input type="submit" name="exit" value="ยกเลิก" /></p>
    			
</form>


</body>
</html>
