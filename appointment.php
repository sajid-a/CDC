<html>
<head>
<title>::CDC:: Patient</title>
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

<script language="JavaScript" type="text/JavaScript">


<!--


function Cost()
{
if(document.getElementById("App").value=="BloodTest")
	{document.getElementById("cost").value="100"}
	if(document.getElementById("App").value=="Xray")
	{document.getElementById("cost").value="200"}
	if(document.getElementById("App").value=="MRI")
	{document.getElementById("cost").value="600"}
	if(document.getElementById("App").value=="CTScan")
	{document.getElementById("cost").value="700"}
	if(document.getElementById("App").value=="Sonography")
	{document.getElementById("cost").value="800"}
}
//-->
</script>


</head>
<body link = "white" vlink = "white" text = "white">
<h1 style = "text-decoration:blink;">:: Clinical Diagnostic Center ::</h1>
<font size = "4" face = "Times New Roman">

|| &nbsp <a href="patient.php">   Home     </a> &nbsp ||
 
&nbsp <a href="appointment.php"  style = "text-decoration:none;">   Make Appointment    </a> &nbsp ||

&nbsp <a href="sched.php"  style = "text-decoration:none;">   Doctor Schedule    </a> &nbsp ||

&nbsp <a href="history.php"  style = "text-decoration:none;">   My History    </a> &nbsp ||

&nbsp  <a href="logout.php"  style = "text-decoration:none;">   Logout   </a> &nbsp ||
</font>
<br><br>

<?php 


include_once"config.php";

if(!isset($_SESSION['username']) || !isset($_SESSION['password'])){
	header("Location: plogin.php");
}else{

$fetch_users_data = mysql_fetch_object(mysql_query("SELECT * FROM `Patient` WHERE Patient_ID='".$_SESSION['username']."'"));
$username = $_SESSION['username'];

if (isset($_COOKIE["user"]))
  ?><h2><?php echo "Welcome " . $username . "!<br />"; ?></h2><?
}
?>
      <table width="100%" border="0" cellspacing="0" cellpadding="0" height="100%">

                <td>
                  <p class="content11black">Please fill in your details below to take an appointment online</p> <br>
                  <form action="insert.php" method=post name="Subscription" enctype=text>
                    <table border=0 cellpadding=2 cellspacing=1 width=550 align="center">
                      <tbody>
                        <tr align=left valign=middle> 
                          <td class=content11black>Appointment Regarding</td>

                          <td align=center class=content11black valign=middle>:</td>
                          <td class=content11black><select name="App" id="App" onChange = "javascript:Cost();">
                            <option value="">Select Option</option>
                            <option value="BloodTest">Blood Test</option>
                            <option value="MRI">MRI</option>
                            <option value="Xray">X-ray</option>
                            <option value="CTScan">CT Scan</option>
                            <option value="Sonography">Sonography</option></td>
                        </tr>
						
						<tr align=left valign=middle> 
                          <td class=content11black width=120>Cost </td>
                          <td align=center class=content11black valign=middle width=15>:</td>
                          <td class=content11black> <input type = "text" name=cost size=15 disabled="disabled" id="cost"> 
                          </td>
                        </tr>
						
                        <tr align=left valign=middle> 
                          <td class=content11black>Date</td>
                          <td align=center class=content11black valign=middle>:</td>
                          <td class=content11black><input name="date" type="text" id="date" size="20">
                        </tr>
                        <tr align=left valign=middle> 
                          <td class=content11black>Time</td>
                          <td align=center class=content11black valign=middle>:</td>
                          <td class=content11black><input name="time" type="text" id="time" size="20">
                        </tr>
                        <tr align=left valign=middle> 
                          <td class=content11black>Doctor</td>
                          <td align=center class=content11black valign=middle>:</td>
                          <td class=content11black><select name="Doc" id="Doc">
                            <option value="">Select Doctor</option>
                            <option value="A001">Admin</option>
				</td>
                        </tr>

                        <tr align=center valign=middle> 
                          <td bordercolor=#ffffff class=content11black colspan=3 height=35>  
                            <table width="200" border="0" cellspacing="0" cellpadding="0">
                              <tr align="center" valign="middle"> 
                                <td> <input name="Submit" type="submit" value="Submit"> 
                                </td>
                                <td> <input type="reset" name="Reset" value="Reset"> 
                                </td>
                              </tr>

                            </table></td>
                        </tr>
                      </tbody>
                    </table>
                  </form>
                  <br>
                  <ul>
                    <li class="content11black">Please give us 48 hours notice to confirm your appointment</li>
                  </ul>


</body>

</html>

