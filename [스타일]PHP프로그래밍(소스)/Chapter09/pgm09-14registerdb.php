<?
	$id=$_POST["id"];
	$passwd=$_POST["passwd"];
	$passwd=md5($passwd);
	$sname=$_POST["sname"];
	$sno=$_POST["sno"];
	$dept=$_POST["dept"];
	$year=$_POST["year"];
	$email=$_POST["email"];

	$dbconnect = mysql_connect("localhost", "wellbook", "password");
	if (!$dbconnect) die("[����ȵ�]".mysql_error());
	if (!mysql_select_db("wellbookdb")) die("[���ý���]".mysql_error());

	$query = "insert into USER values('$id', '$passwd', '$sname', '$sno', '$dept', $year, '$enmail')";
	$result = mysql_query($query);
	if (!$result) die("[SQL ����]".mysql_error());
	echo "[��ϵǾ����ϴ�]<a href=\"pgm09-13.html\">�α���</a>";
	mysql_close($dbconnect);
?>