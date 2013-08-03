<?PHP

$dbhost = "localhost";
$dbname = "studentdb";
$dbuser = "demo";
$dbpass = "demo";

mysql_connect ( $dbhost, $dbuser, $dbpass)or die("Could not connect: ".mysql_error());
mysql_select_db($dbname) or die(mysql_error());

$sql="SELECT * FROM extc order by rollno";

$result = mysql_query($sql); 
echo "<table border='2' cellspacing='5' cellpadding='5'>
<tr>
<th>Firstname</th>
<th>Lastname</th>
<th>Gender</th>
<th>Age</th>
<th>Roll no.</th>
<th>Year</th>

</tr>";

while($row=mysql_fetch_array($result))
  {
  echo "<tr>";
  echo "<td>" . $row['fname'] . "</td>";
  echo "<td>" . $row['lname'] . "</td>";
  echo "<td>" . $row['gender'] . "</td>";
  echo "<td>" . $row['age'] . "</td>";
  echo "<td>" . $row['rollno'] . "</td>";
  echo "<td>" . $row['year'] . "</td>";
 
  echo "</tr>";
  }
echo "</table>";
echo "<br>";
print( '<a href="hoempage.html">Home</a>' );


?> 