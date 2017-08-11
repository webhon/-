<html>
	<head><title>프로그램 5-14</title></head>
	<body>
<?
   $s = $_POST["s"];
   $no = $_POST["no"];

	if (!$no) {
		echo "<table border=1>\n";
		echo "<tr><th>번호</th><th>입력된 숫자</th></tr>\n"; 
		echo "<tr><td align=\"center\">합계</td>";
		echo "<td align=\"center\">0</td></tr>\n";
		echo "</table>";
	}
	else {
		$s += $no;
		echo "<table border=1>\n";
		echo "<tr><th>번호</th><th>입력된 숫자</th></tr>\n"; 
		echo "<tr><td align=\"center\">합계</td>"; 
		echo "<td align=\"center\">".$s."</td></tr>"; 
		echo "</table>";
	}
?>

		<p>숫자 입력하기<br>
		<form action="pgm05-14.php" method="POST">
			<input type="text" name="no" size=5> &nbsp;
			<input type="hidden" name="s" value= <?= $s ?>>
			<input type="submit" value="누적하기">
		</form>
	</body>
</html>