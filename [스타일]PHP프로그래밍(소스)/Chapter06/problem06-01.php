<html>
	<head><title>문제 6-1</title></head>
<?
	$fp = fopen("grade.txt", "r");

	echo "<table border =1 cellpadding=5>\n";
	echo "<tr bgcolor=#cccccc>\n";
	echo "<th>이름</th><th>국어</th><th>영어</th><th>정보</th>\n";
	echo "</tr>\n";

 	while (!feof($fp)) { 
		$line = fgets($fp, 4096);
		$info = split(":", $line);
		echo "<tr>\n";
		foreach ($info as $value) {
			echo "<td align=center>"; 
			echo $value;
			echo "</td>\n";
		}
		echo "</tr>";
	}
	fclose($fp);
	echo "</table>\n";
?> 
	</body>
</html>