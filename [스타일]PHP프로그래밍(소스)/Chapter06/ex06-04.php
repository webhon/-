<html>
	<head><title>종합문제 6-1</title></bead>
	<body>
<?
	$filename = "user.txt";
	$lines =  file($filename);

	echo "<table border=1 cellpadding=5>\n";
	echo "<tr bgcolor=#cccccc><th>사용자아이디</th><th>사용자 이름</th></tr>\n";
	foreach ($lines as $line) {
		$line = split(":", $line);
		echo "<tr>";
		echo "<td align=center>$line[0]</td><td align=center>$line[3]</td>"; 
		echo "</tr>";
	}
	echo "</table>\n"; 
?>
	</body>
</html>