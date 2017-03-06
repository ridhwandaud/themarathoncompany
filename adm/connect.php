<?php
$hostname="localhost"; 
$username="themarat_repc"; 
$password="admin@tmc.com";       
$database="themarat_repc_ariani";  
$con=mysql_connect($hostname,$username,$password);
if(! $con)
{
die('Connection Failed'.mysql_error());
}
mysql_select_db($database,$con);
?>
