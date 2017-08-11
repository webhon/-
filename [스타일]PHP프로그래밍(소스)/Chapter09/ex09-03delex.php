<?
	$tablename = $_GET["tn"];
	$no = $_POST["no"];

	$query = "delete from $tablename where no = $no";
	echo $query ."<br>";
	$dbconnect = mysql_connect("localhost", "wellbook", "password");
	if (!$dbconnect) die("[연결안됨]".mysql_error());
	if (!mysql_select_db("wellbookdb")) die("[선택실패]".mysql_error());

	$result = mysql_query($query);
	if (!$result) die("[SQL 오류]".mysql_error());
	echo "<p>삭제 되었습니다.<p>";
	mysql_close($dbconnect);
?>
<p>
<a href="mult20.html">데이터 조작어 메뉴로 돌아가기</a>