<?php
	include("../../Funtion/funtion.php");
	$con = connect_db();
?>
<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="../../css/bootstrap.css">
    <link rel="stylesheet" href="../../css/dataTables.bootstrap4.min.css">
    <title>Hello, world!</title>
    <script src="../../js/jquery-1.12.4.js"></script>
    <script src="../../js/jquery.dataTables.min.js"></script>
    <script src="../../js/dataTables.bootstrap4.min.js"></script>
    <!--<script src="../../js/jquery.dataTables.js"></script>-->
    <script>
	$(document).ready(function() {
    $('#example').DataTable();
	} );
	</script>
  </head>
  <body>
    <h1>Hello, world!</h1>
    <?php 
	$result = mysqli_query($con, "SELECT * FROM asset WHERE Asset_log = 1")
	or die ("MySQL =>".mysqli_error($con));
	?>
	<table id="example" class="table table-striped table-bordered" cellspacing="0" width="100%">
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
	/*	while(list($Asset_id,$Asset_code ,$Asset_serial ,$Asset_name ,$mac_address,$computer_name
		,$brand,$Asset_date ,$Asset_company ,$Asset_price,$Asset_barcode
		,$Asset_Category ,$Asset_photo ,$Asset_time,$detail,$Asset_status) = mysqli_fetch_row($result)){
			*/
	?>
    <?php while($row = mysqli_fetch_array($result)) {	 ?>
        <tbody>
            <tr>
                <td><?php echo $row['Asset_id']; ?></td>
                <td><?php echo $row['Asset_code']; ?></td>
                <td><?php echo $row['Asset_serial']; ?></td>
                <td><?php echo $row['Asset_name']; ?></td>
                <td><?php echo $row['brand']; ?></td>
            </tr>
            </tbody>
	<?php
		}
	?>
    </table>
  </body>
</html>