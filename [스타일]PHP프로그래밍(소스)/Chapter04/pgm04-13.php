<html>
	<head><title>���α׷� 4-13</title></head>
	<body>
<?
	$arr = array("while", "do-while", "for", "foreach");
	while (list($k, $v) = each($arr)) {
		echo "Ű: $k - ��: $v<br/>\n";
	}
	echo "<hr>";
	foreach ($arr as $k => $v) {
		echo "Ű: $k - ��: $v<br/>\n";
	}
?> 
	</body>
</html>