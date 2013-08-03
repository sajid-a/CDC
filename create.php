<html>
<head>
<title>::CDC:: Doctor</title>
<link rel="stylesheet" type="text/css" href="master.css">
<link rel="shortcut icon" type="image/x-icon" href="images/favicon.ico">

<style>

a:link{ text-decoration: none;
	color: white;
}
	
a:visited{ text-decoration: none;
	color: white;
}

a:hover{ text-decoration: unerline;
	color: blue;
	font-weight: bolder;
	letter-spacing: 2px;
}

</style>

</head>
<body link = "white" vlink = "white" text = "white">
<h1 style = "text-decoration:blink;">:: Clinical Diagnostic Center ::</h1>
<font size = "4" face = "Times New Roman">

|| &nbsp <a href="doctor.php">   Home     </a> &nbsp ||
 
&nbsp <a href="patdet.php"  style = "text-decoration:none;">   Patient Details    </a> &nbsp ||

&nbsp <a href="presc.php"  style = "text-decoration:none;">   Prescription    </a> &nbsp ||

&nbsp <a href="stock.php"  style = "text-decoration:none;">   Medicine Stock    </a> &nbsp ||

&nbsp  <a href="logout.php"  style = "text-decoration:none;">   Logout   </a> &nbsp ||
</font>
<br><br>
<?php 


include_once"config.php";

if(!isset($_SESSION['username']) || !isset($_SESSION['password'])){
	header("Location: plogin.php");
}else{

$fetch_users_data = mysql_fetch_object(mysql_query("SELECT * FROM `Staff` WHERE Staff_ID='".$_SESSION['username']."'"));
$username = $_SESSION['username'];

if (isset($_COOKIE["user"]))
  ?><h2><?php echo "Welcome " . $username . "!<br />"; ?></h2><?
}
?>

<?php

$id = $_POST['id'];
$pid = $_POST['pid'];
$med = $_POST['App'];
$date = date("Y-m-d");
$time = date("G:i:s", time());

try
{
$query = "INSERT INTO PrescriptionMedicines (PM_No, Medicine_No, PM_Date, PM_Time, Patient_ID) values ('$id', '$med', '$date', '$time', '$pid')";
mysql_query($query) or die(mysql_error());

mysql_query("UPDATE Appointment SET AP_Done = '1' where Patient_ID = '$pid' and AP_Date = '$date'") or die(mysql_error());

mysql_close();
echo "<script>alert('Prescription Created !!');</script>;</script>  <script>document.location.href='doctor.php'</script>";
}

catch (Exception $e)
{
echo "<script>alert('Sorry!! Someone has already taken an appointment for that time!!');</script>";
}

echo"<meta http-equiv='Refresh' content='2; URL=doctor.php'/>";

?>

</body>

</html>
