<html>
	<head><title>프로그램 5-10</title></head>
	<body>
<?
	function test_argument()
	{
		$noargs = func_num_args();
		echo "매개변수의 개수: $noargs 개<br>";	// 4 개
		$second = func_get_arg(2);
		echo "3번째 매개변수: $second<br>";	// 30
		$argarr = func_get_args();
		print_r($argarr);  // Array ([0] => 10 [1] => 20 [2] => 30 [3] => 40) 
	}

	test_argument(10, 20, 30, 40);
?> 
	</body>
</html>