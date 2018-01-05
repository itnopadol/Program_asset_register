<?php
session_start();
if(empty($_SESSION['login_type']) or $_SESSION['login_type']!=2){

echo "<script language='javascript'>window.location='login.php'</script>";
}
?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>บิล</title>
</head>

<body>
<p align="right">ยินดีต้อนรับ <?php echo $_SESSION['login_name']?> เข้าสู่ระบบ </p>
<p align="right"><a href="logout.php">ออกจากระบบ</a></p>
<p align="right"><a href="manage_user.php"><input type="button" value="manage_user" /></a>
<a href="manage_book.php"><input type="button" value="manage_book" /></a>
<a href="order_list_admin.php"><input type="button" value="รายการขาย" /></a>
<hr>
<style>
#contrainner{
margin:0 auto;
padding:50px 10px 50px 10px;
width:1080px;}
</style>
<?php

require("connect_db.php");
$i=1;
$date=date("Y-m-d H:i:s");
$total=0;
$total_price=0;
$rs=mysql_query("SELECT fullname,lastname,address,phone,email FROM users WHERE username='$_GET[name]'")or die(mysql_error());
list($name,$lname,$address,$tell,$mail)=mysql_fetch_row($rs);
$s1=mysql_query("SELECT book_id,book_amount FROM order_detail WHERE order_id='$_GET[order_id]'")or die(mysql_error());

echo "<p align='center'><img src='images/logo.jpg' width=150></p>";
echo "<h2 align='center'>บริษัท CASPER BOOK จำกัด</h2>";
echo "<h4 align='center'>333 ถ.สีลม แขวงสีลม เขตบางรัก กรุงเทพมหานคร 10500
<br>โทรศัพท์ 0-2231-4333 
<br>โทรสาร 0-2236-8281-2</h4>";
echo "<table align='center' width=800><tr><td>";
echo "<p align='left'>ชื่อ : $name ";
echo "&nbsp;&nbsp;&nbsp;&nbsp;นามสกุล : $lname</p>";
echo "<p align='left'>ที่อยู่ : $address</p>";
echo "<p align='left'>โทรศัพท์ : $tell ";
echo "&nbsp;&nbsp;&nbsp;&nbsp;E-mail: $mail</p> ";
echo "<p align='left'>วันที่ : $date</p> ";
echo "รหัสการสั่งซื้อ : $_GET[order_id]<br>";
echo "</td></tr></table>";


echo "<table border='1' width='800'align=center>";
echo "<tr><th>ที่</th><th>รหัสหนังสือ</th><th>รายการ</th><th>ราคา</th><th>จำนวน</th><th>ราคารวม</th></tr>";


while(list($book_id,$book_amount)=mysql_fetch_row($s1)){

$s2=mysql_query("SELECT book_id,book_title,book_sprice FROM books WHERE book_id='$book_id'")or die(mysql_error());
while(list($book_id,$book_title,$book_sprice)=mysql_fetch_row($s2)){
echo "<tr>";
echo "<td>";
echo $i++;
echo "</td>";
echo "<td>$book_id</td>";
echo "<td>$book_title</td>";
echo "<td>",number_format($book_sprice,2),"</td>";
echo "<td>$book_amount</td>";
$total=($book_sprice*$book_amount);
echo "<th>",number_format($total,2),"</th>";
echo "</tr>";

$total_price+=$total;

}
}
echo "<tr>";
echo "<td colspan='6'><p align='right'>รวมราคาสินค้าทั้งหมดคิดเป็นเงิน <u> $total_price </u> บาท</p></td>";
echo "</tr>";
echo "</table>";
echo "<br>";
echo "<br>";
echo "<table align='center' border=0 width=70%><tr><td colspan='3' align='center' valign='bottom'>";
echo "ลงชื่อ : &nbsp;<img src='images/sname.png' width=150 >";
echo "<p>(นาย ณัฐพล &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;วิโชนิตย์)</p>ฝ่ายการเงิน ";
echo "</td><td colspan='2' align='center' valign='bottom'>ลงชื่อ ......................................................................";
echo "<p>(...........................................................................)</p>ผู้รับสินค้า </td></tr></table>";
echo "</div>";
echo"</td></tr></table>";
echo"</div>";
 

?>

<hr>
<script type="text/javascript"> 
function printDiv(contrainner) { 
var printContents = document.getElementById(contrainner).innerHTML; 
var originalContents = document.body.innerHTML; 

document.body.innerHTML = printContents; 
window.print(); 

document.body.innerHTML = originalContents; 
} 
</script>
<p align="center"><input type="button" value="พิมพ์" onclick="printDiv('contrainner')">
<a href="list_order.php"><input type=button value='กลับหน้าหลัก'></a></p>
</body>
</html>