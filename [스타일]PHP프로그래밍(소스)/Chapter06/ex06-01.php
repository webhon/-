<html>
	<head><title>평가문제 6-1</title></head>
	<body>
<?
	$fp = fopen("info.txt", "r");
	if (fp) $line[0] = fgets($fp);
	if (fp) $line[1] = fgets($fp);
	fclose($fp);

	print_r($line);
?>
	</body>
</html>