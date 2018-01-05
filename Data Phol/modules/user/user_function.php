<?php
function login_form(){
?>
<form action="index.php?module=user&action=check_login" method="post" class="form-horizontal" role="form">
	<div class="input-group">Username : <input type="text" name="username" class="form-control" placeholder="Username" /> </div><br>
    <div class="input-group">Password :<input type="password" name="passwd" class="form-control" placeholder="Password"/></div><br>
    <p><input type="submit" name="login" value="Login" /></p>    
     </form>
<?php
}
function check_login(){
	connect_db();
	$user_form=$_POST['username'];
$pwd_form=$_POST['passwd'];
if(empty($user_form)or empty($pwd_form)){
	echo "<p class='alert alert-danger'><span class='glyphicon-minus-sign'></span>กรุณากลับไปกรอก username และ password ให้ครบ </a>";
	}else{
		
	
//ดึงค่าจากฐานข้อมูล
	$ur="SELECT username,passwd,type FROM users WHERE username='$user_form' and passwd='$pwd_form'";
	//echo "$ur";
	$result=mysql_query($ur) or die(mysql_error());
	list($user_db,$pwd_db,$type_db)=mysql_fetch_row($result);
//select ข้อมูลจากตาราง user ที่ username และ password ตรงกับข้อมูลที่กรอกส่งมาจากฟอร์ม
	

if($user_form=$user_db and $pwd_form=$pwd_db){
	$_SESSION['login_result']=true;
	$_SESSION['login_name']=$user_db;
	$_SESSION['login_type']=$type_db;
	echo "<script>window.location='index.php'</script>";
}
	else{	
		echo "<p class='alert alert-danger'><span class='glyphicon glyphicon-minus-sign'></span>username และ password ไม่ถูก!! กรุณากลับไปกรอกใหม่   <a href='login_form.php'> Login</a>";
	$_SESSION['login_result']=false;
		}
	}
	
	}
