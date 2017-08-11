<?
	$nid = $_POST["id"];
	$passwd = $_POST["passwd"];
	$npasswd = md5($passwd);

	$dbconnect = mysql_connect("localhost", "wellbook", "password");
	if (!$dbconnect) die("[연결안됨]" . mysql_error());
	if (!mysql_select_db("wellbookdb")) die("[선택실패]".mysql_error());

	$query = "select * from USER where id = '$nid'";
	$result = mysql_query($query) ;
	if (!$result) die("[SQL 오류]".mysql_error());
	$row = mysql_fetch_row($result);
	mysql_close($dbconnect);

	list($id, $passwd, $sname, $sno, $dept, $year, $email) = $row;
	if ($npasswd == $passwd) {
		echo "<meta http-equiv=\"refresh\" content=\"0;url=pgm09-15list.php?id=$id&sname=$sname\">";
	}
	else {
		echo "암호가 일치하지 않습니다.<a href=\"pgm09-13.html\">로그인</a>" ;
	}
?>