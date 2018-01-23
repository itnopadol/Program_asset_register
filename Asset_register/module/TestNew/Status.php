<?php 
	include("../../Funtion/funtion.php");
	$con = connect_db();
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Status</title>
</head>

<body>
<form action="update.php" method="post">
	<select name="Status_name" >
		<?php
				  $result=mysqli_query($con,"SELECT Status_id,Status_name FROM status ") 
				  or die ("mysql error=>>".mysql_error($con));
				  while(list($Status_id,$Status_name)=mysqli_fetch_row($result)){
					  $select = $Status_id == $Status_name? "selected":"";
				  echo "<option value='$Status_id' $select>$Status_name</option>";  
				  }
				  mysqli_free_result($result);
				  mysqli_close($con);
				?>
        </select>
        <input type="submit" value="submit"/>
        
</form>
</body>
</html>