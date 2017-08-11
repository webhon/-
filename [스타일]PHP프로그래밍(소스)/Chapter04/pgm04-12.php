<html>
	<head><title>프로그램 4-12</title></head>
	<body>
<?
	$stationery = array("연필" => 100, "지우개" => 200, "노트" => 1000, "볼펜" => 150);
	echo "<table border=1 cellpadding=5>\n";
	echo "<tr bgcolor=\"#cccccc\"><th>키</th><th>값</th>\n"; 
	while (list($name, $price) = each($stationery)) {
		echo "<tr>"; 
		echo "<td align=\"center\"><b>$name</b></td>"; 
		echo "<td align=\"right\">".number_format($price)." 원</td>";
		echo "</tr>\n";
	}
	echo "</table>\n";
?>
	</body>
</html>