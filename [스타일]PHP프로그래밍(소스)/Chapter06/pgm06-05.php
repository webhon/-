<html>
	<head><title>���α׷� 6-5</title></head>
	<body>
<?
	$fp = fopen("grade.txt", "r");
	while (!feof($fp)) { 
		$line = fgets($fp, 4096);
		echo "$line<br>";
	}
	fclose($fp);
?> 
	</body>
</html>