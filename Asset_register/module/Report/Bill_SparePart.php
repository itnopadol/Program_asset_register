<?php
	include("../../Funtion/funtion.php");
	include("../../vendor/autoload.php");
	$con=connect_db();
	ob_start();
?>
<!doctype html>
<html lang="en">
<head>
<!-- Required meta tags -->
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
<!-- Bootstrap CSS -->
<link rel="stylesheet" href="../../CSS/bootstrap.min.css" crossorigin="anonymous">
<title> &nbsp; </title>
<!--<style type="text/css" media="print"> 
    input{ 
    display:none; 
    } 
</style>-->
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
			<div class="col" align="right">
            	<br><h4>Page 1
				<br><?php $date = date("d-m-Y"); 
				echo $date; ?></h4>
			</div>
		</div>      
	<div>
    <h3 align="center">ใบบันทึก สรุปยอดรายการเบิกสินทรัพย์</h2>
    <h4 align="center"><P>ประจำเดือน มกราคม 2561</P></h4>
    </div>
    <?php
	$result = mysqli_query($con,"SELECT * FROM rent WHERE Rent_log = 0 ORDER BY Rent_id ASC") 
	or die ("Error =>".mysqli_error($con));
	$rows = mysqli_num_rows($result); //จำนวนแถวที่คิวรี่ออกมาได้
	$num = 0;
		echo "<div class='row mb-2'>";
			echo "<div class='col-lg-12'>";
				echo "<div class='table-responsive'>";
				echo "<table align='center' class='table table-bordered' >";
				echo "<tr class='thead-light' align='center'>";
				echo "<th>No</th>";
				echo "<th>ชื่อสินทรัพย์</th>";
				echo "<th>ชื่อพนักงาน</th>";
				echo "<th>จุดใช้งาน</th>";
				echo "<th>วันที่ยืม</th>";
				echo "<th>เวลาคืน</th>";
				echo "<th>หมายเหตุ</th>";
	
	while(list($Rent_id,$Rent_asset,$Rent_emp,$Rent_active,$Rent_time,$Rent_ect,$Rent_log,$remand) = mysqli_fetch_row($result)){
		
		$result1 = mysqli_query($con,"SELECT Asset_name FROM asset WHERE Asset_id = '$Rent_asset'") 
		or die ("Error =>".mysqli_error($con));
		list($Rent_asset) = mysqli_fetch_row($result1);
		
		$result2 = mysqli_query($con,"SELECT Emp_name FROM employee WHERE Emp_code = '$Rent_emp'") 
		or die ("Error =>".mysqli_error($con));
		list($Rent_emp) = mysqli_fetch_row($result2);
		
		$result3 = mysqli_query($con,"SELECT Active_name FROM active_point WHERE Active_id = '$Rent_active'") 
		or die ("Error =>".mysqli_error($con));
		list($Rent_active) =  mysqli_fetch_row($result3);
			echo "<tr align='center' class='bg-light'>";
				echo "<td>$Rent_id</td>";
				echo "<td>$Rent_asset</td>";
				echo "<td>$Rent_emp</td>";
				echo "<td>$Rent_active</td>";
				echo "<td>$Rent_time</td>";
				echo "<td >$remand</TD>";
				echo "<td>$Rent_ect</td>";
		
		echo "</tr>";
		$num++;
		}	
		echo "</table>";
		
				
				
				
					
				echo "</div>";
			echo "</div>";
	echo "</div>";	
		echo "<div  align='right'>";
						echo "<strong style='font-size: 18px;'>สรุปยอดรวมรายการเบิกสินทรัพย์ทั้งหมด จำนวนเบิก / คืน : $num รายการ</strong>";	
						echo "</div>";
	echo "<input type='submit' name='Submi' value=' PRINT ' onClick=\"javascript:this.style.display='none';window.print()\">";
	
?>
	
<?php
	//$html = ob_get_contents();
	//ob_end_clean();
	//$mpdf = new \Mpdf\Mpdf();
	//$mpdf = new \Mpdf\Mpdf(['mode' => 'th', 'format' => 'A4', 'setAutoTopMargin' => 'stretch']);
	//$mpdf->WriteHTML($html, 2); //เลข 2 คืออะไร?
	//$mpdf->Output(); 
 
 ?>
    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="../../JS/jquery-3.2.1.slim.min.js" crossorigin="anonymous"></script>
    <script src="../../JS/popper.min.js"  crossorigin="anonymous"></script>
    <script src="../../JS/bootstrap.min.js"  crossorigin="anonymous"></script>
  </body>
</html>