<?php
session_start();?>

<!DOCTYPE html>

<head>
<meta http-equiv="Content-Language" content="en-us">
<meta http-equiv="Content-Type" content="text/html; charset=windows-1252">
<title>Report</title>
<!--mstheme--><link rel="stylesheet" href="cany1011.css">
<meta name="Microsoft Theme" content="canyon 1011">
</head>
<script type="text/javascript">
    var startTime = new Date();        //Start the clock!
    window.onbeforeunload = function()        //When the user leaves the page(closes the window/tab, clicks a link)...
    {
        var endTime = new Date();        //Get the current time.
        var timeSpent = (endTime - startTime);        //Find out how long it's been.
        var xmlhttp;        //Make a variable for a new ajax request.
        if (window.XMLHttpRequest)        //If it's a decent browser...
        {
            // code for IE7+, Firefox, Chrome, Opera, Safari
            xmlhttp = new XMLHttpRequest();        //Open a new ajax request.
        }
        else        //If it's a bad browser...
        {
            // code for IE6, IE5
            xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");        //Open a different type of ajax call.
        }
	//alert(timeSpent);
	var siteid = 34;
        var url = "http://acadweb1.salisbury.edu/~apnohe/LESI/SESSIONS.php?timein="+startTime;        //Send the time on the page to a php script of your choosing.
	var userid = "<?php echo $_SESSION['valid_user']; ?>";
	var url2 = url+"&userid="+userid;
	var url3 = url2+"&timeout="+endTime;
	var url4 = url3+"&siteid="+siteid;
        xmlhttp.open("GET",url4,false);        //The false at the end tells ajax to use a synchronous call which wont be severed by the user leaving.
        xmlhttp.send(null);        //Send the request and don't wait for a response.
	
    }
//alert (startTime);
</script>
<table border="1" width="983" height="120">
	<tr>
		<td height="120" width="86" style="border-style: solid; border-width: 1px">
		<a href="http://acadweb1.salisbury.edu/~apnohe/LESI/Home2.php">
		<img border="0" src="Lower%20Shore%20Insurance%20Company%20Logo.png" width="128" height="128"></a></td>
		<td height="120" style="width: 3150px">
		<p align="center"><font size="7">Process Claim</font></td>
		<td height="120" width="881">
		You are currently logged in&nbsp; as:<br>
		<br><? echo $_SESSION['valid_user']; ?>
		<br>
		<a href="http://acadweb1.salisbury.edu/~apnohe/LESI/logout.php">Logout</a></td>
	</tr>
</table>
<body>



<?


$connect = mysql_connect("localhost","apnohe","o79gmtype") or die("Could not connect");
mysql_select_db("PROJECT2_NOHE") or die("Could not find DB");

$policy = $_POST['policyNum'];
$date = $_POST['date'];
$explanation = $_POST['explanation'];
//echo $date;
//echo $explanation;
//echo $policy;
$SaberToothTiger = $_POST['image'];


$file = $_FILES['image']['tmp_name'];
if (!isset($file))
	echo "Please select any image";
else{
	$image = addslashes(file_get_contents($_FILES['image']['tmp_name']));
	$image_name = addslashes($_FILES['image']['name']);
	//echo $image_name;
	$image_size = getimagesize($_FILES['image']['tmp_name']);
	if($image_size == FALSE){
		echo "This is not an image";
	}else{
		//$query = "INSERT INTO `CLAIM`(`CLAIMDATE`, `CLAIMDESC`, `POLICY_ID`, `PHOTO`, `filename') VALUES ('$date','$explanation','$policy','$image')";
		mysql_query("INSERT INTO `CLAIM`(`CLAIMDATE`, `CLAIMDESC`, `POLICY_ID`, `PHOTO`, `filename`) VALUES ('$date','$explanation','$policy','$image','$image_name')");
		echo "Claim Processed<br>";
		//echo $query;
		echo'<ul>';
echo	'<li><font size="5">';
echo	'<a href="http://acadweb1.salisbury.edu/~apnohe/LESI/Home2.php">Return ';
echo	'Home.</a></font></li>';
echo'</ul>';
	}

	$query = "SELECT * FROM IMAGES WHERE NAME = $image_name";
	$result = mysql_query($query);
	
	$row = mysql_fetch_assoc($query);
	$id = $row['ID'];

	echo $id;
	
}





?>


