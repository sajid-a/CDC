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

$fetch_users_data = mysql_fetch_object(mysql_query("SELECT Patient_ID FROM `Patient` WHERE Fname='".$_SESSION['username']."'"));
$id = $fetch_users_data->Patient_ID;

$username = $_SESSION['username'];

if (isset($_COOKIE["user"]))
  ?><h2><?php echo "Welcome " . $username . "!<br />"; ?></h2><?
}
?>


<form method = "post" action = "sched.php">
Select Doctor's Name to view Schedule&nbsp;
<select name="App" id="App">
                            <option value="">Select Doctor</option>
                            <option value="A001">Admin</option>
                            </select>

<input type = "text" name = "date" id = "date" size = "10">
<input type = "submit" value = "View Schedule" name = "submit">
</form>

<?php
$id = $_POST['App'];
$date = $_POST['date'];
try
{
$result = mysql_query("SELECT * FROM `Appointment` WHERE Staff_ID='".$id."' and AP_Date = '".$date."'") or die(mysql_error());

$no = mysql_num_rows($result);

if($no == 0)
{
    echo "No Appointments";
}
else{
echo "<br><br><table border='2' cellspacing='5' cellpadding='5'>
<tr>
<th>Time</th>
<th>Type</th>
</tr>";

while($row=mysql_fetch_array($result))
  {
  echo "<tr>";
  echo "<td>" . $row['AP_Time'] . "</td>";
  echo "<td>Patient Appointment</td>";
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

<div id='myStyle'>
</div>

</body>
</html>
