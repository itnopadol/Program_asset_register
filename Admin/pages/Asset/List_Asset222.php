<?php
	include("../../Funtion/funtion.php");
	$con = connect_db();
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <title>Star Admin</title>

 	<script src="../../js/jquery-1.12.4.js"></script>
    <script src="../../js/jquery.dataTables.min.js"></script>
    <script src="../../js/dataTables.bootstrap.min.js"></script>
      <link rel="stylesheet" href="../../css/3.3.7bootstrap.min.css" />
  <link rel="stylesheet" href="../../css/dataTables.bootstrap.min.css" />

<!--  <link rel="stylesheet" href="../../css/bootstrap.min.css" crossorigin="anonymous">-->
</head>
 <script>
	$(document).ready(function() {
		$('#example').DataTable();
	} );
	
		$(document).ready(function() {
		$('#example2').DataTable();
	} );
	</script>
<body>
<?php 
	$result = mysqli_query($con, "SELECT * FROM asset WHERE Asset_log = 1")
	or die ("MySQL =>".mysqli_error($con));
?>
	<table id='example' class='table table-striped table-bordered' cellspacing='0' width='100%'>
        <thead>
            <tr>
                <th>#</th>
                <th>หมายเลขทะเบียน</th>
                <th>Serial Number</th>
                <th>สินทรัพย์</th>
                <th>ยี่ห้อ</th>
            </tr>
        </thead>
        <tfoot>
            <tr>
                <th>#</th>
                <th>หมายเลขทะเบียน</th>
                <th>Serial Number</th>
                <th>สินทรัพย์</th>
                <th>ยี่ห้อ</th>
            </tr>
        </tfoot>
        <?php 
		while(list($Asset_id,$Asset_code ,$Asset_serial ,$Asset_name ,$mac_address,$computer_name
		,$brand,$Asset_date ,$Asset_company ,$Asset_price,$Asset_barcode
		,$Asset_Category ,$Asset_photo ,$Asset_time,$detail,$Asset_status) = mysqli_fetch_row($result)){
			
		$result2 = mysqli_query($con ,"SELECT Status_name FROM status WHERE Status_id = '$Asset_status' ")
		or die("SQL Error2=>".mysqli_error($con)) ;
		list($Status_name) = mysqli_fetch_row($result2); 
		?>
        <tbody>
            <tr>
                <td><?php echo $Asset_id; ?></td>
                <td><?php echo $Asset_code; ?></td>
                <td><?php echo $Asset_serial; ?></td>
                <td><?php echo $Asset_name; ?></td>
                <td><?php echo $brand; ?></td>
            </tr>
            </tbody>
			<?php
		}
		?>
        </table>
        

</body>
</html>