
<?php
session_start();

	//$connect = mysql_connect("localhost","apnohe","o79gmtype") or die("Could not connect");

Include "connection.php";

	mysql_select_db("PROJECT2_NOHE") or die("Could not find DB");
	$id = $_REQUEST['picid'];
	//$image_query = "SELECT * FROM CLAIM WHERE CLAIM_NUM = '$id'";
	//echo $image_query;
	$image = mysql_query("SELECT * FROM CLAIM WHERE CLAIM_NUM = '$id'");
	$imageArray = mysql_fetch_assoc($image);
	$image = $imageArray['PHOTO'];
	$filename = $imageArray['filename'];
	$ext = end(explode('.',$filename));
	header("content-type: PHOTO/$ext");	
	echo $image;
?>