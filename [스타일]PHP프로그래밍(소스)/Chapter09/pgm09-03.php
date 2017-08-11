<?
	$dbconnect = mysql_connect("localhost", "wellbook", "password");
	if (!$dbconnect) die("[연결안됨]" . mysql_error());
	echo "[연결됨]<br>";

	if (!mysql_select_db("wellbookdb")) die("[선택실패]" . mysql_error());
	else echo "데이터베이스 [wellbookdb]이 선택됨<br>";

	$query = "select * from STUDENT";

	$result = mysql_query($query);
	if (!$result) die("[SQL 오류]".mysql_error());
	echo "결과 얻어옴.<br>";
	
	echo "속성의 개수 : ".mysql_num_fields($result)."<br>";
	echo "튜플의 개수 : ".mysql_num_rows($result)."<br>";

	mysql_close($dbconnect);
?>