<?PHP

$dbhost = "localhost";
$dbname = "studentdb";
$dbuser = "demo";
$dbpass = "demo";

mysql_connect ( $dbhost, $dbuser, $dbpass)or die("Could not connect: ".mysql_error());
mysql_select_db($dbname) or die(mysql_error());

$fname = $_POST['fname'];
$pno = $_POST['pno'];   
$rollno = $_POST['rollno'];
$branch = $_POST['branch'];
$year= $_POST['year'];
$gender=array('male','female');
$gender=$_POST['gender']; 
$date = $_POST['date'];
$month = $_POST['month'];
$byear = $_POST['byear'];
$age=2011-$byear;
$email=$_POST['email'];

switch($branch)
{
case Computers:
$checkuser = mysql_query("SELECT rollno FROM comps WHERE rollno='$rollno'");
$username_exist = mysql_num_rows($checkuser);
if($username_exist > 0)
{
    echo "I'm sorry but the Student you specified has already been registered.";
    unset($rollno);
    exit();
}

$query = "INSERT INTO comps (fname, lname, gender,date,month,byear,email, rollno, branch, year,age)
VALUES('$fname', '$lname', '$gender','$date','$month','$byear','$email','$rollno', '$branch', '$year','$age')";
mysql_query($query) or die(mysql_error());
mysql_close();
echo "Thank you $fname, you have successfully registered yourself into the student database";
echo "<br>";
echo "Please proceed ahead and enter your grades";
;
break;
  
  
case IT:

$checkuser = mysql_query("SELECT rollno FROM it WHERE rollno='$rollno'");
$username_exist = mysql_num_rows($checkuser);
if($username_exist > 0)
{
    echo "I'm sorry but the Student you specified has already been registered.";
    unset($rollno);
    include 'index.html';
    exit();
}

$query = "INSERT INTO it (fname, lname, gender,date,month,byear, email,rollno, branch, year,age)
VALUES('$fname', '$lname', '$gender','$date','$month','$byear','$email','$rollno', '$branch', '$year','$age')";
mysql_query($query) or die(mysql_error());
mysql_close();
echo "Thank you $fname, you have successfully registered yourself into the student database";
echo "\n";
echo "Please proceed ahead and enter your grades";
;
break;
  
  
case Extc:

$checkuser = mysql_query("SELECT rollno FROM extc WHERE rollno='$rollno'");
$username_exist = mysql_num_rows($checkuser);
if($username_exist > 0)
{
    echo "I'm sorry but the Student you specified has already been registered.";
    unset($rollno);
    include 'index.html';
    exit();
}

$query = "INSERT INTO extc (fname, lname, gender,date,month,byear,email, rollno, branch, year,age)
VALUES('$fname', '$lname', '$gender','$date','$month','$byear','$email','$rollno', '$branch', '$year','$age')";
mysql_query($query) or die(mysql_error());
mysql_close();
echo "Thank you $fname, you have successfully registered yourself into the student database";
echo "Please proceed ahead and enter your grades";
;
break;


case PPT:

$checkuser = mysql_query("SELECT rollno FROM ppt WHERE rollno='$rollno'");
$username_exist = mysql_num_rows($checkuser);
if($username_exist > 0)
{
    echo "I'm sorry but the Student you specified has already been registered.";
    unset($rollno);
    include 'index.html';
    exit();
}

$query = "INSERT INTO ppt (fname, lname, gender,date,month,byear,email, rollno, branch, year,age)
VALUES('$fname', '$lname', '$gender','$date','$month','$byear','$email','$rollno', '$branch', '$year','$age')";
mysql_query($query) or die(mysql_error());
mysql_close();
echo "Thank you $fname, you have successfully registered yourself into the student database";
echo "Please proceed ahead and enter your grades";
;
break;

default:
  echo "You din't select the branch !!";
}

echo "<script>alert('Thankyou for registering yourself !!');</script>";
echo "<br>";
print( '<a href="result.html">Click Here to enter your grades</a>' );
echo "<br>";
print( '<a href="homepage.html">Home</a>' );

?>