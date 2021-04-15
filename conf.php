<?php
$server="localhost";
$user="root";
$password="root";
$database="photoablum";
$conn=mysql_connect($server,$user,$password);
mysql_select_db($database,$conn);
mysql_query("SET NAMES utf8");
?>
