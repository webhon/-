<html>
	<head><title>���չ��� 6-1</title></bead>
	<body>
<?
	$filename = "user.txt";
	$lines =  file($filename);

	echo "<table border=1 cellpadding=5>\n";
	echo "<tr bgcolor=#cccccc><th>����ھ��̵�</th><th>����� �̸�</th></tr>\n";
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