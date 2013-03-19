<?php 
 // Connects to your Database
global $connection;
$connection = mysql_connect("your.hostaddress.com", "username", "password") or die(mysql_error()); 
 mysql_select_db("Database_Name") or die(mysql_error()); 
 ?> 