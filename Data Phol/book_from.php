<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>เพิ่มข้อมูลหนังสือ</title>
</head>

<body>

<form method="post" action="insert_book.php" enctype="multipart/form-data">
	<p>ชื่อหนังสือ : <input type="text" name="book_title" size="80" /></p>
    <p>ชื่อผู้แต่ง : <input type="text" name="book_writer" size="40"/></p>
  <p>ราคาปกติ : <input type="text" name="book_price" size="20"/></p>
  <p>ราคาพิเศษ : <input type="text" name="book_sprice" size="20"/></p>
  <p>สำนักพิมพ์ : <?php
	require("connect_db.php");
	
	$pu=mysql_query("SELECT*FROM publishing") or die(mysql_error());
	//echo "<h1>แสดงรายการหมวดหมู่หนังสือ</h1>";
	echo "<select name='book_pub'>";
	while(list($pub_id,$pub_name)=mysql_fetch_row($pu)){
		echo "<option value='$pub_id'>$pub_name</option>";
	}
	echo "</select>"; ?>
    				</p>
    <p>รายละเอียดหนังสือ : <textarea name="book_detail" rows="5" cols="40"/></textarea> </p>
    <p>ปกหนังสือ :  <input type="file" name="book_cover" /></p>
 	<p>หมวดหมู่ : <?php $ca=mysql_query("SELECT*FROM categories") or die(mysql_error());
	//echo "<h1>แสดงรายชื่อสำนักพิมพ์</h1>";
	while(list($cate_id,$cate_name)=mysql_fetch_row($ca)){
		echo "<input type='radio' name='book_cate' value='$cate_id'>$cate_name";
		
	}
	
	mysql_free_result($pu);
	mysql_free_result($ca);
	mysql_close();
  ?>    </p>
    <p><input type="checkbox" name="book_stock"  /> พร้อมจำหน่าย</p><hr>

<p><input type="submit" name="add" value="เพิ่มหนังสือ" />&nbsp;&nbsp;<input type="submit" name="exit" value="ยกเลิก" /></p>
    			
</form>


</body>
</html>
