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

<form method = "post" action = "patdet.php">
Enter Patient ID:
<input type = "text" name = "id" id = "id" size = "10">
<input type = "submit" value = "View Details" name = "submit">
</form>

<?php
$id = $_POST['id'];

try
{
$result = mysql_query("SELECT * FROM `Patient` WHERE Patient_ID='".$id."'") or die(mysql_error());

$no = mysql_num_rows($result);

if($no == 0)
{
    echo "No Record Found";
}
else{

echo "Personal Details:";
echo "<br><br><table border='2' cellspacing='5' cellpadding='5'>
<tr>
<th>First Name</th>
<th>Last Name</th>
<th>Age</th>
<th>Address</th>
<th>Mobile No</th>
<th>Blood Group</th>
</tr>";

while($row=mysql_fetch_array($result))
  {
  echo "<tr>";
  echo "<td>" . $row['Fname'] . "</td>";
  echo "<td>" . $row['Lname'] . "</td>";
  $age = date("Y-m-d") - $row['Bday'];
  echo "<td>" . $age . "</td>";
  echo "<td>" . $row['Address'] . "</td>";
  echo "<td>" . $row['Mobile'] . "</td>";  
  echo "<td>" . $row['BloodType'] . "</td>";
  echo "</tr>";
  }
echo "</table>";
echo "<br>";
}


$result = mysql_query("SELECT * FROM `Medical` WHERE Patient_ID='".$id."'") or die(mysql_error());

$no = mysql_num_rows($result);

if($no == 0)
{
    echo "<br>No Record Found";
}
else{echo "Past Treatment";
echo "<br><br><table border='2' cellspacing='5' cellpadding='5'>
<tr>
<th>Date</th>
<th>Condition</th>
<th>Treatment Done</th>
</tr>";

while($row=mysql_fetch_array($result))
  {
  echo "<tr>";
  echo "<td>" . $row['ML_Date'] . "</td>";
  echo "<td>" . $row['Condition'] . "</td>";  
  echo "<td>";
  if ($row['ML_Done'] == 0)
  	echo "No";
  else
  	echo "Yes";
  echo "</td>";
  echo "</tr>";
  }
echo "</table>";
echo "<br>";
}



$result = mysql_query("SELECT * FROM `PrescriptionMedicines` WHERE Patient_ID='".$id."'") or die(mysql_error());

$no = mysql_num_rows($result);

if($no == 0)
{
    echo "<br>No Record Found";
}
else{echo "Past Medications";
echo "<br><br><table border='2' cellspacing='5' cellpadding='5'>
<tr>
<th>Prescription No</th>
<th>Date</th>
<th>Medicine</th>
</tr>";

while($row=mysql_fetch_array($result))
  {
  echo "<tr>";
  echo "<td>" . $row['PM_No'] . "</td>";
  echo "<td>" . $row['PM_Date'] . "</td>";
  $ans = mysql_query("SELECT `Name` FROM `MedicineDescrip` WHERE Medicine_No = '".$row['Medicine_No']."'") or die (mysql_error());
  $row1=mysql_fetch_object($ans);
  echo "<td>" . $row1->Name ."</td>";
  echo "</tr>";
  }
echo "</table>";
echo "<br>";
}



$result = mysql_query("SELECT * FROM `ChronicDisease` WHERE Patient_ID='".$id."'") or die(mysql_error());

$no = mysql_num_rows($result);

if($no == 0)
{
    echo "<br>No Record Found";
}
else{echo "Chronic Diseases";
echo "<br><br><table border='2' cellspacing='5' cellpadding='5'>
<tr>
<th>Name</th>
<th>Diagnosis</th>
</tr>";

while($row=mysql_fetch_array($result))
  {
  echo "<tr>";
  echo "<td>" . $row['Name'] . "</td>";
  echo "<td>" . $row['Diagnosis'] . "</td>";
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
