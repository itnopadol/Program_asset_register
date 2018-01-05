<?php
require("connect_db.php");



$up="UPDATE list_orders SET tracking_id='$_POST[tracking_id]',order_status='4'  WHERE order_id='$_POST[order_id]'";
mysql_query($up)or die(mysql_error());
echo "<script language='javascript'>window.location='list_order_admin.php'</script>";
mysql_close();
?>
