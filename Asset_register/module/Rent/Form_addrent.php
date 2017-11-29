<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>ยืม/คืน สินทรัพย์</title>
</head>
<body>
<form method="post" action="Add_rent.php" name="FormRent">
<input  type="hidden" name="Rent_id" value="<?php echo $Rent_id ?>" />
		<P>No : <input type="text" name="Rent_id" disabled="disabled"/></P>
		<P>รหัสสินทรัพย์ : <input type="text" name="Rent_asset"></P>
        
        <P>รหัสพนักงาน : <input type="text" name="Rent_emp"></P>
        <P>จุดใช้งาน : <input type="text" name="Rent_active">
        <?php /*?><P>จุดใช้งาน : <select name="Rent_active">
        	<?php
				  $sql=mysqli_query($con,"SELECT Active_id,Active_name FROM active_point ") 
				  or die ("mysql error=>>".mysql_error($con));
				  while(list($Active_id,$Active_name)=mysqli_fetch_row($sql)){
					  $select = $Active_id == $Rent_active? "selected":"";
				  echo "<option value='$Active_id' $select>$Active_name</option>";  
				  }
				  mysqli_free_result($sql);
				  mysqli_close($con);			
			?>
        </select>
        </P><?php */?>
        <P>วันที่ยืม : <input type="date" name="Rent_time" /></P>


<input type="submit" value="เพิ่มข้อมูล" />
<input type="reset" value="Reset" />
</form>
</body>
</html>