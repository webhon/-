<?
$year=Date("Y");
$month=Date("m");
$day=Date("d");
$yoil=Date("D");

switch($yoil)
{
	case "Mon": $y="��"; $fn="./1.jpg"; break;
	case "Tue": $y="ȭ"; $fn="./2.jpg"; break;
	case "Wed": $y="��"; $fn="./3.jpg"; break;
	case "Thu": $y="��"; $fn="./4.jpg"; break;
	case "Fri": $y="��"; $fn="./5.jpg"; break;
	case "Sat": $y="��"; $fn="./6.jpg"; break;
	case "Sun": $y="��"; $fn="./7.jpg"; break;
}

$date_time=$year."�� ".$month."�� ".$day."�� ".$y."����";

echo "
<html>
<head><title>���Ϻ��� ���ȭ�� �ٲٱ�</title>
</head>

<body background='$fn'>

<p align='left'><font color=white><b>$date_time</b></font></p>

</body>
</html>
";
?>