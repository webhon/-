<html>
	<head><title>���α׷� 4-12</title></head>
	<body>
<?
	$stationery = array("����" => 100, "���찳" => 200, "��Ʈ" => 1000, "����" => 150);
	echo "<table border=1 cellpadding=5>\n";
	echo "<tr bgcolor=\"#cccccc\"><th>Ű</th><th>��</th>\n"; 
	while (list($name, $price) = each($stationery)) {
		echo "<tr>"; 
		echo "<td align=\"center\"><b>$name</b></td>"; 
		echo "<td align=\"right\">".number_format($price)." ��</td>";
		echo "</tr>\n";
	}
	echo "</table>\n";
?>
	</body>
</html>