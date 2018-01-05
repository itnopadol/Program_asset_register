<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>ลบข้อมูล</title>
</head>

<body>
<?php
require("connect_db.php");
if(isset($_GET['id'])){
	$sql="DELETE FROM books WHERE book_id='$_GET[id]'";
	}else{
		if(empty($_POST['book_id'])){
			echo "กรุณาเลือกหนังสือที่ต้องการจะลบจาก checkbox อย่างน้อย 1 เล่ม";
		}else{
		$book_id=$_POST['book_id'];
		$sql="DELETE FROM books WHERE book_id='$book_id[0]'";
		$cnt=count($book_id);
		for($i=1;$i<$cnt;$i++){
			$sql.="OR book_id='$book_id[$i]'";	
			}
		}
}
		
///echo $sql;
if(isset($sql)){
mysql_query($sql)or die(mysql_error());
mysql_close();
echo "<script language='javascript'>window.location='manage_book.php'</script>";
}
?>


</body>
</html>