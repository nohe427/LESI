<?php
session_start();
?>
<!DOCTYPE html>

<head>
<meta http-equiv="Content-Language" content="en-us">
<meta http-equiv="Content-Type" content="text/html; charset=windows-1252">
<title>Welcome to Lower Eastern Shore I</title>
<!--mstheme--><link rel="stylesheet" href="cany1011.css">
<meta name="Microsoft Theme" content="canyon 1011">
</head>

<body>

<table border="1" width="983" height="120">
	<tr>
		<td height="120" width="86" style="border-style: solid; border-width: 1px">
		<a href="http://acadweb1.salisbury.edu/~apnohe/LESI/Register.php">
		<img border="0" src="Lower%20Shore%20Insurance%20Company%20Logo.png" width="128" height="128"></a></td>
		<td height="120" width="881">
		<p align="center"><font size="7">Registration</font></td>
	</tr>
</table>
<?
if (isset($_POST['userid']) && isset($_POST['password']) && isset($_POST['password_confirm']) && isset($_POST['f_name']) && isset($_POST['l_name']) && isset($_POST['address']) && isset($_POST['ssn']) && isset($_POST['phone_num']) && isset($_POST['dob']))
{
  // if the user has just tried to log in
  $userid = $_POST['userid'];
  $password = $_POST['password'];
  $AL = 4;
  $password_confirm = $_POST['password_confirm'];
  $f_name = $_POST['f_name'];
  $l_name = $_POST['l_name'];
  $address = $_POST['address'];
  $ssn = $_POST['ssn'];
  $phone_num = $_POST['phone_num'];
  $dob = $_POST['dob'];

  $db_conn = new mysqli('localhost', 'apnohe', 'o79gmtype', 'PROJECT2_NOHE');
	//echo $AL;
  if (mysqli_connect_errno()) {
   echo 'Connection to database failed:'.mysqli_connect_error();
   exit();
  }

  $query = 'select * from USERS '
           ."where USERID='$userid'";

  //echo $query;

  $result = $db_conn->query($query);
  if ($result->num_rows >0 )
  {
    // if they are in the database do not register the user and give them an error message
    //$_SESSION['valid_user'] = $userid;
    print '<script type="text/javascript">';
	print 'alert("The user name '. $_POST['userid'].' has already been taken!")';
	print '</script>';
		echo'<ul>';
		echo	'<li><font size="5">';
		echo	'<a href="http://acadweb1.salisbury.edu/~apnohe/LESI/Register.php">Please try to register again with a different username</a></font></li>';
		echo'</ul>';
  }
  else
  {
  //echo "alas klar";
  	if ($password == $_POST['password_confirm']) //Do the passwords match?
  	{
  		$querys = "INSERT INTO USERS VALUES ('$userid', '$password', '$AL')";
  		$results = $db_conn->query($querys);
  		$querys2 = "INSERT INTO CUSTOMER (`CUST_LASTNAME`, `CUST_FIRSTNAME`, `CUST_SOCIAL`, `CUST_ADDRESS`, `LOCATION_NUM`, `CUST_PHONE`, `CUST_DOB`, `USERID`)  VALUES ('$l_name', '$f_name', '$ssn', '$address', '$AL', '$phone_num', '$dob', '$userid')";
  		//echo $querys2;
 		$results2 = $db_conn->query($querys2);
		$_SESSION['level'] = 4;
		$_SESSION['valid_user'] = $userid;
		echo'<ul>';
		echo	'<li><font size="5">';
		echo	'<a href="http://acadweb1.salisbury.edu/~apnohe/LESI/Home2.php">You have successfully created a login.  Please continue to the home page.</a></font></li>';
		echo'</ul>';
  	}
  	else
  	{
  		print '<script type="text/javascript">';
		print 'alert("The passwords do not match!")';
		print '</script>';
		echo'<ul>';
		echo	'<li><font size="5">';
		echo	'<a href="http://acadweb1.salisbury.edu/~apnohe/LESI/Register.php">Please try to register again with matching passwords</a></font></li>';
		echo'</ul>';
	}
  }
  }
 else
 {
		echo'<ul>';
		echo	'<li><font size="5">';
		echo	'<a href="http://acadweb1.salisbury.edu/~apnohe/LESI/Register.php">Please try to register again with all the fields filled in</a></font></li>';
		echo'</ul>';
 }
 ?>
</html>