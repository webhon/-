<html>
	<head><title>다양한 프로그램 예제 6</title></head>
	<body>
<?
	$a = array("a", "b", "c");
	$b = array(10, 20, 30);
	echo "배열 \$a : ";
	print_r($a);
	echo "<br>";
	echo "배열 \$b : ";
	print_r($b);
	echo "<br>";
	$c = array_combine($a, $b);
	echo "새로 생성된 배열 \$c : ";
	print_r($c);
	$c = array_sum($c); 
	echo "<br> Sum : $c <br>";
?>
	</body>
</html>