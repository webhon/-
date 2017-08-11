<?
	session_start();
	if (isset($_POST["sno"])) {
		$sno = $_SESSION["sno"] = $_POST["sno"];
	}
	$dbconnect = mysql_connect("localhost", "wellbook", "password");
	if (!$dbconnect) die("[연결안됨]".mysql_error());
	if (!mysql_select_db("wellbookdb")) die("[선택실패]".mysql_error());
	$query = "select * from STUDENT where sno = '$sno'";
	$result = mysql_query($query);
	if (!$result) die("[SQL 오류]".mysql_error());
	$row = mysql_fetch_object($result);

	echo "<hr>당신의 정보는 다음과 같습니다.<hr>";
	echo "학번 : ".$row->sno." <br>";
	echo "이름 : ".$row->name." <br>";
	echo "학과 : ".$row->deptname." <br>";
	echo "학년 : ".$row->year." <br>";
	echo "주소 : ".$row->addr." <br>";
	echo "전화 : ".$row->telno." <br>";
	echo "총학점 : ".$row->tcredits." <br>";
	echo "평점 : ".$row->gpa." <br>";
	echo "<hr>";
	mysql_close($dbconnect);
	$_SESSION["sinfo"] = serialize($row);

	$dbconnect = mysql_connect("localhost", "wellbook", "password");
	if (!$dbconnect) die("[연결안됨]".mysql_error());
	if (!mysql_select_db("wellbookdb")) die("[선택실패]".mysql_error());

	$query = "select * from COURSE";
	$result = mysql_query($query);
	if (!$result) die("[SQL 오류]".mysql_error());
	echo "<p><h3><b>수강신청과목</b></h3><br>";
	echo "<form action=\"pgm11-09.php\" method=\"POST\">\n";
	echo "<table border=1 cellpadding=3>\n";
	echo "<tr bgcolor=\"#cccccc\">
	 	<th>과목번호</th><th>과목명</th><th>개설학과</th>
		<th>시수</th><th>선택</th></tr>\n";
	while ($row = mysql_fetch_object($result)) {
		echo "<tr>\n";
		echo "<td align=\"center\">$row->courseno</td>\n"; 
		echo "<td align=\"center\">$row->coursename</td>\n"; 
		echo "<td align=\"center\">$row->deptname</td>\n"; 
		echo "<td align=\"center\">$row->credit</td>\n"; 
		echo "<td align=\"center\">
			<input type=\"checkbox\" name=\"courseno[]\" 
			value=".$row->courseno."></td>\n";
		echo "</tr>\n";
	}
	echo "<tr><td colspan=5 align=\"right\">
		<input type=\"submit\" value=\"선택\"></td></tr>\n";
	echo "</table>\n";
	echo "</form>";

	mysql_close($dbconnect);
?>