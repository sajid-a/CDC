<html>
<head>
<title>::CDC:: Patient</title>
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

|| &nbsp <a href="patient.php">   Home     </a> &nbsp ||
 
&nbsp <a href="appointment.php"  style = "text-decoration:none;">   Make Appointment    </a> &nbsp ||

&nbsp <a href="sched.php"  style = "text-decoration:none;">   Doctor Schedule    </a> &nbsp ||

&nbsp <a href="history.php"  style = "text-decoration:none;">   My History    </a> &nbsp ||

&nbsp  <a href="logout.php"  style = "text-decoration:none;">   Logout   </a> &nbsp ||
</font>
<br><br>

<?php 


include_once"config.php";

if(!isset($_SESSION['username']) || !isset($_SESSION['password'])){
	header("Location: plogin.php");
}else{

$fetch_users_data = mysql_fetch_object(mysql_query("SELECT * FROM `Patient` WHERE Patient_ID='".$_SESSION['username']."'"));
$username = $_SESSION['username'];

if (isset($_COOKIE["user"]))
  ?><h2><?php echo "Welcome " . $username . "!<br />"; ?></h2><?
}
?>
Your Current Appointments are as follows:

<?php
try
{
$result = mysql_query("SELECT * FROM `Appointment` WHERE Patient_ID='".$_COOKIE["user"]."' and AP_Done = '0'") or die(mysql_error());

$no = mysql_num_rows($result);

if($no == 0)
{
    echo "No Current Appointments";
}
else{
echo "<br><br><table border='2' cellspacing='5' cellpadding='5'>
<tr>
<th>Date</th>
<th>Time</th>
<th>Name of Doctor</th>
</tr>";

while($row=mysql_fetch_array($result))
  {
  echo "<tr>";
  echo "<td>" . $row['AP_Date'] . "</td>";
  echo "<td>" . $row['AP_Time'] . "</td>";
  $ans = mysql_query("SELECT `Fname` FROM `Staff` WHERE Staff_ID = '".$row['Staff_ID']."'") or die (mysql_error());
  $row1=mysql_fetch_array($ans);
  echo "<td>".$row1['Fname']."</td>";
  echo "</tr>";
  }
echo "</table>";
echo "<br>";
}
mysql_close();
}

catch (Exception $e)
{
echo "<script>alert('Sorry!! You Have Not Taken An Appointment!!');</script>";
}
?>

</body>

</html>
