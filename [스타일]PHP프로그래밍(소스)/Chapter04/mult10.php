<html>
	<head><title>다양한 프로그램 예제 10</title></head>
	<body>
<?
	for ($i=0; $i<20; $i++) 
		$arr[$i] = rand() % 10;

	print_r($arr);
	echo "<p><hr><p>";
	for ($i=0; $i<10; $i++) $c[$i] = 0;
	for ($i=0; $i<20; $i++) $c[$arr[$i]]++;
	echo "<table align=\"center\" border=1 cellpadding=3>\n";
	echo "<tr><th>개수</th>";
	for ($i=0; $i<10; $i++) echo "<th>$i</th>\n";
	echo "</tr>\n";
	for ($i=0; $i<10; $i++) {
		echo "<tr>\n";
		echo "<td align=\"center\">\$c[".$i."]</td>"; 
		for ($j=0; $j < $c[$i]; $j++) 
			echo "<td bgcolor=\"#777777\">&nbsp;&nbsp;</td>"; 
		for ($j=0; $j < 10 - $c[$i]; $j++) echo "<td>&nbsp;&nbsp;</td>";
			echo "</tr>\n";
	}
	echo "</table>\n";
?>
	</body>
</html>