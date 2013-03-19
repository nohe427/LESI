<?php 
//header("Expires: Mon, 26 Jul 1997 05:00:00 GMT"); 
//header("Cache-Control: no-cache");
//  $db_conn = new mysqli('localhost', 'apnohe', 'o79gmtype', 'PROJECT2_NOHE');
//  if (mysqli_connect_errno()) {
//   echo 'Connection to database failed:'.mysqli_connect_error();
//  exit();
//  }
//<?php

//Address Error Handling

ini_set('display_errors',1);
error_reporting(E_ALL & ~E_NOTICE);

//Attempt to Connect

$connection = @mysql_connect ('localhost', 'apnohe', 'o79gmtype');

@mysql_select_db("PROJECT2_NOHE", $connection);

//include("./connect.php");        //Connect to the database.

$user = $_GET['userid'];


$query = "INSERT INTO `SESSIONS` (`TIMEIN`, `USER`, `TIMEOUT`, `SITE`) VALUES ('".$_GET["timein"]."', '".$_GET['userid']."', '".$_GET['timeout']."', '".$_GET['siteid']."')";        //Add them to the db.
//$query = mysql_query("INSERT INTO `SESSIONS` (`TIMEIN`, `USER`, `TIMEOUT`, `SITE`) VALUES ('".$_GET["timein"]."', '".$_GET['userid']."', '".$_GET['timeout']."', '".$_GET['siteid']."')");        //Add them to the db.
$sqlresult = mysql_query($query, $connection);

echo $query;

?> 