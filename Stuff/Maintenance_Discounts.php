<?php
  session_start();
  ?>
  <!DOCTYPE html>

<head>
<meta http-equiv="Content-Language" content="en-us">
<meta http-equiv="Content-Type" content="text/html; charset=windows-1252">
<title>Discount Maintenance</title>
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
	var siteid = 5;
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

<?
  // check session variable

  if ($_SESSION['level'] == 1)
  {
?>
<table border="1" width="983" height="120">
	<tr>
		<td height="120" width="86" style="border-style: solid; border-width: 1px">
		<a href="http://acadweb1.salisbury.edu/~apnohe/LESI/Home2.php">
		<img border="0" src="Lower%20Shore%20Insurance%20Company%20Logo.png" width="128" height="128"></a></td>
		<td height="120" style="width: 3150px">
		<p align="center"><font size="7">Discount Maintenance</font></td>
		<td height="120" width="881">
		You are currently logged in&nbsp; as:<br>
		<br><? echo $_SESSION['valid_user']; ?>
		<br>
		<a href="http://acadweb1.salisbury.edu/~apnohe/LESI/logout.php">Logout</a></td>
	</tr>
</table>

<form name="myform" form method="POST" action="Maintenance_Discounts.php">
	<p align="left">Discount Number :&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; <input type="text" name="D1" size="20"></p>
	<p align="left">Discount Description:&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
	<input type="text" name="D2" size="20"></p>
	<p align="left">Discount Amount:&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
	<input type="text" name="D3" size="20"></p>
	<input type="submit" value="Retrieve" name="B1" style="float: left">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
	<input type="submit" value="Insert" name="B3">&nbsp;&nbsp;&nbsp;&nbsp;
	<input type="submit" value="Modify" name="B4">&nbsp;&nbsp;&nbsp;&nbsp;
	<input type="submit" value="Delete" name="B5" onclick="go_there()">&nbsp;&nbsp;&nbsp;
	<input type="reset" value="Reset" name="B2"></p>
	<input type="hidden" name="jquery" value=" " />
</form>

<SCRIPT language="JavaScript">
<!--
function go_there()
{
 var where_to= confirm("Do you really want to delete this item?");
 if (where_to== true)
 {
 	var NUM = document.myform.D1.value
   document.myform.jquery.value = $query = "DELETE FROM DISCOUNTS WHERE DISCOUNT_NUM='"+NUM+"'";
   alert("You have deleted row '"+NUM+"'!");
	

 }
 else
 {
  alert('You chose not to delete anything.');
  jquery = "Select * FROM DISCOUNTS WHERE DISCOUNT_NUM = '"+NUM+"'";
  }
}

//-->
</SCRIPT>
<?
//Address Error Handling

ini_set('display_errors',1);
error_reporting(E_ALL & ~E_NOTICE);

//Attempt to Connect

$connection = @mysql_connect('localhost', 'apnohe', 'o79gmtype');

@mysql_select_db("PROJECT2_NOHE", $connection);

//Define the Owner Number php varaiable name

$D_NUM = $_POST['D1'];
$D_DESC = $_POST['D2'];
$D_AMT = $_POST['D3'];
//print "The owner number chosen was $owner<br />";
//$query = "Select * FROM Marina WHERE MARINA_NUM = '$Marina_Num'"; 
//Define the query! banana banana banana

// Escape User Input to help prevent SQL Injection
//$action = mysqlrealescape_string($action);
//$action = $_POST['action'];
if(isset($_POST['B1']))
{
//Retrieve
$query = "SELECT * FROM `DISCOUNTS` WHERE DISCOUNT_NUM = '$D_NUM'";
$tableQuery = "SELECT * FROM `DISCOUNTS` WHERE DISCOUNT_NUM = '$D_NUM'";
}
//Modify 
elseif(isset($_POST['B4'])) {
if($D_Num == "" || $D_DESC =="" || $D_AMT =="")
{
print '<script type="text/javascript">'; 
print 'alert("ALL FIELDS NEED TO BE FILLED OUT!")'; 
print '</script>';
}
Else
{
$query = "UPDATE `DISCOUNTS` SET `DISCOUNT_NUM`='$D_NUM',`DISCOUNTDESC`='$D_DESC',`DISCOUNTAMT`='$D_AMT' WHERE `DISCOUNT_NUM`='$D_NUM'";
$tableQuery = "SELECT * FROM `DISCOUNTS` WHERE DISCOUNT_NUM = '$D_NUM'";
print '<script type="text/javascript">'; 
print 'alert("You have modified row '. $_POST['D_NUM'].'!")'; 
print '</script>'; 
}
}
//Insert
elseif (isset($_POST['B3'])) {
if($D_Num == "" || $D_DESC =="" || $D_AMT =="")
{
print '<script type="text/javascript">'; 
print 'alert("ALL FIELDS NEED TO BE FILLED OUT!")'; 
print '</script>';
}
Else
{
$query = "INSERT INTO DISCOUNTS VALUES ('$D_NUM','$D_DESC','$D_AMT')";
$tableQuery = "SELECT * FROM `DISCOUNTS` WHERE DISCOUNT_NUM = '$D_NUM'";
print '<script type="text/javascript">'; 
print 'alert("You have added a row!")'; 
print '</script>'; 
}
}
//Delete
elseif (isset($_POST['B5'])) {
$query = $_POST['jquery'];
$tableQuery = "SELECT * FROM `DISCOUNTS` WHERE AGENT_ID = '$D_NUM'";
//print '<script type="text/javascript">'; 
//print 'alert("You have deleted row '. $_POST['D_NUM'].'!")'; 
//print '</script>'; 
}
else {
	"SELECT * FROM `DISCOUNTS` WHERE AGENT_ID = '$D_NUM'";
}



/*
//output the resulting query table banana banana banana banana

if(!empty($_REQUEST['Retrieve']))  
{  
  //Do update here..  
}  
else 
if(!empty($_REQUEST['Insert']))  
{  
  //Do insert Here  
} 
else 
if(!empty($_REQUEST['Modify']))  
{  
  //Do insert Here  
} 
else 
if(!empty($_REQUEST['Delete']))  
{  
  //Do insert Here  
} 


if ($r = mysql_query($query))
{
	while ($row = mysql_fetch_array($r)){
		print
	"<p>{$row['OWNER_NUM']}<br/>{$row['LAST_NAME']}<br/>{$row['FIRST_NAME']}<br/>{$row['ADDRESS']}<br/>
		{$row['CITY']}<br/>{$row['STATE']}<br/>{$row['ZIP']}<br/></p>\n";}

}*/
//wraps text with HTML tag strong
function strong($text){
	return "<STRONG>$text</STRONG>\n";
}

//Ends default text with HTML tag BR  WITH A DEFAULT OF JUST BR
function linebreak($text="\n") {
    echo nl2br( $text );
}

/**
 * Create a dynamic table with headers based on the column names
 * from a query. It automatically creates the table and the correct
 * number of columns.
 */

$queryLock = "LOCK TABLES DSICOUNTS WRITE;";
$queryUnlock = "UNLOCK TABLES;";
$querySelect = "SELECT * FROM `DISCOUNTS` WHERE DISCOUNT_NUM = '$D_NUM'";
$sqlresult = mysql_query($queryLock, $connection);
$sqlresult = mysql_query($querySelect, $connection);
$sqlresult = mysql_query($query, $connection);
$sqlresult = mysql_query($queryUnlock, $connection);

//if $query != ""

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
    linebreak();
}
createDynamicHTMLTable("DISCOUNTS", "SELECT * FROM `DISCOUNTS` WHERE DISCOUNT_NUM = '$D_NUM'", $connection);
//This is the error I am getting right now...
//banana banana banana banana banana
}


  else
  {
?>
<table border="1" width="983" height="120">
	<tr>
		<td height="120" width="86" style="border-style: solid; border-width: 1px">
		<a href="http://acadweb1.salisbury.edu/~apnohe/LESI/Home2.php">
		<img border="0" src="Lower%20Shore%20Insurance%20Company%20Logo.png" width="128" height="128"></a></td>
		<td height="120" style="width: 3150px">
		<p align="center"><font size="7">Unauthorized Access</font></td>
		<td height="120" width="881">
		You are currently logged in&nbsp; as:<br>
		<br><? echo $_SESSION['valid_user']; ?>
		<br>
		<a href="http://acadweb1.salisbury.edu/~apnohe/LESI/logout.php">Logout</a></td>
	</tr>
</table>
<?
echo '<p align="center">&nbsp;</p>';
echo'<ul>';
echo	'<li><font size="5">';
echo	'<a href="http://acadweb1.salisbury.edu/~apnohe/LESI/Home2.php">Click here ';
echo	'to return to the home screen.</a></font></li>';
echo'</ul>';

echo'<p>&nbsp;</p>';
}
?>