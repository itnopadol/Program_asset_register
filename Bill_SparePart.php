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
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">

	<title>Report Asset Register</title>
    <style>
@media print {
  @page { margin: 0; }
  body { 
  margin: 1.6cm; 
  }
}
#customers {
    border-collapse: collapse;
    width: 100%;
}

#customers td, #customers th {
    border: 2px solid #000;
    padding: 8px;
}

#customers tr:hover {background-color: #ddd;}
#customers th {
    padding-top: 5px;
    padding-bottom: 5px;
    text-align: center;
    color: #000;
	background-color:#999;
}
#customers td {
    padding-top: 5px;
    padding-bottom: 5px;
	color: #000;
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
	
	echo "<table align='center' id=\"customers\" >";
		echo "<tr>";
				echo "<th>No</th>";
				echo "<th>ชื่อสินทรัพย์</th>";
				echo "<th>ชื่อพนักงาน</th>";
				echo "<th>จุดใช้งาน</th>";
				echo "<th>วันที่ยืม</th>";
				echo "<th>เวลาคืน</th>";
				echo "<th>หมายเหตุ</th>";
		echo "</tr>";
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
		
		$newDate = date("d-M-Y", strtotime($remand));
		$timeDate = date("d-M-Y", strtotime($Rent_time));
		
  		echo "<tr align=\"center\">";
				echo "<strong>";
				echo "<td>$Rent_id</td>";
				echo "<td>$Rent_asset</td>";
				echo "<td>$Rent_emp</td>";
				echo "<td>$Rent_active</td>";
				echo "<td>$timeDate</td>";
				echo "<td >$newDate</TD>";
				echo "<td>$Rent_ect</td>";
				echo "</strong>";
		echo "</tr>";
				$num++;
		}	
		echo "</table>";
		echo "<div  align='right'>";
						echo "<strong style='font-size: 18px;'>สรุปยอดรวมรายการเบิกสินทรัพย์ทั้งหมด จำนวนเบิก / คืน : $num รายการ</strong>";	
						echo "</div>";
	echo "<input type='submit' name='Submi' value=' PRINT ' onClick=\"javascript:this.style.display='none';window.print()\">";
	?>
	
    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
</body>
</html>