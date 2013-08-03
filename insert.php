<?php 


include_once"config.php";

$app = $_POST['App'];
$dt = $_POST['date'];
$time = $_POST['time'];
$doc = $_POST['Doc'];
$username = $_SESSION['username'];
  $ans = mysql_query("SELECT `Patient_ID` FROM `Patient` WHERE Fname = '$username'") or die (mysql_error());
  $row1=mysql_fetch_array($ans);
$id =  $row1['Patient_ID'];

try
{
$query = "INSERT INTO Appointment (AP_Date, AP_Time, Staff_ID, Patient_ID, AP_Done) values ('$dt', '$time', '$doc', '$id', '0')";
mysql_query($query) or die("<script>alert('Sorry!! Someone has already taken an appointment for that time!!');</script>  <script>document.location.href='appointment.php'</script>" );
mysql_close();
echo "<script>alert('Thank You for registering yourself !!');</script>;</script>  <script>document.location.href='patient.php'</script>";
}

catch (Exception $e)
{
echo "<script>alert('Sorry!! Someone has already taken an appointment for that time!!');</script>";
}

echo"<meta http-equiv='Refresh' content='2; URL=patient.php'/>";
?>
