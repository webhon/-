<?php
include "./schedule_db.php.inc";

$YY=Date("Y");
if(!$mm) $mm=Date("m");
$dd=Date("d");

$i=1;
$cnt=0;
$yoil=Date("D",mktime(0,0,0,$mm,1,$YY));	//�� �� 1���� ����
$last=Date("t",mktime(0,0,0,$mm,1,$YY));		//�� �� ������ ��

if($mm > 1)
	$prev_month="<a href='$PHP_SELF?mm=".($mm-1)."'>��</a>";
else
	$prev_month="��";

if($mm < 12)
	$next_month="<a href='$PHP_SELF?mm=".($mm+1)."'>��</a>";
else
	$next_month="��";
?>

<html>
<head><title>������ �޷�</title>
<style type="text/css">
	a { text-decoration:none; }
</style>
<script language="javascript">
<!--
function new_win(yy,mm,dd)
{
	window.open("./7-1-3.php?yy="+yy+"&mm="+mm+"&dd="+dd,"","width=600,height=260,left=0,top=0");
}

function sch_win(yy,mm,dd)
{
	window.open("./schedule.php?yy="+yy+"&mm="+mm+"&dd="+dd,"","width=600,height=260,left=0,top=0");
}
//-->
</script>
</head>

<body>

<p align='center'><? echo $prev_month; ?>&nbsp;&nbsp;
<? echo $YY."�� ".$mm."�� "; ?>�޷�&nbsp;&nbsp;
<? echo $next_month; ?></p>

<table border='1' width='700' align='center'>
<tr>
	<td width='100'>��</td><td width='100'>��</td>
	<td width='100'>ȭ</td><td width='100'>��</td>
	<td width='100'>��</td><td width='100'>��</td>
	<td width='100'>��</td>
</tr>
<tr>

<?
while($i<=$last) {
	if($i == 1 && $yoil != "Sun") {
		switch($yoil) {
		case "Mon": echo str_repeat("<td>&nbsp;</td>",1); $cnt=1; break;
		case "Tue": echo str_repeat("<td>&nbsp;</td>",2); $cnt=2; break;
		case "Wed": echo str_repeat("<td>&nbsp;</td>",3); $cnt=3; break;
		case "Thu": echo str_repeat("<td>&nbsp;</td>",4); $cnt=4; break;
		case "Fri": echo str_repeat("<td>&nbsp;</td>",5); $cnt=5; break;
		case "Sat": echo str_repeat("<td>&nbsp;</td>",6); $cnt=6; break;
		}
	}

	$sql="select * from schedule_tbl where dat='$YY-$mm-$i'";
	$result=mysql_query($sql,$db);
	$list=mysql_num_rows($result);

	if(!$list) { $mark="&nbsp;"; }
	else { $mark="<a href='#' onClick='javascript:sch_win($YY,$mm,$i)'>*</a>"; }

	if($i == $dd)
		echo "<td><a href='#' onClick='javascript:new_win($YY,$mm,$i);'>".
			 "<font color='red'>$i</font></a><br>$mark</td>";
	else
		echo "<td><a href='#' onClick='javascript:new_win($YY,$mm,$i);'>".
			 "$i</a><br>$mark</td>";

	$i++; $cnt++;

	if($cnt%7 == 0) echo "</tr>";
}
mysql_close($db);
?>

</table>

</body>
</html>