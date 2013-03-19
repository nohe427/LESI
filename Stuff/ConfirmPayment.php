<?php
session_start();
//$_SESSION['valid_user'] = Guest;
//Address Error Handling

ini_set('display_errors',1);
error_reporting(E_ALL & ~E_NOTICE);

//Attempt to Connect

$connection = @mysql_connect('localhost', 'apnohe', 'o79gmtype');

@mysql_select_db("PROJECT2_NOHE", $connection);

		$query = "SELECT * FROM USERS, CUSTOMER WHERE CUSTOMER.USERID = '".$_SESSION['valid_user']."'";
		$sqlresult = mysql_query($query, $connection);
		$query_row = mysql_fetch_assoc($sqlresult);
		$CUST_NUMBER = $query_row['CUST_NUM'];
		//echo $CUST_NUMBER;
?>
<!DOCTYPE html>

<head>
<meta http-equiv="Content-Language" content="en-us">
<meta http-equiv="Content-Type" content="text/html; charset=windows-1252">
<title>Auto</title>
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
	var siteid = 18;
        var url = "http://54.225.224.84/LESI/SESSIONS.php?timein="+startTime;        //Send the time on the page to a php script of your choosing.
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
		<a href="http://54.225.224.84/LESI/Home2.php">
		<img border="0" src="Lower%20Shore%20Insurance%20Company%20Logo.png" width="128" height="128"></a></td>
		<td height="120" style="width: 3150px">
		<p align="center"><font size="7">Auto Insurance</font></td>
		<td height="120" width="881">
		You are currently logged in&nbsp; as:<br>
		<br><? echo $_SESSION['valid_user']; ?>
		<br>
		<a href="http://54.225.224.84/LESI/logout.php">Logout</a></td>
	</tr>
</table><br><br><br><br>
<?
		$query = "SELECT * FROM PENDING WHERE USERID = '".$_SESSION['valid_user']."' AND RECIEPT = '".$_POST['Reciept']."'";
		$sqlresult = mysql_query($query, $connection);
		$query_row = mysql_fetch_assoc($sqlresult);
		$pendingAmt = $query_row['AMT'];
		$date = $query_row['DUEDATE'];
		$rec = $query_row['RECIEPT'];
if (($_POST['Reciept'] == "") || ($_POST['Credit_Num'] == ""))
{
echo'<ul>';
echo	'<li><font size="5">';
echo	'<a href="http://54.225.224.84/LESI/BillPay.php">Click here to try again!</a></font></li>';
echo'</ul>';
}
else{
if ($_POST['Reciept'] == $rec)
{
$query = "INSERT INTO `BILLPAY`(`CUST_NUM`, `CREDITCARDNUM`, `AMT`, `POLICY_ID`) VALUES ('".$CUST_NUMBER."','".$_POST['Credit_Num']."','".$pendingAmt."','".$rec."')";
//echo $query;
$sqlresult = mysql_query($query, $connection);
$id = mysql_insert_id();
echo "Your payment was recieved of ";
echo $pendingAmt;
echo " on credit card number ";
echo $_POST['Credit_Num'];
echo " with record number ";
echo $id;

$query = "DELETE FROM `PENDING` WHERE `RECIEPT` = '".$rec."'";
$sqlresult = mysql_query($query, $connection);
}
else
{
echo'<ul>';
echo	'<li><font size="5">';
echo	'<a href="http://54.225.224.84/LESI/BillPay.php">Click here to try again!</a></font></li>';
echo'</ul>';
//echo '<p>'.$_SESSION['level'].'user</p>';
}
}

?>