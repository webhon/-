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
	if (!$dbconnect) die("[연결안됨]".mysql_error());
	if (!mysql_select_db("wellbookdb")) die("[선택실패]".mysql_error());

	$query = "insert into USER values('$id', '$passwd', '$sname', '$sno', '$dept', $year, '$enmail')";
	$result = mysql_query($query);
	if (!$result) die("[SQL 오류]".mysql_error());
	echo "[등록되었습니다]<a href=\"pgm09-13.html\">로그인</a>";
	mysql_close($dbconnect);
?>