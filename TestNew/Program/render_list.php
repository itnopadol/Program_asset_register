<!doctype html>
<html>
</head>
<body
  
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="/lib/bootstrap.min.css">
  <script src="/lib/jquery-1.12.2.min.js"></script>
  <script src="/lib/bootstrap.min.js"></script>
  
<head>
<meta charset="utf-8">
<title>รายการวัสดุ / อุปกรณ์</title>
<style>
	.bodyfont{
		font-family:"TH Sarabun New", "Tw Cen MT";
		font-size:22px;
	}
	#sizezi{
		font-size:25px;
		
	}
	#sizezi2{
		font-size:22px;
	}
	#centertable{
		text-align:center;	
	}
	#midter{
		padding-top:50px;
	}
	
	navbar{
	padding-botton:20px;
	}
</style>
</head>
<link rel="stylesheet" href="css/css/bootstrap.min.css">
<body class="bodyfont">
<div class="container">

	<!-- Static navbar -->
    	<div id="sizezi2" style="padding-top:20px; width:95%; padding-left:4.6%" > 
		<nav class="navbar navbar-expand-lg navbar-light bg-light">
			<a class="navbar-brand" href="render.php" id="sizezi">กลับหน้ารายการคืน</a><p align="center">
				<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" 
                aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation"><span class="navbar-toggler-icon"></span>
  				</button>
			</div>
		</nav>
<?php
include("../function/db_function.php");
	$con=connect_db(); 
	
	$No=$_GET['id']; 
	$result=mysqli_query($con,"SELECT * FROM lend_spare WHERE 
	Order_lend='$No'") or die("SQL Error=>".mysqli_error($con));
	
	echo "<table border='0' align='center' width='90%' >";
	echo "<tr>";
	echo "<td>";
	echo "<table border='0' align='center' class='table' >";
	echo "<thead 	>";
	echo "<tr>";
	echo "<th>เลขที่ใบเบิก</th>";
	echo "<th>รหัสวัสดุ</th>";
	echo "<th>รายการ</th>";
	echo "<th>รุ่น/ยี่ห้อ</th>";
	echo "<th>จำนวนที่จ่าย</th>";
	echo "<th>จำนวนที่คืน</th>";
	echo "<th>วันที่คืน</th>";
	echo "<th>รับคืน</th>";
	echo "</tr>";
	echo "</thead>";
	
	while(list($No,$id_spare,$name,$detail,$category_lend,$amount,$Order_lend,$lend_data,$rent_empID)=mysqli_fetch_row($result)){
?>
<form action="Insert_render.php" method="post" enctype="multipart/form-data">
	<tr align='center' >
    
    <td><?php echo $Order_lend ?>
    <input type="hidden" name="Order_lend" value="<?php echo $Order_lend ?>"></td>
    
     <td><?php echo $id_spare ?>
    <input type="hidden" name="id_spare" value="<?php echo $id_spare ?>"></td>
    
    <td><?php echo $name?>
    <input type="hidden" name="name" value="<?php echo $name ?>"></td>
    
    <td><?php echo $detail ?>
    <input type="hidden" name="detail" value="<?php echo $detail ?>"></td>
    
    <td><?php echo $amount?>
    <input type="hidden" name="amount" value="<?php echo $amount ?>"></td>
    
    
    <td><input type="text" name="number"  size="5" value=""></td>
    
    <td><input type="date" name="time"  size="5" value=""></td>
   
    <td align=''><a href='Insert_render.php'><button type='submit'  class="btn btn-info" data-toggle='modal' data-target='#myModal'><img src='../img/document_edit.png'  width='27'  height='27'> รับคืน</button></td>
 <?php
    }
   ?>
</tr>
</table>

 </body>
</html>