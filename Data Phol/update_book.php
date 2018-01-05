<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>แสดงข้อ</title>
</head>

<body>
<?php
require("connect_db.php");
	
//3.เรียกใข้คำสั่ง SQL


$book_time=date("Y-m-d H:i:s");
$book_cover=$_FILES['book_cover']['name'];//ชื่อไฟล์รูป
$book_tmp=$_FILES['book_cover']['tmp_name'];//ที่อยู่ของไฟล์ tmp

if($book_cover){
	$update_cover="book_cover='$book_cover'";
	copy($book_tmp,"images/$book_cover");
}else{
	$update_cover="";	
}




if(empty($_POST['book_stock'])){
	$book_stock=0;
}else{
	$book_stock=1;
}

$sql="UPDATE books SET book_title='$_POST[book_title]',book_writer='$_POST[book_writer]',book_price='$_POST[book_price]',book_sprice='$_POST[book_sprice]',book_pub='$_POST[book_pub]',book_detail='$_POST[book_detail]',book_cate='$_POST[book_cate]',book_stock='$book_stock',book_time='$book_time',$update_cover WHERE book_id = '$_POST[book_id]' ";

mysql_query($sql)or die(mysql_error());


//4.ปิดฐานข้อมูล
	mysql_close();
//header("Location:list_book.php");
?>

<script language="javascript">window.location='manage_book.php'</script>

</body>
</html>