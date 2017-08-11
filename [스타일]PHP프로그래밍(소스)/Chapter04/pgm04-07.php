<html>
	<head><title>프로그램 4-7</title></head>
	<body>
<?
	$i = 0;
	do {
		$var = rand();
		$var %= 100;
		echo "[$var]";
		$i++;
	} while ($var != 99);

	echo "<p>반복 횟수 : $i<br>";

?>
	</body>
</html>