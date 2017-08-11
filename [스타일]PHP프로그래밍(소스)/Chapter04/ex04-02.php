<html>
	<head><title>평가문제 4-2</title></head>
	<body>
<?
	$arr = array(1, 2, 3, -4, 5);

	$sum = 0;
	for ($i = 0; $i < sizeof($arr); $i++) {
		if ($arr[$i] < 0) continue;
		$sum += $arr[$i];
	}
	echo "Sum = $sum <br>";
?>
	</body>
</html>