<?php
session_start();
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>แสดงสินค้าในตะกร้า</title>
</head>

<body>
<?php
$cnt=count($_SESSION['sbook_id']);
$total_price=0;
if($cnt>0){
echo "<form method='post' action='recaculate.php'>";
echo "<table border='1' width=100% align='center'>";
echo "<tr bgcolor='#cccccc'><th>ยกเลิก</th><th>รหัสสินค้า</th><th>ชื่อสินค้า</th><th>ราคา</th><th>จำนวน</th><th>ราคารวม</th></tr>";
for($i=0;$i<$cnt;$i++){
echo "<tr><td align='center'><input type='checkbox' name='cancel_id[]' value='",$_SESSION['sbook_id'][$i],"'></td>";
echo "<td align='center'>",$_SESSION['sbook_id'][$i],"</td>";
echo "<td align='lift'>",$_SESSION['sbook_title'][$i],"</td>";
echo "<td align='center'>",$_SESSION['sbook_sprice'][$i],"</td>";
echo "<td align='center'><input type='text' name='book_amount[]' size=5 value=",$_SESSION['sbook_amount'][$i],"></td>";
	$sum_price=$_SESSION['sbook_sprice'][$i]*$_SESSION['sbook_amount'][$i];
echo "<td align='right'>";
printf("%.2f",$sum_price);//แสดงตัวเลขในรูปแบบทศนิยม 2 ตำแหน่ง

echo "</td>";
echo "</tr>";
$total_price+=$sum_price;
}

echo "</table>";
echo "<p align='right'>รวมราคาสินค้าทั้งหมดคิดเป็นเงิน&nbsp;&nbsp;";
 printf("%.2f",$total_price);
 echo "&nbsp;&nbsp;บาท</p>";

echo "<input type='hidden' name='total_paid' value='$total_price'>";
echo "<p align='center'><input type='submit' value='กลับไปเลือกสินค้า' name='button'>
<input type='submit' value='คำนวนราคาใหม่' name='button'>
<input type='submit' value='ยืนยันการสั่งซื้อ' name='button'>";
echo "<input type='submit' value='ยกเลิกสินค้า' name='button'></p>";
echo "</form>";
}else{
echo "ยังไม่มีสินค้าในตะกร้า <a href='list_book.php'>เลือกสินค้า</a>";	
}


?>

</body>
</html>