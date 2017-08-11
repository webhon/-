<html>
	<head><title>프로그램 4-15</title></head>
	<body>
<?
	$grades = array ( array (30, 45, 50, 60), array (35, 43, -40, 70),
               array (29, 55, 65, 30), array (75, -45, 80, 30),
               array (99, 0, 0, 0) );

	$i = 0;
	while (1) {
		if ($grades[$i][0] == 99) break;
			$j = 0;
			$sum[$i] = 0;
			while ($j < 4) {
				if ($grades[$i][$j] < 0) {
					$j++;
					continue;
				}
			$sum[$i] += $grades[$i][$j];
			$j++;
			}
			$i++;
	}

	for ($i=0; $i < sizeof($sum); $i++) {
		echo "\$sum[".$i."]의 합 :: $sum[$i]<br>";
	}
?>
	</body>
</html>