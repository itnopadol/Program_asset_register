<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>Untitled Document</title>
</head>
<body>
<?php
include("../function/db_function.php");
	$con=connect_db();
mysqli_query($con,"DELETE FROM spare_part WHERE id= '$_GET[id]' ")or die ("delete".mysqli_error($con));
mysqli_close($con);
echo "<script>alert('คุณต้องการลบข้อมูลหรือไม่')</script>";
echo "<script>window.location='list_spare.php'</script>";
?>

</body>
</html>