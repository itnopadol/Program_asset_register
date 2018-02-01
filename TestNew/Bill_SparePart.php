<?php
	include("function/db_function.php");//include ไฟล์ที่เขียนฟังก์ชั่นไว้ใช้งาน
	$con=connect_db();

?>
<!doctype html>
<html lang="en">
<head>
<meta charset="utf-8">

<style>
@media print {
  @page { margin: 0; }
  body { margin: 1.6cm; }
}
</style>
</head>
<body style="font-family:'TH Sarabun New', 'Tw Cen MT'">
	
		<div class="row">
			<div class="col">
				<img src="../../img/LOGO NOPADOL2017/Nopadol LOGO-1--02.png" style="width:205px; height:95px;">
			</div>
			<div class="col" align="right"> <h4>Page 1
				<br><?php $date = date("d-m-Y"); 
				echo $date; ?></h4>
			</div>
		</div>      
	<div>
    <h4 align="center">รายงานสรุปยอดคงเหลือของวัสดุ / อุปกรณ์</h2>
    <h5 align="center"><P>ประจำเดือน มกราคม 2561</P></h4>
    </div>
    <?php
	$result = mysqli_query($con,"SELECT id,name,brand,price,category,stock,Pay,balance FROM spare_part ORDER BY name")or die(mysqli_error($con));
	$rows = mysqli_num_rows($result); //จำนวนแถวที่คิวรี่ออกมาได้
	$num = 0;
		echo "<div class='row mb-2'>";
			echo "<div class='col-lg-12'>";
				echo "<div class='table-responsive'>";
				echo "<table align='center' class='table table-bordered' >";
				echo "<tr class='thead-light'  style='text-align:center;' align='center'>";
				echo "<th width='5%' >รหัสวัสดุ</th>";
				echo "<th width='20%'>รายการ</th>";
				echo "<th>รุ่น / ยี่ห้อ</th>";
				echo "<th>ราคาซื้อ</th>";
				echo "<th width='18%'>ประเภท</th>";
				echo "<th>จำนวนวัสดุทั้งหมด</th>";
				echo "<th>จำนวนจ่าย</th>";
				echo "<th>จำนวนคงเหลือ</th>";
	
	while(list($id,$name,$brand,$price,$category,$stock,$Pay,$balance  ) = mysqli_fetch_row($result)){ 
		
		$sql=mysqli_query($con,"SELECT Category_name FROM category_spare  
	WHERE Category_id='$category' ")or die("SQL error2  ".mysqli_error($con));
    list($category)=mysqli_fetch_row($sql);
		
	echo "<tr>";
	echo "<td>$id</td>";
	echo "<td>$name</td>";
	echo "<td>$brand</td>";
	echo "<td>$price</td>";
	echo "<td>$category</td>";
	echo "<td>$stock</td>";
	echo "<td>$Pay</td>";
	echo "<td>$balance</td>";
    echo "</tr>";
	
		$num++;
		}	
		echo "</table>";
					
				echo "</div>";
			echo "</div>";
	echo "</div>";	
		echo "<div  align='right'>";
						echo "<strong style='font-size: 18px;'>สรุปยอดรวมรายการวัสดุ/อุปกรณ์ทั้งหมด จำนวน : $num รายการ</strong>";	
						echo "</div>";
	echo "<input type='submit' name='Submi' value=' PRINT ' onClick=\"javascript:this.style.display='none';window.print()\">";
	
?>
	
  </body>
</html>