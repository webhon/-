<html>
	<head><title>프로그램 4-13</title></head>
	<body>
<?
	$arr = array("while", "do-while", "for", "foreach");
	while (list($k, $v) = each($arr)) {
		echo "키: $k - 값: $v<br/>\n";
	}
	echo "<hr>";
	foreach ($arr as $k => $v) {
		echo "키: $k - 값: $v<br/>\n";
	}
?> 
	</body>
</html>