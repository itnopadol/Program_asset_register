<?php
	require("connect_db.php");
	$up="UPDATE list_orders SET order_status='$_GET[status_id]' WHERE order_id='$_GET[order_id]'";
	mysql_query($up)or die(mysql_error());
	echo "<script language='javascript'>window.location='order_list_admin.php'</script>";
	mysql_close();
?>
