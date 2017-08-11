<? session_start(); ?>
<html>
	<head><title>도서 대여 장바구니 프로그램</title></head>
	<body>
		<b><h3><center>도서목록</center></h3></b>

		<?
		echo "<p align=\"center\"><a href=\"pgm10-17.php\">장바구니 보기</a>";
		if (isset($_POST["f_books"])) {
			if (!empty($_SESSION["books"])) {
				$books = array_unique(
				array_merge(unserialize($_SESSION["books"]), $_POST["f_books"]));
				$_SESSION["books"] = serialize($books);
			}
			else 
				$_SESSION["books"] = serialize($_POST["f_books"]);
	  
			echo "<p align=\"center\">장바구니에 저장되었습니다!</p>";
		}
		$dbconnect = mysql_connect("localhost", "wellbook", "password");
		if (!$dbconnect) die("[연결안됨]".mysql_error());
		if (!mysql_select_db("wellbookdb")) die("[선택실패]".mysql_error());
	   
		$query = "select no, author, title from BOOK";
		$result = mysql_query($query);
		if (!$result) die("[SQL 오류]".mysql_error());

		echo "<form action=\"pgm10-16.php\" method=\"POST\">\n";
		echo "<table border=1 cellpadding=3 align=\"center\">\n";
		echo "<tr bgcolor=\"#cccccc\">";
		echo "<th>도서번호</th><th>도서명</th><th>저자</th><th>대여</th>";
		echo "</tr>\n";
		while($row = mysql_fetch_row($result)) {
			echo "<tr>\n";
			echo "<td align=\"center\">$row[0]</td>\n";
			echo "<td align=\"center\">$row[2]</td>\n";
			echo "<td align=\"center\">$row[1]</td>\n";
			echo "<td align=\"center\">
				<input type=\"checkbox\" name=\"f_books[]\" value=\"$row[2]\"></td>\n";
			echo("</tr>\n");
		}
		echo "<tr>\n";
		echo "<td align=\"right\" colspan=4><input type=\"submit\" value=\"선택\"></td>";
		echo "</tr>\n";
		echo("</table>");
		echo "</form>\n";
		mysql_close($dbconnect);
		?>
		</body>
</html>