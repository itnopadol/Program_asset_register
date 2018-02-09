<!DOCTYPE html>  
 <html>  
      <head>  
           <title>Webslesson Tutorial | Datatables Jquery Plugin with Php MySql and Bootstrap</title>  
           <!--<link rel="stylesheet" href="../../CSS/bootstrap.css" /> --> 
           <script src="../../JS/jquery.min.js"></script>  
           <link rel="stylesheet" href="../../CSS/3.3.6bootstrap.min.css" />  
           <script src="../../JS/jquery.dataTables.min.js"></script>  
           <script src="../../JS/dataTables.bootstrap.min.js"></script>            
           <link rel="stylesheet" href="../../CSS/dataTables.bootstrap.min.css" />  
      </head>

<body>
           <br /><br />  
           <div class="container">  
                <h3 align="center">Datatables Jquery Plugin with Php MySql and Bootstrap</h3>  
                <br />  
 <?php  
	include("../../Funtion/Funtion.php");  //ไฟล์เชื่อมต่อกับ database ที่เราได้สร้างไว้ก่อนหน้าน้ี
	$con = connect_db(); 
	$query ="SELECT * FROM asset";  
	$result = mysqli_query($con,$query);                  
               echo "<div class='table-responsive'> ";
               echo  "<table id='Asset_data' class='table table-striped table-bordered'>";
               echo  "<thead>";
                          echo "<tr>";
                               echo "<th>Asset_id</th>";
                               echo "<th>Asset_code</th>";
							   echo "<th>Asset_serial</th>";
							   echo "<th>Asset_name</th>";
							   echo "<th>brand</th>";
							   echo "<th>Asset_status</th>";
							   echo "<th>active_point</th>";
                               echo "</tr>";
                         echo "</thead>";  
                        while($row = mysqli_fetch_array($result)){ 
                               echo "<tr>  ";
                               echo "<td>" .$row["Asset_id"] .  "</td> ";
							   echo "<td>" .$row["Asset_code"] .  "</td> ";  
							   echo "<td>" .$row["Asset_serial"] .  "</td> ";
							   echo "<td>" .$row["Asset_name"] .  "</td> ";
							   echo "<td>" .$row["brand"] .  "</td> ";
							   echo "<td>" .$row["Asset_status"] .  "</td> "; 
							   echo "<td>" .$row["active_point"] .  "</td> ";
							   echo "<td>";
							  echo "<div class='dropdown'>";
								echo "<button class='btn btn-default dropdown-toggle' type='button' data-toggle='dropdown'>Tutorials";
								echo "<span class='caret'></span></button>";
								echo "<ul class='dropdown-menu'>";
								echo "<li><a href='#'>HTML</a></li>";
								echo "<li><a href='#'>CSS</a></li>";
								echo "<li><a href='#'>JavaScript</a></li>";
								echo "<li class='divider'></li>";
								echo "<li><a href='#'>About Us</a></li>";
								echo "</ul>";
								echo "</div>";
							   echo "</td>";
                              echo " </tr>";  
                          }       
                     echo "</table>";  
                echo "</div>  ";
           echo "</div>  ";
 ?>
 <script>  
 $(document).ready(function(){  
      $('#Asset_data').DataTable();  
 });  
 </script>  		
 <script src="../../JS/bootstrap.min.js"></script>   
</body>
</html>  
 