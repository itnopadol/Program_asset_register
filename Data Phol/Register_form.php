<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>สมัครสมาชิก</title>
</head>

<body>

<h1>สมัครสมาชิก</h1>
<form method='post' action='insert_user.php' enctype='multipart/form-data'>
	<p>Username : 
	  <input type='text' name='username' size='80' /></p>
    <p>Password : 
      <input type='password' name='passwd' size='40'/></p>
  <p>ชื่อ : 
    <input type='text' name='fullname' size='20'/></p>
  <p>สกุล : 
    <input type='text' name='lastname' size='20'/></p>
  <p>ที่ยู่ : 
    <textarea name='address' rows='5' cols='40'/></textarea></p>
  <p>เบอร์โทร: <input type='text' name='phone' size='40'/></p>
  <p>E-mail : <input type='text' name='email' size='40'/></p>
  <p><input type="hidden" name="type" value="3" /></p>
  <hr>
<p><input type='submit' name='add' value='สมัคร' />&nbsp;&nbsp;<input type='submit' name='exit' value='ยกเลิก' /></p>
</form>
</body>
</html>
