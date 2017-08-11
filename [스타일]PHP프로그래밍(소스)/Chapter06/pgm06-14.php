<html>
	<head><title>프로그램 6-14</title></head>
	<body>
<?
	include("pgm06-12.inc");
   	echo "<h2>방명록 글 삭제하기</h2>"; 

	$no = $_GET["no"];

	if (file_exists($guestbook)) {
		$lines = file($guestbook);
		$line = $lines[$no];
		list($name, $msg, $passwd) = split(":", $line);
		echo "<form action=\"pgm06-14del.php\" method=\"post\">\n";
		echo "<input type=\"hidden\" name=\"n\o\" value=".$no.">\n";

		echo "<table border = 1 cellpadding=5>\n";
		echo "<tr>\n";
		echo "<td bgcolor=\"#cccccc\" align=\"center\">작성자이름</td>";
		echo "<td align=\"center\">$name</td>\n";
		echo "</tr>\n";

		echo "<tr>\n";
		echo "<td bgcolor=\"#cccccc\" align=\"center\">메시지</td>";
		echo "<td align=\"center\">$msg</td>\n";
		echo "</tr>\n";

		echo "<tr>\n";
		echo "<td bgcolor=\"#cccccc\" align=\"center\">비밀번호</td>";
		echo "<td align=\"center\"><input type=\"password\" name=\"npasswd\" size=8></td>\n";
		echo "</tr>\n";

		echo "<tr bgcolor=\"#cccccc\">\n";
		echo "<td colspan=2 align=\"center\"><input type=\"submit\" value=\"삭제하기\"></td>\n";
		echo "</tr>\n";
		echo "</table>";
		echo "</form>";
	}
?>
	</body>
</html>