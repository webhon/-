<html>
	<head><title>다양한 프로그램 예제 12</title></head>
	<body>
<?
	$numbers = range(0,9);
	$letters = range('z', 'a');
	echo "number :: ";
	foreach ($numbers as $number) {
		echo "$number ";
	}
	echo "<br>";
	echo "letter :: ";
	foreach ($letters as $letter) {
		echo "$letter ";
	}
?>
	</body>
</html>