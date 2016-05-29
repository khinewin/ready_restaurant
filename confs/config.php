<?php
$dbhost="localhost";
$dbuser="root";
$dbpass="apple";
$dbname="rs";

$conn=mysql_connect($dbhost, $dbuser, $dbpass);
mysql_select_db($dbname, $conn);
?>
