<?php
error_reporting(E_ALL);
$hostname="localhost"; 
$username="root"; 
$password="";       
$database="repc";  
$con=mysql_connect($hostname,$username,$password);
if(! $con)
{
die('Connection Failed'.mysql_error());
}
mysql_select_db($database,$con);

error_reporting(E_ALL ^ E_DEPRECATED);

?>
