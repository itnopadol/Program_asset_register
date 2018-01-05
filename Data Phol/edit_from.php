<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>เพิ่มข้อมูลหนังสือ</title>
</head>

<body>

<?php
	require("connect_db.php");


	$rs=mysql_query("SELECT*FROM books WHERE book_id='$_GET[id]'") or die(mysql_error());
	list($book_id,$book_title,$book_writer,$book_price,$book_sprice,$book_pub,$book_detail,$book_cover,$book_cate,  $book_stock,$book_time)=mysql_fetch_row($rs);
	
	$pu=mysql_query("SELECT*FROM publishing") or die(mysql_error());
	$ca=mysql_query("SELECT*FROM categories") or die(mysql_error());
?>


<h1>ฟอร์มแก้ไขข้อมูลหนังสือ</h1>
<form method="post" action="update_book.php" enctype="multipart/form-data">
	<input type="hidden" name="book_id" value="<?php echo $book_id ?>"  />
	<p>ชื่อหนังสือ : <input type="text" name="book_title" size="80" value="<?php echo $book_title ?>"/></p>
    <p>ชื่อผู้แต่ง : <input type="text" name="book_writer" size="40" value="<?php echo $book_writer ?>"/></p>
  <p>ราคาปกติ : <input type="text" name="book_price" size="20" value="<?php echo $book_price ?>"/></p>
  <p>ราคาพิเศษ : <input type="text" name="book_sprice" size="20" value="<?php echo $book_sprice ?>"/></p>
  <p>สำนักพิมพ์ : <?php	
	echo "<select name='book_pub'>";
	while(list($pub_id,$pub_name)=mysql_fetch_row($pu)){
		if($book_pub==$pub_id){
		echo "<option value='$pub_id' selected='selected' >$pub_name</option>";
		}else{
		echo "<option value='$pub_id'>$pub_name</option>";
		}
	}
	echo "</select>"; ?>
    				</p>
    <p>รายละเอียดหนังสือ : <textarea name="book_detail" rows="5" cols="100" /><?php echo $book_detail ?></textarea></p>
    <p>ปกหนังสือ :  <input type="file" name="book_cover" value="<?php echo $book_cover ?>"/></p>
 	<p>หมวดหมู่ : <?php 
	//echo "<h1>แสดงรายชื่อสำนักพิมพ์</h1>";
	while(list($cate_id,$cate_name)=mysql_fetch_row($ca)){
		if($book_cate==$cate_id){
		echo "<input type='radio' name='book_cate' value='$cate_id' checked='checked'>$cate_name";
		}else{
		echo "<input type='radio' name='book_cate' value='$cate_id' >$cate_name";
		}
		
		
	}
	
	mysql_free_result($pu);
	mysql_free_result($ca);
	mysql_close();
  ?>    </p>
    <p><input type="checkbox" name="book_stock"  /> พร้อมจำหน่าย</p><hr>

<p><input type="submit" name="add" value="แก้ไขหนังสือ" />&nbsp;&nbsp;<input type="submit" name="exit" value="ยกเลิก" /></p>
    			
</form>


</body>
</html>
