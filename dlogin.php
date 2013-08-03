<? 
include_once"config.php";
$final_report="Please complete all the fields below..";
if(isset($_POST['login'])){
$username= trim($_POST['username']);
$password = trim($_POST['password']);
if($username == NULL OR $password == NULL){
$final_report="Please complete all the fields below..";
}else{
$check_user_data = mysql_query("SELECT * FROM `Staff` WHERE `Staff_ID` = '$username'") or die(mysql_error());
if(mysql_num_rows($check_user_data) == 0){
$final_report="Username or Password does not exist.";
}
$check_user_data2 = mysql_query("SELECT * FROM `Staff` WHERE `Password` = '$password'") or die(mysql_error());
if(mysql_num_rows($check_user_data2) == 0){
$final_report="Username or Password does not exist.";
}
$get_user_data = mysql_fetch_array($check_user_data);
if($get_user_data['Password'] == $password){
$start_idsess = $_SESSION['username'] = "".$get_user_data['Fname']."";
$start_passsess = $_SESSION['password'] = "".$get_user_data['Password']."";
setcookie("user",$username, time()+600);
$final_report="You are about to be logged in, please wait a few moments.. <meta http-equiv='Refresh' content='2; URL=doctor.php'/>";
}}}
?> 

<html>
<head>
<title>:: CDC :: Doctor Login</title>
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
<center><h3>Login Page</h3></center>
<form action="" method="post"> 
<center>
<table width="384" align="center" border="0"> <h5><? echo "<tr><td colspan='2' align = 'center'><font color = 'yellow'>".$final_report."</font></td></tr><tr>";?></h5>


  <tr> 
    <td>Username:</td> 
    <td><input type="text" name="username" size="30" maxlength="25"></td> 
  </tr> 
  <tr> 
    <td>Password:</td> 
    <td><input type="password" name="password" size="30" maxlength="25"></td> 
  </tr>
 
   <tr>
   <td>&nbsp;</td>
   <td><input type="submit" value="Login" name="login" ></td>
   </tr>
</table>
</center>
</form>

</body>
</html>
