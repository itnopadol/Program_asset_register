<?php
session_start();
require("connect_db.php");

$sql = mysql_query("SELECT * FROM likes WHERE book_id='$_GET[id]' AND username='$_SESSION[login_name]'");
$num = mysql_num_rows($sql);
if($num==1){
echo "<script type='text/javascript'>
alert (\"คุณเคย โหลวดแล้ว?\")
window.location='book_detail.php?id=$_GET[id]'
</script>";
}
if($num==0){
mysql_query("INSERT INTO likes VALUES('$_GET[id]','$_SESSION[login_name]')");
$like = mysql_query("SELECT book_id FROM likes WHERE book_id='$_GET[id]'");
$amount = mysql_num_rows($like);
mysql_query("UPDATE books SET likes='$amount' WHERE book_id='$_GET[id]'");
}
echo "<script>window.location='book_detail.php?id=$_GET[id]'</script>";
?>