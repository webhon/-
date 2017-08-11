<?
	$id=$_POST["id"];
	$passwd1=$_POST["passwd1"];
	$passwd1=md5($passwd1);
	$passwd2=$_POST["passwd2"];
	$passwd2=md5($passwd2);
	$sname=$_POST["sname"];
	$sno=$_POST["sno"];
	$dept=$_POST["dept"];
	$year=$_POST["year"];
	$email=$_POST["email"];

	if ($passwd1 == $passwd2) {
		$dbconnect = mysql_connect("localhost", "wellbook", "password");
		if (!$dbconnect) die("[연결안됨]".mysql_error());
		if (!mysql_select_db("wellbookdb")) die("[선택실패]".mysql_error());

		$query = "insert into USER values('$id', '$passwd1', '$sname', '$sno', '$dept', $year, '$enmail')";
		$result = mysql_query($query);
		if (!$result) die("[SQL 오류]".mysql_error());
		echo "[등록되었습니다]<a href=\"pgm09-13.html\">로그인</a>";
		mysql_close($dbconnect);
	}
	else {
			echo "암호가 일치하지 않습니다. 다시 입력하시기 바랍니다. <a href=ex09-01.php>정보입력</a>"; 
	}
?>