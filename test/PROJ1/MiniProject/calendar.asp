<HTML>
<HEAD>
<TITLE>Choose a date/time</TITLE>
<LINK rel="stylesheet" type="text/css" href="Calendar.css">
</HEAD>
<BODY bgcolor="#D4D0C8">
<FORM method=post action="Calendar.asp?A=1&N=document.Subscription.date" id=Form1 name=Form1>
<table class=overall cellpadding=0 cellspacing=10>
<tr>
	<td>
		<table width=100 class='Calendar' cellpadding=4 cellspacing=0><tr class=Header><td>S</td><td>M</td><td>T</td><td>W</td><td>T</td><td>F</td><td>S</td><tr><td class=NormalDay>&nbsp;</td><td class=NormalDay>&nbsp;</td><td class=NormalDay>&nbsp;</td><td class=NormalDay>&nbsp;</td><td class=NormalDay><A href='javascript:ChangeDay(1);'>1</A></td><td class=NormalDay><A href='javascript:ChangeDay(2);'>2</A></td><td class=NormalDay><A href='javascript:ChangeDay(3);'>3</A></td></tr><tr><td class=NormalDay><A href='javascript:ChangeDay(4);'>4</A></td><td class=NormalDay><A href='javascript:ChangeDay(5);'>5</A></td><td class=NormalDay><A href='javascript:ChangeDay(6);'>6</A></td><td class=NormalDay><A href='javascript:ChangeDay(7);'>7</A></td><td class=NormalDay><A href='javascript:ChangeDay(8);'>8</A></td><td class=NormalDay><A href='javascript:ChangeDay(9);'>9</A></td><td class=NormalDay><A href='javascript:ChangeDay(10);'>10</A></td></tr><tr><td class=NormalDay><A href='javascript:ChangeDay(11);'>11</A></td><td class=NormalDay><A href='javascript:ChangeDay(12);'>12</A></td><td class=NormalDay><A href='javascript:ChangeDay(13);'>13</A></td><td class=NormalDay><A href='javascript:ChangeDay(14);'>14</A></td><td class=NormalDay><A href='javascript:ChangeDay(15);'>15</A></td><td class=NormalDay><A href='javascript:ChangeDay(16);'>16</A></td><td class=NormalDay><A href='javascript:ChangeDay(17);'>17</A></td></tr><tr><td class=NormalDay><A href='javascript:ChangeDay(18);'>18</A></td><td class=NormalDay><A href='javascript:ChangeDay(19);'>19</A></td><td class=NormalDay><A href='javascript:ChangeDay(20);'>20</A></td><td class=NormalDay><A href='javascript:ChangeDay(21);'>21</A></td><td class=NormalDay><A href='javascript:ChangeDay(22);'>22</A></td><td class=NormalDay><A href='javascript:ChangeDay(23);'>23</A></td><td class=NormalDay><A href='javascript:ChangeDay(24);'>24</A></td></tr><tr><td class=NormalDay><A href='javascript:ChangeDay(25);'>25</A></td><td class=NormalDay><A href='javascript:ChangeDay(26);'>26</A></td><td class=NormalDay><A href='javascript:ChangeDay(27);'>27</A></td><td class=NormalDay><A href='javascript:ChangeDay(28);'>28</A></td><td class=SelectedDay><input name=fldDay type=hidden value=29>29</td><td class=NormalDay><A href='javascript:ChangeDay(30);'>30</A></td><td class=NormalDay>&nbsp;</td></tr></tr></table>

	</td>
	<td valign=top>
		<table>
		<tr>
			<td class="Title">
				Month:<BR>
			</td>
			<td class="Title">

				Year:<BR>		
			</td>
		</tr>
		<tr>
			<td>
				<SELECT id=fldMonth name=fldMonth onchange="javascript:document.Form1.submit();">
				<OPTION value=1>January</OPTION><OPTION value=2>February</OPTION><OPTION value=3>March</OPTION><OPTION value=4>April</OPTION><OPTION value=5>May</OPTION><OPTION value=6>June</OPTION><OPTION value=7>July</OPTION><OPTION value=8>August</OPTION><OPTION value=9 SELECTED>September</OPTION><OPTION value=10>October</OPTION><OPTION value=11>November</OPTION><OPTION value=12>December</OPTION>

				</SELECT>
			</td>
			<td>
				<INPUT type="text" id=fldYear name=fldYear value="2011" size=3 maxlength=4  onblur="javascript:document.Form1.submit();"><BR>
			</td>
		</tr>
		<tr>
			<td colspan=2 class="Title">
				Time:<BR>

			</td>
		</tr>
		<tr>
			<td colspan=2>
				<select name='fldHour'><OPTION value='1'>01<OPTION value='2'>02<OPTION value='3'>03<OPTION value='4'>04<OPTION value='5'>05<OPTION value='6' SELECTED>06<OPTION value='7'>07<OPTION value='8'>08<OPTION value='9'>09<OPTION value='10'>10<OPTION value='11'>11<OPTION value='12'>12</select> <B>:</B> <select name='fldMinute'><OPTION value='0'>00<OPTION value='1'>01<OPTION value='2'>02<OPTION value='3'>03<OPTION value='4'>04<OPTION value='5'>05<OPTION value='6'>06<OPTION value='7'>07<OPTION value='8'>08<OPTION value='9'>09<OPTION value='10'>10<OPTION value='11'>11<OPTION value='12'>12<OPTION value='13'>13<OPTION value='14'>14<OPTION value='15'>15<OPTION value='16'>16<OPTION value='17'>17<OPTION value='18'>18<OPTION value='19'>19<OPTION value='20'>20<OPTION value='21'>21<OPTION value='22'>22<OPTION value='23'>23<OPTION value='24'>24<OPTION value='25'>25<OPTION value='26'>26<OPTION value='27'>27<OPTION value='28'>28<OPTION value='29'>29<OPTION value='30'>30<OPTION value='31' SELECTED>31<OPTION value='32'>32<OPTION value='33'>33<OPTION value='34'>34<OPTION value='35'>35<OPTION value='36'>36<OPTION value='37'>37<OPTION value='38'>38<OPTION value='39'>39<OPTION value='40'>40<OPTION value='41'>41<OPTION value='42'>42<OPTION value='43'>43<OPTION value='44'>44<OPTION value='45'>45<OPTION value='46'>46<OPTION value='47'>47<OPTION value='48'>48<OPTION value='49'>49<OPTION value='50'>50<OPTION value='51'>51<OPTION value='52'>52<OPTION value='53'>53<OPTION value='54'>54<OPTION value='55'>55<OPTION value='56'>56<OPTION value='57'>57<OPTION value='58'>58<OPTION value='59'>59</select>&nbsp;<select name='fldAMPM'><OPTION value='AM' SELECTED>AM<OPTION value='PM'>PM</select>

			</td>
		</tr>
		</table>
		<BR>
		<INPUT type="button" value="OK" id=cmdOK name=cmdOK class=Button onclick="javascript:SetDateOnParent();">&nbsp;
		<INPUT type="button" value="Cancel" id=cmdCancel name=cmdCancel class=Button onclick="javascript:window.close();">
	</td>
</tr>
</table>
</FORM>

</BODY>
</HTML>


<script language="javascript">
	function ChangeDay(v_lDay) {
		document.Form1.fldDay.value = v_lDay;
		document.Form1.submit();
	}
	
	function SetDateOnParent() {
		var sRetDateTime;
		var sHour = document.Form1.fldHour.value;
		var sMinute = document.Form1.fldMinute.value;
		var sAMPM = document.Form1.fldAMPM.value;
		
		if (sHour.length == 1) {
			sHour = '0' + sHour;
		}
		if (sMinute.length == 1) {
			sMinute = '0' + sMinute;
		}
	
		sRetDateTime = '9/29/2011 ' + sHour + ':' + sMinute + ' ' + sAMPM;
		window.opener.eval('document.Subscription.date').value = sRetDateTime;
		window.close();
	}
</script>