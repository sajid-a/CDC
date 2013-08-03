<? 

include_once"config.php";
$final_report= "Please complete the form below..";
if(isset($_POST['register'])){
$id = $_POST['id'];
$fname = $_POST['fname'];
$lname = $_POST['lname'];
$sex = $_POST['sex'];
$bday = $_POST['bday'];
$addr = $_POST['addr'];
$mobileno = $_POST['mobileno'];
$land = $_POST['land'];
$email = $_POST['email'];
$bgrp = $_POST['bgrp'];
$password = $_POST['password'];

if($fname == NULL OR $password == NULL OR $lname == NULL OR $email == NULL OR $mobileno == NULL OR $bday == NULL OR $addr == NULL)
{
$final_report= "Please complete the form below..";
}else{
if(strlen($fname) <= 2){
$final_report="Your First Name must be atleast 3  characters..";
}else{
$check_members = mysql_query("SELECT * FROM `Patient` WHERE `Mobile` = '$mobileno'");   
if(mysql_num_rows($check_members) != 0){
$final_report="The Phone Number is already in use!";  
}else{ 
if(strlen($password) <= 2){
$final_report="Your password must be atleast 3 characters..";
}else{
if(!preg_match("/^[_a-z0-9-]+(\.[_a-z0-9-]+)*@[a-z0-9-]+(\.[a-z0-9-]+)*(\.[a-z]{2,3})$/i", $email)){ 
$final_report="Your email address was not valid..";
}
else{
if(!preg_match("/^[7-9][0-9]{9}$/i",$mobileno)){
$final_report="Enter a valid mobile number..";
}else
{
$sql="INSERT INTO Patient (Patient_ID, Fname, Lname, Sex, Bday, Address, Mobile, Phone, Email, BloodType, Password)VALUES('$id','$fname','$lname','$sex','$bday','$addr','$mobileno','$land','$email','$bgrp','$password')";
$result=mysql_query($sql) or die(mysql_error());
if($result){
echo "<script>alert('Registration Successful!! Your Login ID is ".$id."');</script>  <script>document.location.href='plogin.php'</script>" ;
}


}}}}}}}
?>

<html>
<head>
<title>:: CDC :: Register</title>
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

|| &nbsp <a href="home.htm">   Home     </a> &nbsp ||
 
&nbsp <a href="services.html"  style = "text-decoration:none;">   Our Services    </a> &nbsp ||

&nbsp <a href="aboutus.html"  style = "text-decoration:none;">   About Us    </a> &nbsp ||

&nbsp <a href="facilities.html" style = "text-decoration:none;">   Facilities   </a> &nbsp ||
 
&nbsp <a href="plogin.php"  style = "text-decoration:none;">   Patient Login    </a> &nbsp ||

&nbsp <a href="dlogin.php"  style = "text-decoration:none;">   Doctor Login    </a> &nbsp ||
 
&nbsp  <a href="contactus.html"  style = "text-decoration:none;">   Contact Us   </a> &nbsp ||
</font>
<br><br>
  <center><h2>Registration Page</h2>
<form action="" method="post"> 
<center>
<table width="384" align="center" border="0"> <h5><? echo "<tr><td colspan='2' align = 'center'><font color = 'yellow'>".$final_report."</font></td></tr><tr>";?></h5>
  <tr>
    <td >ID:</td>
    <td><label>
      <input name="id" type="text" id="id" size="30" />
    </label></td>
  </tr>
  <tr>
  <tr>
    <td >First Name:</td>
    <td><label>
      <input name="fname" type="text" id="fname" size="30" />
    </label></td>
  </tr>
  <tr>
    <td>Last Name: </td>
    <td><input name="lname" type="text" id="lname" value="" size="30" /></td>
	</tr>
  <tr>
    <td>Sex:</td>
    <td><select id = "sex" name = "sex"><option value="Male">Male</option>
<option value="Female">Female</option></select></td>
  </tr>
    <tr>
    <td>Birth Date: </td>
    <td><input name="bday" type="text" id="bday" value="" size="10" /> (YYYY-MM-DD)</td>
	</tr>
    <tr>
    <td>Address: </td>
    <td><input name="addr" type="text" id="addr" value="" size="30" /></td>
	</tr>
	<tr>
    <td>Mobile No:</td>
    <td><input name="mobileno" type="text" id="mobileno" size="30" /></td>
  </tr>	
  <tr>
	<tr>
    <td>Landline No:</td>
    <td><input name="land" type="text" id="land" size="30" /></td>
  </tr>	
  <tr>
    <td>Email:</td>
    <td><input name="email" type="text" id="email" size="30" /></td>
  </tr>
    <tr>
    <td>Blood Group:</td>
    <td><select id = "bgrp" name = "bgrp"><option value="A+">A+</option>
<option value="A-">A-</option>
<option value="B+">B+</option>
<option value="B-">B-</option>
<option value="AB+">AB+</option>
<option value="AB-">AB-</option>
<option value="O+">O+</option>
<option value="O-">O-</option></select></td>
  </tr>
    <tr>
    <td>Password:</td>
    <td><input name="password" type="password" id="password" size="30" /></td>
  </tr>
  <tr>  
  
    <td>&nbsp;</td>
    <td><label>
      <input name="register" type="submit" id="register" value="Register"/>
    </label>
	<input type="reset" value="Reset"/></td>
  </tr>
</table>
</form>
</center>
</body>
</html>
