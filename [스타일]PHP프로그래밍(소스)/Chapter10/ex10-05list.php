<?
	session_start();
	echo "<html><head><title>종합문제 10-1(도서목록)</title></head><body>\n";
	
	$dbconnect = mysql_connect("localhost", "wellbook", "password");
	if (!$dbconnect) die("[연결안됨]".mysql_error());
	if (!mysql_select_db("wellbookdb")) die("[선택실패]".mysql_error());

	$query = "select * from BOOK";
	$result = mysql_query($query);
	if (!$result) die("[SQL 오류]".mysql_error());
	$sname = $_SESSION["sname"];
	echo "[<b>$sname</b>]님 환영합니다.";
	echo "&nbsp; &nbsp;<a href=\"pgm09-13.html\">로그아웃</a><br>";
	echo "<p><h3><center>도서목록</center></h3>";
	echo "<table border=1 cellpadding=3 align=\"center\">\n";
	echo "<tr bgcolor=\"#cccccc\">";
	echo "<th>번호</th><th>저자</th><th>제목</th><th>출판사</th><th>영역</th><th>신청</th>";
	echo "</tr>\n";
	while($row = mysql_fetch_row($result)) {
		echo "<tr>\n";
		echo "<td align=\"center\">$row[0]</td>\n";
		echo "<td align=\"center\">$row[1]</td>\n";
		echo "<td align=\"center\">$row[2]</td>\n";
		echo "<td align=\"center\">$row[3]</td>\n";
		echo "<td align=\"center\">$row[6]</td>\n";
		echo "<td align=\"center\">
			  <a href=\"ex10-06rental.php?no=$row[0]\">신청</a></td>\n";
		echo("</tr>\n");
	}
	echo("</table></body></html>");
	mysql_close($dbconnect);
?>