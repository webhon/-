<html>
	<head><title>���α׷� 4-7</title></head>
	<body>
<?
	$i = 0;
	do {
		$var = rand();
		$var %= 100;
		echo "[$var]";
		$i++;
	} while ($var != 99);

	echo "<p>�ݺ� Ƚ�� : $i<br>";

?>
	</body>
</html>