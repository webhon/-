<html>
	<head><title>���α׷� 2-4</title></head>
	<body>
<?
	$str_var = "0";
	$str_var = $str_var + 2;        // $str_var�� ���� �������̴�.(2)
	$str_var = $str_var + 1.3;      // $str_var�� ���� �Ǽ����̴�.(3.3)
	$str_var = $str_var + "10km";  // $str_var�� ���� �Ǽ����̴�.(13.3)
	echo "$str_var ( ".gettype($str_var)." )<br>";
?>
	</body>
</html>