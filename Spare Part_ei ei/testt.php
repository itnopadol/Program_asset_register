<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>Untitled Document</title>
</head>

<body>
<?php
include("../function/db_function.php");//include ไฟล์ที่เขียนฟังก์ชั่นไว้ใช้งาน
$con=connect_db();
$result = mysqli_query($con,"SELECT lend_spare.*,lend_empsp.rent_name FROM lend_spare Left JOIN lend_empsp ON lend_spare.rent_empID=lend_empsp.rent_empID")or die("SQL Error2 ".mysqli_error($con));

$result2 = mysqli_query($con,"SELECT lend_spare.rent_empID, lend_empsp.rent_name FROM lend_spare INNER JOIN lend_empsp ON lend_spare.	rent_empID = lend_empsp.rent_empID GROUP BY lend_spare.No")or die("SQL Error2 ".mysqli_error($con));

echo mysqli_num_rows($result2);

?>


</body>
</html>