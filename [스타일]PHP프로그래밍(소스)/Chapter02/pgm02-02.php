<html>
	<head><title>���α׷� 2-2</title></head>
	<body>
<?
	$bool_var = TRUE;
	$int_var1 = 100;
	$int_var2 = 0x3F;
	$double_var = 1.2E3;
	$str_var = "Programming";
	$arr_var = array(1, 2, 3);
	$file_var = fopen("test.txt", "r");

	echo "���� bool_var : ".gettype($bool_var)."<br>";
	echo "���� int_var1 : ".gettype($int_var1)."<br>";
	echo "���� int_var2 : ".gettype($int_var2)."<br>";
	echo "���� double_var : ".gettype($double_var)."<br>";
	echo "���� str_var : ".gettype($str_var)."<br>";
	echo "���� arr_var : ".gettype($arr_var)."<br>";
	echo "���� file_var : ".gettype($file_var)."<br>";

	$arr_var = 037;	// $arr_var�� 37�� ��Ÿ���� �����̴�.
	echo "���� arr_var : ".gettype($arr_var)."<br>";
?>
	</body>
</html>