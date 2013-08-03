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
Your Appointments for today:<br>
<?php

$date = date("Y-m-d");
$aa = $_COOKIE["user"];
try
{
$result = mysql_query("SELECT * FROM `Appointment` WHERE Staff_ID='".$aa."' and AP_Date = '".$date."'") or die(mysql_error());


$no = mysql_num_rows($result);

if($no == 0)
{
    echo "No Appointments";
}
else{
echo "<br><table border='2' cellspacing='5' cellpadding='5'>
<tr>
<th>Time</th>
<th>Name of Patient</th>
</tr>";

while($row=mysql_fetch_array($result))
  {
  echo "<tr>";
  echo "<td>" . $row['AP_Time'] . "</td>";
  $ans = mysql_query("SELECT `Fname` FROM `Patient` WHERE Patient_ID = '".$row['Patient_ID']."'") or die (mysql_error());
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
