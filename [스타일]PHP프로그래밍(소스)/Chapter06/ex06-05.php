<html>
	<head><title>종합문제 6-2</title></head>
	<body>
<?
	include("pgm06-12.inc");

	echo "<h2>방명록</h2>"; 

	$no = 1;
	if (file_exists($guestbook)) {
		echo "<table border=1 cellpadding=5 width=670>\n";
		echo "<tr><th>번호</th><th>작성자이름</th>\n";
		echo "<th width=300>메시지</th><th>삭제</th><th>갱신</th></tr>\n";

		$lines = file($guestbook);
		foreach ($lines as $line) {
			$data = split(":", $line);
			list($name, $msg, $passwd) = $data;
			echo "<tr>\n";
			echo "<td align=center> $no </td>";
			echo "<td align=center> $name </td>";
			echo "<td> $msg </td>";
			echo "<td align=center>
				<a href=\"pgm06-14.php?no=".($no-1)."\">삭제</a> </td>";
			echo "<td align=center> 
				<a href=\"ex06-05updateform.php?no=".($no-1)."\">수정</a>
				</td>";
			echo "</tr>\n";

			$no++;
		}
		echo "</table>\n";
	}
	else {
		echo "<p>방명록이 비어 있습니다.";
	}

?>
	<p><a href="pgm06-13.php">방명록 입력</a>
	</body>
</html>

