<?php
session_start();
if(empty($_SESSION['login_type']) or $_SESSION['login_type']!=2  ){
	echo "<script language='javascript'>window.location='login_form.php'</script>";
}
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>แสดงรายชื่อผู้ใช้</title>
</head>
<body>
<p align="right">ยินดีต้อนรับ <?php echo $_SESSION['login_name']?> เข้าสู่ระบบ </p>
<p align="right"><a href="logout.php">ออกจากระบบ</a></p>
<p align="right"><a href="manage_book.php"><input type="button" value="manage_book" /></a>
<a href="order_list_admin.php"><input type="button" value="รายการขาย" /></a></p>
<hr />
<h1 align="center">แสดงรายชื่อผู้ใช้</h1>
 
  <?php 
	require("connect_db.php");


	//=========================== SEARCH ================================
	echo "<div style='text-align:center;padding:20px'>";
	echo "<form method='get'>";
	echo "<img src='images/search.JPG' width=150>";
	echo "<br align='center'><input type='text' name='search' size='50' ></br>";
	echo "<p align='center'><input type='radio' name='fieldname' value='username'  >User";
	echo "<input type='radio' name='fieldname' value='fullname'  >ชื่อ";
	echo "<input type='radio' name='fieldname' value='lastname' >นามสกุล";
	echo "<input type='radio' name='fieldname' value='phone' >เบอร์โทร";
	echo "<input type='radio' name='fieldname' value='email' >E-mail</p>";
	echo "<p align='center'><input type='submit' value='ค้นหา'></p>";
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
$chk="<a href='manage_user.php?all=1'>เลือกทั้งหมด</a>";

}elseif($_GET['all']==1){
$chk1="checked='checked'";
$chk="<a href='manage_user.php?all=0'>ยกเลิกทั้งหมด</a>";

}

///////////////////////////////////////////////////////
	
	echo "<form method='POST' action='delete_user.php' >";
	echo "<table border=1 width=80% align='center' >";
	echo "<tr bgcolor='#CCCCCC'><th>$chk</th><th>Username</th><th>แก้ไข</th><th>ลบข้อมูล</th></tr>";
		while(list($username,$fullname,$lastname)=mysql_fetch_row($result)){
			echo "<tr><td align='center'><input type='checkbox' name='username[]' value='$username' $chk1></td><td align='center'><a href='user_detail.php?username=$username'>$username</td><td align='center'><a href='edit_user.php?username=$username'>แก้ไข</a></td><td align='center'><a href='delete_user.php?username=$username' onclick=\"return confirm('คุณแน่ใจว่าจะลบข้อมูลหนังสือเล่มนี้')\">ลบ</a></td></tr>";
			
		}	
	echo "</table>";

	$page_af=$page_id-1;
	$page_be=$page_id+1;
	
	
	
if($rows<$rows1page){
			echo "<p align='center'>
			 <span style='background-color:#b3b5b3'>
				 <span style='border-bottom: 5px solid #fff'>
				 <span style='border-top: 5px solid #fff'>
				 <span style='border-left: 5px solid #fff'>
				 <span style='border-right: 5px solid #fff'>
				 <b>&nbsp;หน้า $page_id จากทั้งหมด $pages หน้า ::&nbsp; </span></span></span></span></span></b>";
}elseif($page_id<=1){
	echo "<p align='center'>
			 <span style='background-color:#b3b5b3'>
				 <span style='border-bottom: 5px solid #fff'>
				 <span style='border-top: 5px solid #fff'>
				 <span style='border-left: 5px solid #fff'>
				 <span style='border-right: 5px solid #fff'>
				 <b>&nbsp;หน้า $page_id จากทั้งหมด $pages หน้า ::&nbsp; </span></span></span></span></span></b>";
	}else{
		echo "<style>
				A{text-decoration:none}
			     </style><p align='center'>
				<span style='background-color:#b3b5b3'>
				 <span style='border-bottom: 5px solid #fff'>
				 <span style='border-top: 5px solid #fff'>
				 <span style='border-left: 5px solid #fff'>
				 <span style='border-right: 5px solid #fff'>
				   <font color='black' size=4><b>&nbsp;หน้า $page_id จากทั้งหมด $pages หน้า&nbsp; ::</font></span></span></span></span></span>
				<style>
				A{text-decoration:none}
				A:hover{background-color:#2f9c19}
			     </style>
				<span style='background-color:#cdcdcd'>
				 <span style='border-bottom: 5px solid #fff'>
				 <span style='border-top: 5px solid #fff'>
				 <span style='border-left: 5px solid #fff'>
				 <span style='border-right: 0.5px solid #fff'>
				 <a href='manage_user.php?page=1&search=$keyword&fieldname=$fieldname'>
				<font color='#000' pointsize=11><strong><<</font></a></strong></span></span></span></span></span>
				<style>
				A{text-decoration:none}
				A:hover{background-color:#2f9c19}
			     </style>
				 <span style='background-color:#f0f0f0'>
				 <span style='border-bottom: 5px solid #fff'>
				 <span style='border-top: 5px solid #fff'>
				 <span style='border-left: 5px solid #fff'>
				 <span style='border-right: 0.5px solid #fff'>
				 <a href='manage_user.php?page=$page_af&search=$keyword&fieldname=$fieldname' > 
				<font color='#000' pointsize=11><strong><</b></strong></a></span>";
	}
	for($i=1;$i<=$pages;$i++){
		if($page_id==$i){
			echo "<strong><font color='red' size=+2>[$i]</font></strong>";
			}else{
	echo "<style>
				A{text-decoration:none}
				A:hover{background-color:#2f9c19}
			     </style>
				 <span style='background-color:#f0f0f0'>
				 <span style='border-bottom: 5px solid #fff'>
				 <span style='border-top: 5px solid #fff'>
				 <span style='border-left: 5px solid #fff'>
				 <span style='border-right: 0.5px solid #fff'>
				 
				 <a href='manage_user.php?page=$i&search=$keyword&fieldname=$fieldname'><font color='#000000'>[$i]</font></a></span></span></span></span></span>";
			}
	}
	
	if($page_id==$pages){
	echo "";
	}else{
	echo "<style>
				A{text-decoration:none}
				A:hover{background-color:#2f9c19}
			     </style>
			 	<span style='background-color:#f0f0f0'>
				 <span style='border-bottom: 5px solid #fff'>
				 <span style='border-top: 5px solid #fff'>
				 <span style='border-left: 5px solid #fff'>
				 <span style='border-right: 0.5px solid #fff'>
				 <a href='manage_user.php?page=$page_be&search=$keyword&fieldname=$fieldname' >
				 <font color='#000' pointsize=11><strong> ></strong></b></a></span></span></span></span></span>&nbsp;
		<style>
				A{text-decoration:none}
				A:hover{background-color:#2f9c19}
			     </style>
				<span style='background-color:#cdcdcd'>
				 <span style='border-bottom: 5px solid #fff'>
				 <span style='border-top: 5px solid #fff'>
				 <span style='border-left: 5px solid #fff'>
				 <span style='border-right: 0.5px solid #fff'>
				 <a href='manage_book.php?page=$pages&search=$keyword&fieldname=$fieldname' > 
				 <font color='#000' pointsize=11><b>>></b></a></span></span></span></span></span>";
			}
			echo "<hr>";
		echo "<p align='center'><input type='submit' value='ลบหนังสือ' onclick=\"return confirm('คุณต้องการลบรายการที่เลือกใช่หรือไม่')\">&nbsp;";
		echo "</form>";		 

	


	
	mysql_free_result($result);
	mysql_close();

?>
</h1>



</body>
</html>