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
try
{
$result = mysql_query("SELECT * FROM `Medicine`") or die(mysql_error());

$no = mysql_num_rows($result);

if($no == 0)
{
    echo "No Stock";
}
else{

echo "Stock Details:";
echo "<br><br><table border='2' cellspacing='5' cellpadding='5'>
<tr>
<th>Medicine</th>
<th>Supplier</th>
<th>Invoice No</th>
<th>Quantity</th>
<th>Unit</th>
<th>Expiry</th>
</tr>";

while($row=mysql_fetch_array($result))
  {
  echo "<tr>";
    $ans = mysql_query("SELECT `Name` FROM `MedicineDescrip` WHERE Medicine_No = '".$row['Medicine_No']."'") or die (mysql_error());
  $row1=mysql_fetch_object($ans);
  echo "<td>" . $row1->Name ."</td>";
  $ans = mysql_query("SELECT `Name` FROM `Supplier` WHERE Supplier_No = '".$row['Supplier_No']."'") or die (mysql_error());
  $row2=mysql_fetch_object($ans);
  echo "<td>" . $row2->Name ."</td>";  
  echo "<td>" . $row['Invoice_No'] . "</td>";
  echo "<td>" . $row['Qty'] . "</td>";
  echo "<td>" . $row['Unit'] . "</td>";
  echo "<td>" . $row['Expire'] . "</td>";
  echo "</tr>";
  }
echo "</table>";
echo "<br>";
}
}

catch (Exception $e)
{

}
?>
</body>

</html>
