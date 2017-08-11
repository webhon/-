<html>
	<head><title>프로그램 4-9</title></head>
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
	echo "평균은<b> $avg</b> 입니다.<br>";
	echo "<hr>";
?>
	</body>
</html>