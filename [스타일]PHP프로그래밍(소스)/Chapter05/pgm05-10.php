<html>
	<head><title>���α׷� 5-10</title></head>
	<body>
<?
	function test_argument()
	{
		$noargs = func_num_args();
		echo "�Ű������� ����: $noargs ��<br>";	// 4 ��
		$second = func_get_arg(2);
		echo "3��° �Ű�����: $second<br>";	// 30
		$argarr = func_get_args();
		print_r($argarr);  // Array ([0] => 10 [1] => 20 [2] => 30 [3] => 40) 
	}

	test_argument(10, 20, 30, 40);
?> 
	</body>
</html>