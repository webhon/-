<html>
	<head><title>�پ��� ���α׷� ���� 6</title></head>
	<body>
<?
	$a = array("a", "b", "c");
	$b = array(10, 20, 30);
	echo "�迭 \$a : ";
	print_r($a);
	echo "<br>";
	echo "�迭 \$b : ";
	print_r($b);
	echo "<br>";
	$c = array_combine($a, $b);
	echo "���� ������ �迭 \$c : ";
	print_r($c);
	$c = array_sum($c); 
	echo "<br> Sum : $c <br>";
?>
	</body>
</html>