<html>
<head>
<title>:: CDC :: Home</title>
<link rel="stylesheet" type="text/css" href="master.css">
<link rel="shortcut icon" type="image/x-icon" href="images/favicon.ico">
</head>
<body link = "white" vlink = "white" text = "white">
<h1 style = "text-decoration:blink;">:: Clinical Diagnostic Center ::</h1>
<font size = "4" face = "Times New Roman">

|| &nbsp <a href="home.htm"  style = "text-decoration:none;">   Home     </a> &nbsp ||
 
&nbsp <a href="services.html"  style = "text-decoration:none;">   Our Services    </a> &nbsp ||

&nbsp <a href="facilities.html" style = "text-decoration:none;">   Facilities   </a> &nbsp ||
 
&nbsp <a href="appointment.html"  style = "text-decoration:none;">   Make Appointment    </a> &nbsp ||

&nbsp <a href="view.html"  style = "text-decoration:none;">   View Appointment    </a> &nbsp ||
 
&nbsp <a href="login.html"  style = "text-decoration:none;">   Report    </a> &nbsp ||
 
&nbsp  <a href="contactus.html"  style = "text-decoration:none;">   Contact Us   </a> &nbsp ||
</font> <br> <br> <br>
<center><img src = "images/appointment.jpg" alt = "Online Appointment"></center> <br> <br>

<center>

<?PHP

$dbhost = "localhost";
$dbname = "appdb";
$dbuser = "demo";
$dbpass = "demo";

mysql_connect ( $dbhost, $dbuser, $dbpass)or die("Could not connect: ".mysql_error());
mysql_select_db($dbname) or die(mysql_error());

$name = $_POST['name'];
$pno = $_POST['phone'];

try
{
$query = "select * from appointment where name = '$name' and pno = '$pno'";
mysql_query($query) or die("<script>alert('Sorry!! You Have Not Taken An Appointment!!');</script>  <script>document.location.href='appointment.html'</script>" );
$result = mysql_query($query); 

$no = mysql_num_rows($result);

if($no == 0)
{
    echo "<script>alert('Sorry!! You Have Not Taken An Appointment!!');</script>  <script>document.location.href='appointment.html'</script>" ;
}

echo "<table border='2' cellspacing='5' cellpadding='5'>
<tr>
<th>Name</th>
<th>Phone No.</th>
<th>E-mail</th>
<th>Appointment</th>
<th>Date - Time</th>
</tr>";

while($row=mysql_fetch_array($result))
  {
  echo "<tr>";
  echo "<td>" . $row['name'] . "</td>";
  echo "<td>" . $row['pno'] . "</td>";
  echo "<td>" . $row['email'] . "</td>";
  echo "<td>" . $row['app'] . "</td>";
  echo "<td>" . $row['dt'] . "</td>"; 
  echo "</tr>";
  }
echo "</table>";
echo "<br>";

mysql_close();
}

catch (Exception $e)
{
echo "<script>alert('Sorry!! You Have Not Taken An Appointment!!');</script>";
}
?>
</center>

 <br> <br>

            <table width="680" border="0" cellspacing="0" cellpadding="0" align="center">
              <tr align="left" valign="top"> 
                <td> <object classid="clsid:D27CDB6E-AE6D-11cf-96B8-444553540000" codebase="http://download.macromedia.com/pub/shockwave/cabs/flash/swflash.cab#version=5,0,0,0" width="680" height="135">
                    <param name=movie value="images/strip.swf">
                    <param name=quality value=high>
                    <param name="wmode" value="transparent">
                    <embed src="images/strip.swf" quality=high pluginspage="http://www.macromedia.com/shockwave/download/index.cgi?P1_Prod_Version=ShockwaveFlash" type="application/x-shockwave-flash" width="680" height="135" wmode="transparent">
                    </embed> 
                  </td>

              </tr>
            </table>
			</center>
<p align = "right"> Site Designed and Created by Sajid, Sharvil and Prasad<br>
Copyright &copy; 2011</p>
</body>
</html>

