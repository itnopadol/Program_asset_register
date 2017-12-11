<?php
if(isset($_SESSION['iduser']))
{
	if($_GET['option']=="hrstock"){
		echo"<div id=\"module\">";
		$sqlstock="Select typeuser from stock_tb_module Where iduser='".$_SESSION['iduser']."'";
		$rsstock=rsquery($sqlstock);
		if(mysql_num_rows($rsstock)==0 && $_SESSION['status']<>"01"){
			echo"คุณยังไม่ได้รับอนุญาติให้เข้าใช้";
		}else{
			echo"<ul>";
			echo"<h3>HR STOCK</h3>";
			echo"<li><a href=\"index.php?option=hrstock\">ขอเบิกวัสดุอุปกรณ์</a></li>";
			echo"<li><a href=\"index.php?option=hrstock&com_stock=history\">รายการที่ขอเิบิก</a></li>";
			$rowstock=mysql_fetch_array($rsstock);
			$t=$rowstock['typeuser'];
			if($t=="01" || $_SESSION['status']=="01"){
				echo"<li><a href=\"index.php?option=hrstock&com_stock=administrator\">เพิ่มสิทธิ์ผู้ใช้งาน</a></li>";
			}
			if($t=="01" || $t=="02" || $_SESSION['status']=="01"){
				echo"<li>ตั้งค่ารายการ</a>";
					echo"<ul>";
						echo"<li><a href=\"index.php?option=hrstock&com_stock=configunit&type=unit\">ตั้งค่าหน่วยนับวัสดุ</a></li>";
						echo"<li><a href=\"index.php?option=hrstock&com_stock=configunit&type=kind\">ตั้งค่าประเภทวัสดุ</a></li>";
						echo"<li><a href=\"index.php?option=hrstock&com_stock=configunit&type=supplier\">ตั้งค่า Supplier</a></li>";
						echo"</ul>";
				echo"</li>";
				echo"<li>รับเข้าวัสดุ</a>";
					echo"<ul>";
						echo"<li><a href=\"index.php?option=hrstock&com_stock=receivestock&receive=all\">ดูประวัติการรับวัสดุ</a></li>";
						echo"<li><a href=\"index.php?option=hrstock&com_stock=receivestock&receive=add\">รับวัสดุ</a></li>";
						echo"<li><a href=\"index.php?option=hrstock&com_stock=receivestock&receive=all\">ส่งวัสดุคืน</a></li>";
					echo"</ul>";
				echo"</li>";
				echo"<li>เบิกจ่ายวัสดุ</a>";
					echo"<ul>";
						echo"<li><a href=\"index.php?option=hrstock&com_stock=begcomplete\">อนุมัติการจ่าย</a></li>";
						echo"<li><a href=\"index.php?option=hrstock&com_stock=begcomplete&action=receive\">จ่ายวัสดุ</a></li>";
					echo"</ul>";
				echo"</li>";
				echo"<li>รายงาน</a>";
					echo"<ul>";
						echo"<li><a href=\"index.php?option=hrstock&com_stock=report&action=checkstockmonth\">ตัดสต๊อกประจำเดือน</a></li>";
						echo"<li><a href=\"index.php?option=hrstock&com_stock=report&action=checkstockdepmonth\">ตัดสต๊อก แยกแผนก ประจำเดือน</a></li>";
						echo"<li><a href=\"index.php?option=hrstock&com_stock=report&action=checkstock\">ตรวจสอบสต๊อก</a></li>";
						echo"<li><a href=\"index.php?option=hrstock&com_stock=report&action=checkhistory\">ตรวจสอบประวัติการจ่ายวัสดุ</a></li>";
					echo"</ul>";
				echo"</li>";
			}
			echo"<ul>";
		}
		echo"</div>";
	}
}
?>