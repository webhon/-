<html>
	<head><title>¹®Á¦ 4-3</title></head>
	<body>
<?
	$char = ":";
	$space = "&nbsp;";

	define (TNO, 10);

	$i=0;
	while ($i < TNO) {
		for ($j=1; $j <TNO - $i; $j++) echo $space;
		for ($j=0; $j <$i; $j++) echo $char;
		for ($j=0; $j <$i; $j++) echo $char;
		$i++;
		echo "<br>";
	}

	$i=0;
	while ($i < TNO) {

		for ($j=0; $j <$i; $j++) echo $space;
		for ($j=1; $j <TNO - $i; $j++) echo $char;
		for ($j=1; $j <TNO - $i; $j++) echo $char;
		$i++;
		echo "<br>";
	}
?>
	</body>
</html>