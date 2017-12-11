<?php
$host="localhost";
$username="root";
$pw="";
$db="hrstock";
$conn=mysql_connect($host,$username,$pw) or die(mysql_error());
$selectdb=mysql_select_db($db,$conn) or die(mysql_error());
?>