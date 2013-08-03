<?PHP

$dbhost = "localhost";
$dbname = "demo";
$dbuser = "demo";
$dbpass = "demo";

mysql_connect ( $dbhost, $dbuser, $dbpass)or die("Could not connect: ".mysql_error());
mysql_select_db($dbname) or die(mysql_error());

$fname = $_POST['fname'];

$query = "INSERT INTO demo (fname)
VALUES('$fname')";
mysql_query($query) or die(mysql_error());
mysql_close();
echo "Thank you $fname, you have successfully registered yourself into the student database";
echo "<script>alert('Thankyou for registering yourself !!');</script>";
echo "<br>";
print( '<a href="result.html">Click Here to enter your grades</a>' );
echo "<br>";
print( '<a href="homepage.html">Home</a>' );

?>
