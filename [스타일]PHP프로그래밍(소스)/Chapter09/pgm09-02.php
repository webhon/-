<?
	$dbconnect = mysql_connect("localhost", "wellbook", "password");
	if (!$dbconnect) {
		die("[연결안됨]" . mysql_error());
	}
	echo "[연결됨]<br>";
	$flag = mysql_select_db("wellbookdb");
	if (!$flag) die("[선택실패]".mysql_error());
	else echo "데이터베이스 [wellbookdb]가 선택됨<br>";
	mysql_close($dbconnect);
?>