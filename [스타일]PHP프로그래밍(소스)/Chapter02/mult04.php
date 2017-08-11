<html>
	<head><title>다양한 프로그램 예제 4</title></head>
	<body>
<?
	$var1; // 값을 지정하지 않고 변수를 선언
	echo "\$var1은 null? [".is_null($var1)."] <br>";
	echo "\$var1은 set? [".isset($var1)."] <br><br>";

	$var1 = 5; 
	echo "$var1은 integer형? [".is_int($var1)."] <br>";
	echo "\$var1 은 set? [".isset($var1)."] <br><br>";

	$var1 = array(1, 2, 3);
	echo "$var1은 배열형? [".is_array($var1)."] <br>";
	echo "$var1은 numeric형? [".is_numeric($var1)."] <br>";
	echo "$var1은 resource형? [".is_resource($var1)."] <br>";
?>
	</body>
</html>