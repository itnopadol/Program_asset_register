<?php
require("connect_db.php");


$us="INSERT INTO users VALUES ('$_POST[username]','$_POST[passwd]','$_POST[fullname]','$_POST[lastname]','$_POST[address]','$_POST[phone]','$_POST[email]','$_POST[type]')";

mysql_query($us) or die(mysql_error());

mysql_close();

echo "<script language='javascript'>window.location='login_form.php'</script>"
?>
