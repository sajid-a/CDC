<? 

ob_start();session_start();
$dbhost = "localhost";
$dbname = "appdb";
$dbuser = "demo";
$dbpass = "demo";

mysql_connect ( $dbhost, $dbuser, $dbpass)or die("Could not connect: ".mysql_error());
mysql_select_db($dbname) or die(mysql_error());
 
?>