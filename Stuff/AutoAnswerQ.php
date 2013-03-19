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
	var siteid = 12;
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
	$amt = $_POST['T1'];
	$_SESSION['coverage'] = $amt;
	$age = $_POST['T2'];
	$_SESSION['age'] = $age;
	$deduct = $_POST['T3'];
	$goodStudent = $_POST['C1'];
	$twoYears = $_POST['C2'];
	$security = $_POST['C3'];
	$threeYear = $_POST['C4'];
	$multiYear = $_POST['C5'];
	$multiCar = $_POST['C6'];
	$multiPolicy = $_POST['C7'];
	$military = $_POST['C8'];

	if($age <= 25 )
	{
		$total = $amt * .06;
	}
	elseif ($age > 25)
	{
		$total = $amt * .05;
	}

	if($goodStudent !="")
	{
		$query = "SELECT DISCOUNTAMT FROM DISCOUNTS WHERE DISCOUNT_NUM = '1'";
		$sqlresult = mysql_query($query, $connection);
		$query_row = mysql_fetch_assoc($sqlresult);
		$amt = $query_row['DISCOUNTAMT'];
		$discount = $discount + $amt;
		$_SESSION['D1'] = 1;
		
	}
	if($twoYears !="")
	{
		$query = "SELECT DISCOUNTAMT FROM DISCOUNTS WHERE DISCOUNT_NUM = '2'";
		$sqlresult = mysql_query($query, $connection);
		$query_row = mysql_fetch_assoc($sqlresult);
		$amt = $query_row['DISCOUNTAMT'];
		$discount = $discount + $amt;
		$_SESSION['D2'] = 2;
	}
	if($security !="")
	{
		$query = "SELECT DISCOUNTAMT FROM DISCOUNTS WHERE DISCOUNT_NUM = '3'";
		$sqlresult = mysql_query($query, $connection);
		$query_row = mysql_fetch_assoc($sqlresult);
		$amt = $query_row['DISCOUNTAMT'];
		$discount = $discount + $amt;
		$_SESSION['D3'] = 3;	
	}	
	if($threeYear !="")
	{
		$query = "SELECT DISCOUNTAMT FROM DISCOUNTS WHERE DISCOUNT_NUM = '4'";
		$sqlresult = mysql_query($query, $connection);
		$query_row = mysql_fetch_assoc($sqlresult);
		$amt = $query_row['DISCOUNTAMT'];
		$discount = $discount + $amt;
		$_SESSION['D4'] = 4;
	}
	if($multiYear !="")
	{
		$query = "SELECT DISCOUNTAMT FROM DISCOUNTS WHERE DISCOUNT_NUM = '5'";
		$sqlresult = mysql_query($query, $connection);
		$query_row = mysql_fetch_assoc($sqlresult);
		$amt = $query_row['DISCOUNTAMT'];
		$discount = $discount + $amt;
		$_SESSION['D5'] = 5;
	}
	if($multiCar !="")
	{
		$query = "SELECT DISCOUNTAMT FROM DISCOUNTS WHERE DISCOUNT_NUM = '6'";
		$sqlresult = mysql_query($query, $connection);
		$query_row = mysql_fetch_assoc($sqlresult);
		$amt = $query_row['DISCOUNTAMT'];
		$discount = $discount + $amt;
		$_SESSION['D6'] = 6;
	}
	if($multiPolicy !="")
	{
		$query = "SELECT DISCOUNTAMT FROM DISCOUNTS WHERE DISCOUNT_NUM = '7'";
		$sqlresult = mysql_query($query, $connection);
		$query_row = mysql_fetch_assoc($sqlresult);
		$amt = $query_row['DISCOUNTAMT'];
		$discount = $discount + $amt;
		$_SESSION['D7'] = 7;
	}
	if($military !="")
	{
		$query = "SELECT DISCOUNTAMT FROM DISCOUNTS WHERE DISCOUNT_NUM = '8'";
		$sqlresult = mysql_query($query, $connection);
		$query_row = mysql_fetch_assoc($sqlresult);
		$amt = $query_row['DISCOUNTAMT'];
		$discount = $discount + $amt;
		$_SESSION['D8'] = 8;
	}
	
	if($deduct !="")
	{
		$times = (int)$deduct/ 500;
		$reduc = .05 * $times;
	}
	$discount = $discount + $reduc;

	$total = $total * (1 - $dsicount);
//	echo "The total amount due on";
//	echo $total;

	$date = new DateTime();
	$interval = new DateInterval('P1M');

	$date->add($interval);
	$pendingquery = "INSERT INTO `PENDING`(`USERID`, `AMT`, `DUEDATE`) VALUES ('".$_SESSION['valid_user']."','".$total."','".$date->format('Y-m-d')."')";
	//$_SESSION['query'] = $pendingquery;
	$_SESSION['dueDate'] = $date->format('Y-m-d');

	//$date->add($interval);
	//echo $date->format('Y-m-d') . "\n";

	//$currentdate = select curdate();
	//$datedue = 0;
	//echo $currentdate;
	$total = $total * (1 - $dsicount);
	echo "The total amount due ";
	echo $date->format('Y-m-d') . "\n";
	echo " is $";
	echo $total;

$_SESSION['date_due'] = $date->format('Y-m-d');
$_SESSION['amtdue'] = $total;
$_SESSION['type'] = 1;
$_SESSION['cust_num'] = $CUST_NUMBER;
$_SESSION['deduct'] = $deduct;
$_SESSION['total'] = $total;


//$_SESSION['id'] = mysql_insert_id(
//$id = 
//$_SESSION['insert'] = "INSERT INTO `POLICY`(`TYPEOFINSURID`, `DEDUCTABLE`, `CUST_NUM`, `CUST_AGE`, `COVERAGE`) VALUES ('1','".$deduct."','".$CUST_NUMBER."','".$age."','".$amtc."')";

echo '<p align="center">&nbsp;</p>';
echo'<ul>';
echo	'<li><font size="5">';
echo	'<a href="http://54.225.224.84/LESI/Home.html">Click to ';
echo	'return home </a></font></li>';
echo'</ul>';
echo'<p>&nbsp;</p>';
echo'<ul>';
echo	'<li><font size="5">';
echo	'<a href="http://54.225.224.84/LESI/Register.php">or click to  Register.</a></font></li>';
echo'</ul>';
//echo '<p>'.$_SESSION['level'].'user</p>';
	

?>
