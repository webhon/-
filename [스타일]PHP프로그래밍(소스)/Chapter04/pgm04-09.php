<html>
	<head><title>���α׷� 4-9</title></head>
	<body>
<?
	$numbers = array(30, 53, 66, 19, 23);
	$sum = 0;
	foreach ($numbers as $point) {
		$sum += $point;
	}
	$avg = $sum / sizeof($numbers);

	print_r($numbers);
	echo "<hr>";
	echo "�����<b> $avg</b> �Դϴ�.<br>";
	echo "<hr>";
?>
	</body>
</html>