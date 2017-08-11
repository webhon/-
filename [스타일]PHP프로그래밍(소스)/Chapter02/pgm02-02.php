<html>
	<head><title>프로그램 2-2</title></head>
	<body>
<?
	$bool_var = TRUE;
	$int_var1 = 100;
	$int_var2 = 0x3F;
	$double_var = 1.2E3;
	$str_var = "Programming";
	$arr_var = array(1, 2, 3);
	$file_var = fopen("test.txt", "r");

	echo "변수 bool_var : ".gettype($bool_var)."<br>";
	echo "변수 int_var1 : ".gettype($int_var1)."<br>";
	echo "변수 int_var2 : ".gettype($int_var2)."<br>";
	echo "변수 double_var : ".gettype($double_var)."<br>";
	echo "변수 str_var : ".gettype($str_var)."<br>";
	echo "변수 arr_var : ".gettype($arr_var)."<br>";
	echo "변수 file_var : ".gettype($file_var)."<br>";

	$arr_var = 037;	// $arr_var은 37을 나타내는 정수이다.
	echo "변수 arr_var : ".gettype($arr_var)."<br>";
?>
	</body>
</html>