//==========================================================================================
function log_out(){
	session_destroy();
	echo "<script language='javascript'>window.location='index.php'</script>";	
}
//===========================================================================================
function register(){
	?>
	<h1>สมัครสมาชิก</h1>
<form method='post' action='index.php?module=user&action=insert_user' enctype='multipart/form-data'>
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
<p><input type='submit' name='add' value='สมัคร' />&nbsp;&nbsp;<input type='reset' name='exit' value='ยกเลิก' /></p>
</form>
<?php
}
//=============================================================================================
function insert_user(){
	connect_db();
$us="INSERT INTO users VALUES ('$_POST[username]','$_POST[passwd]','$_POST[fullname]','$_POST[lastname]','$_POST[address]','$_POST[phone]','$_POST[email]','$_POST[type]')";

mysql_query($us) or die(mysql_error());

mysql_close();

echo "<script language='javascript'>window.location='index.php'</script>";
}
//=============================================================================================
function manage_user(){
	connect_db();
	
		//=========================== SEARCH ================================
	echo "<div style='text-align:center;padding:20px'>";
	echo "<form method='get'>";
	echo "<img src='images/search.JPG' width=150>";
	echo "<br align='center'><input type='text' name='search' size='50' ></br>";
	echo "<p align='center'><input type='radio' name='fieldname' value='username'  >&nbsp;User&nbsp;&nbsp;";
	echo "<input type='radio' name='fieldname' value='fullname'  >&nbsp;ชื่อ&nbsp;&nbsp;";
	echo "<input type='radio' name='fieldname' value='lastname' >&nbsp;นามสกุล&nbsp;&nbsp;";
	echo "<input type='radio' name='fieldname' value='phone' >&nbsp;เบอร์โทร&nbsp;&nbsp;";
	echo "<input type='radio' name='fieldname' value='email' >&nbsp;E-mail&nbsp;&nbsp;</p>";
	echo "<p align='center'><input type='submit' value='ค้นหา'></p>";
	echo "<input type='hidden' name='module' value='books'>";
	echo "<input type='hidden' name='action' value='list_book'>";
	echo "</form></div>";	
	


	if(empty($_GET['search'])){
		$keyword="";
		$kw=$keyword;
	}else{
		$keyword=$_GET['search'];
		$kw=$keyword;
	}
		if(empty($_GET['fieldname'])){
		$fieldname=0;
	}else{
		$fieldname=$_GET['fieldname'];
	}
	
	
	/////////////////////////////////**********************///////////////////////////////////////////////



///////////////////////////////////////////////////////////////////////////////
	

	$rs=mysql_query("SELECT * FROM users WHERE $fieldname LIKE '%$keyword%'")or die (mysql_error());
	$rows=mysql_num_rows($rs);
	$rows1page=15;
	$pages=ceil($rows/$rows1page);
 	echo "<p align='center'><b>จำนวน $rows รายการ</b></p>";
		if(empty($_GET['search'])){
		echo "";
	}else{
		echo "<p align='center'><b>พบคำที่ตรงกับคำว่า '$kw'  </b></p>";
	}
	if(empty($_GET['page'])){
		$page_id=1;	
		$start_row=0;
	}else{
		$page_id=$_GET['page'];
		$start_row=($rows1page*$page_id)-$rows1page;
	}
	
	



	
	$title="SELECT * FROM users WHERE   $fieldname LIKE '%$keyword%'  LIMIT $start_row,$rows1page ";
	
	$result=mysql_query($title) or die(mysql_error());

	

	
	// เรียงค่าจาก มากไปน้อย ORDER BY book_id DESC
	// ส่งค่ากลับออกมาเป็น index array $data=mysql_fetch_row($result);
	// ส่งค่ากลับออกมาเป็น Associative array $data=mysql_fetch_assoc($result);
	// ส่งค่ากลับออกมา 2 ค่า $data=mysql_fetch_array($result);
	//$data=mysql_fetch_array($result);
	//$data=mysql_fetch_row($result);
	//$data=mysql_fetch_assoc($result);
	/////////////////////////////////////////////////////////
	
if(empty($_GET['all'])){
$chk1="";
$chk="<a href='index.php?module=books&action=manage_user&all=1'>เลือกทั้งหมด</a>";

}elseif($_GET['all']==1){
$chk1="checked='checked'";
$chk="<a href='index.php?module=books&action=manage_user&all=0'>ยกเลิกทั้งหมด</a>";

}

///////////////////////////////////////////////////////
	
	echo "<form method='POST' action='index.php?module=user&action=delete_user' >";
	echo "<table class='table'>";
	echo "<tr bgcolor='#CCCCCC'><td align='center'><b>$chk</b></td><td align='center'><b>Username</b></td><td align='center'><b>แก้ไข</b></td><td align='center'><b>ลบข้อมูล</b></td></tr>";
		while(list($username,$fullname,$lastname)=mysql_fetch_row($result)){
			echo "<tr><td align='center'><input type='checkbox' name='username[]' value='$username' $chk1></td><td align='center'><a href='index.php?module=user&action=user_detail&username=$username'>$username</td><td align='center'><a href='index.php?module=user&action=edit_user&username=$username'>แก้ไข</a></td><td align='center'><a href='index.php?module=user&action=delete_user&username=$username' onclick=\"return confirm('คุณแน่ใจว่าจะลบข้อมูลหนังสือเล่มนี้')\">ลบ</a></td></tr>";
			
		}	
	echo "</table>";

	$page_af=$page_id-1;
	$page_be=$page_id+1;
	
	
	
if($rows<$rows1page){
			echo "<p align='center'>
			
				 <b>&nbsp;หน้า $page_id จากทั้งหมด $pages หน้า ::&nbsp;</b>";
}elseif($page_id<=1){
	echo "<p align='center'>
			
				 <b>&nbsp;หน้า $page_id จากทั้งหมด $pages หน้า ::&nbsp; </b>";
	}else{
		echo " <font color='black' size=4><b>&nbsp;หน้า $page_id จากทั้งหมด $pages หน้า&nbsp; ::</font>
				 <a href='index.php?module=user&action=manage_user&page=1&search=$keyword&fieldname=$fieldname'>
				<font color='#000' pointsize=11><strong><<</font></a></strong>
				 <a href='index.php?module=user&action=manage_user&page=$page_af&search=$keyword&fieldname=$fieldname' > 
				<font color='#000' pointsize=11><strong><</b></strong></a>";
	}
	for($i=1;$i<=$pages;$i++){
		if($page_id==$i){
			echo "<strong><font color='red' size=+2>[$i]</font></strong>";
			}else{
	echo "  <a href='index.php?module=user&action=manage_user&page=$i&search=$keyword&fieldname=$fieldname'><font color='#000000'>[$i]</font></a>";
			}
	}
	
	if($page_id==$pages){
	echo "";
	}else{
	echo "<a href='index.php?module=user&action=manage_user&page=$page_be&search=$keyword&fieldname=$fieldname' >
				 <font color='#000' pointsize=11><strong> ></strong></b></a>&nbsp;
				 <a href='index.php?module=user&action=manage_user&page=$pages&search=$keyword&fieldname=$fieldname' > 
				 <font color='#000' pointsize=11><b>>></b></a>";
			}
			echo "<hr>";
		echo "<p align='center'><input type='submit' value='ลบที่เลือก' onclick=\"return confirm('คุณต้องการลบรายการที่เลือกใช่หรือไม่')\">&nbsp;";
		echo "</form></h1>";		 

	


	
	mysql_free_result($result);
	mysql_close();


	
}
//============================================================================================
function delete_user(){
	connect_db();
	if(isset($_GET['username'])){
	$sql="DELETE FROM users WHERE username='$_GET[username]'";
	}else{
		if(empty($_POST['username'])){
			echo "กรุณาเลือกหนังสือที่ต้องการจะลบจาก checkbox อย่างน้อย 1 เล่ม";
		}else{
		$username=$_POST['username'];
		$sql="DELETE FROM users WHERE username='$username[0]'";
		$cnt=count($username);
		for($i=1;$i<$cnt;$i++){
			$sql.="OR username='$username[$i]'";	
			}
		}
}	
///echo $sql;
if(isset($sql)){
mysql_query($sql)or die(mysql_error());
mysql_close();
echo "<script language='javascript'>window.location='index.php?module=user&action=manage_user'</script>";
}
	
}
//=============================================================================================
function user_detail(){
	connect_db();
	$rs=mysql_query("SELECT*FROM users WHERE username='$_GET[username]'") or die(mysql_error());
	list($username,$passwd,$fullname,$lastname,$address,$phone,$email)=mysql_fetch_row($rs);
	echo "<div class='alert alert-warning' role='alert'><h2 >ผู้ใช้งาน $username </h2></div>";
		echo "<div class='well well-sm'><table  ><tr><td>";
	echo "<p> <table border=0 width=500><tr><td>User : $username</td></tr></table></p>";
	echo "<p>password : $passwd</p>";
	echo "<p>ชื่อ : $fullname</p>";
	echo "<p>นามสกุล : $lastname</p>";
	echo "<p>ที่อยู่ : $address</p>";
	echo "<p>เบอร์โทร : $phone</p>";
	echo "<p>E-mail : $email</p></table></div>";
	
	mysql_close();


echo "<hr /><p><a href='index.php?module=user&action=manage_user'>กลับไป</a></p>";
	
}
//=============================================================================================
function edit_user(){
	connect_db();
	if(isset($_SESSION['login_name'])){
		$rs=mysql_query("SELECT*FROM users WHERE username='$_SESSION[login_name]'") or die(mysql_error());
	list($username,$passwd,$fullname,$lastname,$address,$phone,$email)=mysql_fetch_row($rs);
	}else{
	$rs=mysql_query("SELECT*FROM users WHERE username='$_GET[username]'") or die(mysql_error());
	list($username,$passwd,$fullname,$lastname,$address,$phone,$email)=mysql_fetch_row($rs);
	}
	
?>
<div class="alert alert-success" role="alert"><h1>แก้ไขข้อมูลผู้ใช้</h1></div>
<form method='post' action='index.php?module=user&action=update_user' enctype='multipart/form-data' role="form">
<div class="form-group">
	<p><label for="exampleInputEmail1">Username : </label>
	  <input type="email" class="form-control" id="exampleInputEmail1" placeholder="Enter email" name='username' value="<?php echo $username ?>" size='80' /></p></div>
    <p> <div class="form-group"><label for="exampleInputPassword1">Password : </label>
      <input type="password" class="form-control" id="exampleInputPassword1" placeholder="Password" name='passwd' value="<?php echo $passwd ?>" size='40'/></p></div>
  <p>  <div class="form-group"><label for="exampleInputPassword1">ชื่อ : </label>
    <input type="text" class="form-control" placeholder="Text input" name='fullname' value="<?php echo $fullname ?>" size='20'/></p></div>
  <p> <div class="form-group"><label for="exampleInputPassword1">สกุล : </label>
    <input type="text" class="form-control" placeholder="Text input" name='lastname' value="<?php echo $lastname ?>" size='20'/></p></div>
  <p>ที่อยู่ : 
    <textarea name='address' rows='5' cols='40' class="form-control"/><?php echo $address ?></textarea></p>
  <p><div class="form-group"><label for="exampleInputPassword1">เบอร์โทร: </label><input type="text" class="form-control" placeholder="Text input"  name='phone' value="<?php echo $phone ?>" size='40'/></p></div>
  <p><div class="form-group"><label for="exampleInputPassword1">E-mail : </label><input type="text" class="form-control" placeholder="Text input"   name='email' value="<?php echo $email ?>" size='40'/></p>
  <p><input type="hidden" name="type" value="3" /></p>
  <hr>


<p><input type="submit" name="add" value="บันทึกข้อมูล" />&nbsp;&nbsp;<input type="reset" name="exit" value="ยกเลิก" /></p>
    			
</form>
<?php  
	
}
//=============================================================================================
function update_user(){
	connect_db();
	//3.เรียกใข้คำสั่ง SQL


$sql="UPDATE users SET username='$_POST[username]',passwd='$_POST[passwd]',fullname='$_POST[fullname]',lastname='$_POST[lastname]',address='$_POST[address]',phone='$_POST[phone]',email='$_POST[email]' WHERE username = '$_POST[username]' ";

mysql_query($sql)or die(mysql_error());


//4.ปิดฐานข้อมูล
	mysql_close();
//header("Location:list_book.php");


echo "<script language='javascript'>window.location='index.php?module=user&action=manage_user'</script>";
	
	
	
}
?>