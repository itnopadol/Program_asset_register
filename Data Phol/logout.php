<?php
session_start();
session_destroy();
echo "<script language='javascript'>window.location='login_form.php'</script>";
?>