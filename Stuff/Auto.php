<?php
session_start();
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
	var siteid = 9;
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
<body>

<form method="POST" action="AutoAnswer.php">
	<!--webbot bot="SaveResults" U-File="\\Nas\geogstud\an96387\COSC 386\LESI\_private\form_results.csv" S-Format="TEXT/CSV" S-Label-Fields="TRUE" -->
	<p><font face="Arial">Purchase Price of Vehicle or Present value :
	<input type="text" name="T1" size="20"></font></p>
	<p><font face="Arial">Drivers Age :
	<input type="text" name="T2" size="20"></font></p>
	<p><font face="Arial">Discounts:</font></p>
	<p style="line-height: normal; text-indent: 0in; text-align: left; direction: ltr; unicode-bidi: embed; vertical-align: baseline; word-break: normal; punctuation-wrap: hanging; margin: 0pt 0in">
	<span style="font-family: Arial; font-variant: normal; text-transform: none; font-weight: normal; font-style: normal; vertical-align: baseline">
	Good Student ( GPA 3.0+) <input type="checkbox" name="C1" value="ON"></span></p>
	<p style="line-height: normal; text-indent: 0in; text-align: left; direction: ltr; unicode-bidi: embed; vertical-align: baseline; word-break: normal; punctuation-wrap: hanging; margin: 0pt 0in">&nbsp;</p>
	<p style="line-height: normal; text-indent: 0in; text-align: left; direction: ltr; unicode-bidi: embed; vertical-align: baseline; word-break: normal; punctuation-wrap: hanging; margin: 0pt 0in">
	<span style="font-family: Arial; font-variant: normal; text-transform: none; font-weight: normal; font-style: normal; vertical-align: baseline">
	Accident-Free(2 Years) <input type="checkbox" name="C2" value="ON"></span></p>
	<p style="line-height: normal; text-indent: 0in; text-align: left; direction: ltr; unicode-bidi: embed; vertical-align: baseline; word-break: normal; punctuation-wrap: hanging; margin: 0pt 0in">&nbsp;</p>
	<p style="line-height: normal; text-indent: 0in; text-align: left; direction: ltr; unicode-bidi: embed; vertical-align: baseline; word-break: normal; punctuation-wrap: simple; margin: 0pt 0in">
	<span style="font-family: Arial; font-variant: normal; text-transform: none; font-weight: normal; font-style: normal; vertical-align: baseline">
	Security System <input type="checkbox" name="C3" value="ON"></span></p>
	<p style="line-height: normal; text-indent: 0in; text-align: left; direction: ltr; unicode-bidi: embed; vertical-align: baseline; word-break: normal; punctuation-wrap: simple; margin: 0pt 0in">&nbsp;</p>
	<p style="line-height: normal; text-indent: 0in; text-align: left; direction: ltr; unicode-bidi: embed; vertical-align: baseline; word-break: normal; punctuation-wrap: simple; margin: 0pt 0in">
	<span style="font-family: Arial; font-variant: normal; text-transform: none; font-weight: normal; font-style: normal; vertical-align: baseline">
	Accident-Free(3 Years) <input type="checkbox" name="C4" value="ON"></span></p>
	<p style="line-height: normal; text-indent: 0in; text-align: left; direction: ltr; unicode-bidi: embed; vertical-align: baseline; word-break: normal; punctuation-wrap: simple; margin: 0pt 0in">&nbsp;</p>
	<p style="line-height: normal; text-indent: 0in; text-align: left; direction: ltr; unicode-bidi: embed; vertical-align: baseline; word-break: normal; punctuation-wrap: simple; margin: 0pt 0in">
	<span style="font-family: Arial; font-variant: normal; text-transform: none; font-weight: normal; font-style: normal; vertical-align: baseline">
	Accident-Free(3 + years) <input type="checkbox" name="C5" value="ON"></span></p>
	<p style="line-height: normal; text-indent: 0in; text-align: left; direction: ltr; unicode-bidi: embed; vertical-align: baseline; word-break: normal; punctuation-wrap: simple; margin: 0pt 0in">&nbsp;</p>
	<p style="line-height: normal; text-indent: 0in; text-align: left; direction: ltr; unicode-bidi: embed; vertical-align: baseline; word-break: normal; punctuation-wrap: simple; margin: 0pt 0in">
	<span style="font-family: Arial; font-variant: normal; text-transform: none; font-weight: normal; font-style: normal; vertical-align: baseline">
	Multi-car <input type="checkbox" name="C6" value="ON"></span></p>
	<p style="line-height: normal; text-indent: 0in; text-align: left; direction: ltr; unicode-bidi: embed; vertical-align: baseline; word-break: normal; punctuation-wrap: simple; margin: 0pt 0in">&nbsp;</p>
	<p style="line-height: normal; text-indent: 0in; text-align: left; direction: ltr; unicode-bidi: embed; vertical-align: baseline; word-break: normal; punctuation-wrap: simple; margin: 0pt 0in">
	<span style="font-family: Arial; font-variant: normal; text-transform: none; font-weight: normal; font-style: normal; vertical-align: baseline">
	Multi-Policy <input type="checkbox" name="C7" value="ON"></span></p>
	<p style="line-height: normal; text-indent: 0in; text-align: left; direction: ltr; unicode-bidi: embed; vertical-align: baseline; word-break: normal; punctuation-wrap: simple; margin: 0pt 0in">&nbsp;</p>
	<p style="line-height: normal; text-indent: 0in; text-align: left; direction: ltr; unicode-bidi: embed; vertical-align: baseline; word-break: normal; punctuation-wrap: simple; margin: 0pt 0in">
	<span style="font-family: Arial; font-variant: normal; text-transform: none; font-weight: normal; font-style: normal; vertical-align: baseline">
	Military <input type="checkbox" name="C8" value="ON"></span></p>
	<p style="line-height: normal; text-indent: 0in; text-align: left; direction: ltr; unicode-bidi: embed; vertical-align: baseline; word-break: normal; punctuation-wrap: simple; margin: 0pt 0in">
	&nbsp;</p>
	<p style="line-height: normal; text-indent: 0in; text-align: left; direction: ltr; unicode-bidi: embed; vertical-align: baseline; word-break: normal; punctuation-wrap: simple; margin: 0pt 0in">
	<font face="Arial">Would like a deductible?</font></p>
	<p style="line-height: normal; text-indent: 0in; text-align: left; direction: ltr; unicode-bidi: embed; vertical-align: baseline; word-break: normal; punctuation-wrap: simple; margin: 0pt 0in">
	<font face="Arial">If so how much?
	<input type="text" name="T3" size="20"></font></p>
	<p>&nbsp;</p>
	<p><input type="submit" value="Submit" name="B1"><input type="reset" value="Reset" name="B2"></p>
</form>

</body>

</html>
