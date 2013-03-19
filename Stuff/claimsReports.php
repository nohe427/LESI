<?php
session_start();
?>
<!DOCTYPE html>

<head>
<meta http-equiv="Content-Language" content="en-us">
<meta http-equiv="Content-Type" content="text/html; charset=windows-1252">
<title>Security Report</title>
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
	var siteid = 63;
        var url = "SESSIONS.php?timein="+startTime;        //Send the time on the page to a php script of your choosing.
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
		<a href="Home2.php">
		<img border="0" src="Lower%20Shore%20Insurance%20Company%20Logo.png" width="128" height="128"></a></td>
		<td height="120" style="width: 3150px">
		<p align="center"><font size="7">Claims Report</font></td>
		<td height="120" width="881">
		You are currently logged in&nbsp; as:<br>
		<br><? echo $_SESSION['valid_user']; ?>
		<br>
		<a href="logout.php">Logout</a></td>
	</tr>
</table>
<?

//$connect = mysql_connect("localhost","apnohe","o79gmtype") or die("Could not connect");
Include "connection.php";
mysql_select_db("PROJECT2_NOHE") or die("Could not find DB");
$polNum = $_POST['polNum'];

$query = "SELECT * FROM CLAIM WHERE POLICY_ID = '".$polNum."'";
//echo $query;
$result = mysql_query($query);
$row = mysql_fetch_assoc($result);

?>




								<form name ="myform" method="post" action="<?php echo $_SERVER['PHP_SELF'];?>">
												<div class="style8">
																Which policy 
																would you like 
																to generate a 
																claim report 
																for?<br />
																<input name="polNum" type="text" value="<?php $_POST['custNum'];?>" style="width: 167px" />&nbsp;&nbsp;
																<input name="search" type="submit" value="Search" /><br />
																<br />
												</div>
								</form>
															<br />
<?
				
								if ($row > 0)
{
									echo "Claim ID: ".$row['CLAIM_NUM']."</br>";
									echo "Policy Number: ".$row['POLICY_ID']."</br>";
									echo "Date: ".$row['CLAIMDATE']."</br>";
									echo "Explanation: ".$row['CLAIMDESC']."</br>";
									echo "Image:</br>";
									//$image_query = "SELECT * FROM IMAGES WHERE ID = '".$row['IMAGE_ID']."'";
									//echo $image_query;
									//$image = mysql_query($image_query);
									//$imageArray = mysql_fetch_assoc($image);
									//$image = $imageArray['IMAGE'];
									//$filename = $imageArray['NAME'];
									//$ext = end(explode('.',$filename));
									//header("content-type: image/
									//echo '<img src="data:image/png;base64,' . base64_encode( pic.php?picid=$row['IMAGE_ID'] )" />';
									//echo $row['CLAIM_NUM'];
									echo '<img src = "getImage.php?id='.$row['CLAIM_NUM'].'" width="150" height="150">';	//REFERENCE TO PIC.PHP FUNCTION.........................
									//echo "After unsuccessful attempts at displaying the image the IT department has been contacted to correctly display the image.";

								}

								
								?>






								
</body>

</html>
