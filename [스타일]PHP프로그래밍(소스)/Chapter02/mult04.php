<html>
	<head><title>�پ��� ���α׷� ���� 4</title></head>
	<body>
<?
	$var1; // ���� �������� �ʰ� ������ ����
	echo "\$var1�� null? [".is_null($var1)."] <br>";
	echo "\$var1�� set? [".isset($var1)."] <br><br>";

	$var1 = 5; 
	echo "$var1�� integer��? [".is_int($var1)."] <br>";
	echo "\$var1 �� set? [".isset($var1)."] <br><br>";

	$var1 = array(1, 2, 3);
	echo "$var1�� �迭��? [".is_array($var1)."] <br>";
	echo "$var1�� numeric��? [".is_numeric($var1)."] <br>";
	echo "$var1�� resource��? [".is_resource($var1)."] <br>";
?>
	</body>
</html>