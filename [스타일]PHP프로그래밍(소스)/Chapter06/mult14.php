<html>
	<head><title>다양한 프로그램 예제 14</title></head>
	<body>
<?
	$lines = file("data.txt");
	foreach ($lines as $line) {
		switch ($line[0]) {
			case "1" : echo "<b> $line </b> <br>"; break;
			case "2" : echo "<i> $line </i> <br>"; break;
			case "3" : echo "<u> $line </u> <br>"; break;
		}
	}
?>
	</body>
</html>