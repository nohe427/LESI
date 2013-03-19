<?php
session_start();
//$_SESSION['valid_user'] = Guest;
//Address Error Handling

ini_set('display_errors',1);
error_reporting(E_ALL & ~E_NOTICE);

//Attempt to Connect

//$connection = @mysql_connect('localhost', 'apnohe', 'o79gmtype');
Include "connection.php";
@mysql_select_db("PROJECT2_NOHE", $connection);

$USER = $_SESSION['valid_user'];
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
	var siteid = 17;
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
		<p align="center"><font size="7">Auto Insurance</font></td>
		<td height="120" width="881">
		You are currently logged in&nbsp; as:<br>
		<br><? echo $_SESSION['valid_user']; ?>
		<br>
		<a href="logout.php">Logout</a></td>
	</tr>
</table>

<form name="myform" form method="POST" action="ConfirmPayment.php">
	<p align="left">Reciept :&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; <input type="text" name="Reciept" size="20"></p>
	<p align="left">Credit Card Number:&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; &nbsp;&nbsp;
	<input type="text" name="Credit_Num" size="20"></p>
	<input type="submit" value="Pay Bill" name="B1" style="float: left">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;

</form>

<?
$_SESSION['rec'] = $_POST['Reciept'];
$_SESSION['creditcard'] = $_POST['Credit_Num'];

function createDynamicHTMLTable($table_name, $sql_query, $link)
{
    // execute SQL query and get result
    $sql_result = mysql_query($sql_query, $link);
    if (($sql_result)||(mysql_errno == 0))
    {
        echo "<DIV>\n";
        //linebreak( strong( sprintf("Table: \"%s\"", $table_name) ) );
        echo "<TABLE borderColor=#000000 cellSpacing=0 cellPadding=6 border=2>\n";
        echo "<TBODY>\n";
        if (mysql_num_rows($sql_result)>0)
        {
            //loop thru the field names to print the correct headers
            $i = 0;
            echo "<TR vAlign=top bgColor=#0EE40B>\n";
            while ($i < mysql_num_fields($sql_result))
            {
                echo "<TH>". mysql_field_name($sql_result, $i) . "</TH>\n";
                $i++;
            }
            echo "</TR>\n";

            //display The data
            while ($rows = mysql_fetch_array($sql_result,MYSQL_ASSOC))
            {
                echo "<TR>\n";
                foreach ($rows as $data)
                {
                    echo "<TD align='center'>". $data . "</TD>\n";
                }
                echo "</TR>\n";
            }
        } else {
            echo "<TR>\n<TD colspan='" . ($i+1) . "'>No Results found!</TD></TR>\n";
        }

        echo "</TBODY>\n</TABLE>\n";
        echo "</DIV>\n";
    } else {
        echo nl2br( sprintf( "Error in running query: %s\n", mysql_error()) );
    }
//    mysql_free_result($sql_result);
    //linebreak();
}
createDynamicHTMLTable("PENDING", "SELECT `RECIEPT`,`AMT`,`DUEDATE` FROM `PENDING` WHERE USERID = '$USER'", $connection);
//This is the error I am getting right now...
//banana banana banana banana banana
?>
