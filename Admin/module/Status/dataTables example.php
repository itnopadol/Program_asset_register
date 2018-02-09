<meta charset="UTF-8">
<title>dataTables example</title>
           <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.0/jquery.min.js"></script>  
           <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" />  
           <script src="https://cdn.datatables.net/1.10.12/js/jquery.dataTables.min.js"></script>  
           <script src="https://cdn.datatables.net/1.10.12/js/dataTables.bootstrap.min.js"></script>            
           <link rel="stylesheet" href="https://cdn.datatables.net/1.10.12/css/dataTables.bootstrap.min.css" />  
           <br /><br />  
           <div class="container">  
                <h3 align="center">Datatables Jquery Plugin with Php MySql and Bootstrap</h3>  
                <br />  
<?php
	//1. เชื่อมต่อ database: 
	include("../../Funtion/Funtion.php");  //ไฟล์เชื่อมต่อกับ database ที่เราได้สร้างไว้ก่อนหน้าน้ี
	$con = connect_db();
	//2. query ข้อมูลจากตาราง tb_member: 
	$query = "SELECT * FROM asset" or die("Error:" . mysqli_error()); 
	//3.เก็บข้อมูลที่ query ออกมาไว้ในตัวแปร result . 
	$result = mysqli_query($con, $query); 
	//4 . แสดงข้อมูลที่ query ออกมา โดยใช้ตารางในการจัดข้อมูล: 
	echo "<div class='table-responsive'> ";
	echo "<table id='example' class='display' cellspacing='0' border='1'>";
	//หัวข้อตาราง
	echo "<thead>";
	echo "<tr>";
		echo		"<th>รหัสสินทรัพย์</th>";
		echo		"<th>หมายเลขทะเบียน</th>";
		echo		"<th>Serial Number</th>";
		echo		"<th>ชื่อสินทรัพย์</th>";
		echo		" <th>รุ่น / ยี่ห้อ</th>";
		echo		"<th>สถานะการใช้งาน</th>";
		echo		"<th>จุดใช้งาน</th>";
		echo		"<th>เบิกสินทรัพย์</th>";
	echo "</tr>";
	echo "</thead>";
	while($row = mysqli_fetch_array($result)){ 
	  echo "<tr>";
	  echo "<td>"."<center>" .$row["Asset_id"] ."</center>"."</td> "; 
	  echo "<td>" .$row["Asset_code"] .  "</td> ";
	  echo "<td>" .$row["Asset_serial"] .  "</td> ";
	  echo "<td>" .$row["Asset_name"] .  "</td> ";
	  echo "<td>" .$row["brand"] .  "</td> ";
	  echo "<td>" .$row["Asset_status"] .  "</td> ";
	  echo "<td>" .$row["active_point"] .  "</td> ";
	  echo "</tr>";
	}
	echo "</table>";
	echo "</div>";
	//5. close connection
	mysqli_close($con);
?>
<script>
$(document).ready(function() {
    $('#example').DataTable();
} );
</script>
<!--
  reference : https://datatables.net/examples/basic_init/zero_configuration.html
  -->