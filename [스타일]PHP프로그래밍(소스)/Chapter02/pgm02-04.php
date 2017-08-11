<html>
	<head><title>프로그램 2-4</title></head>
	<body>
<?
	$str_var = "0";
	$str_var = $str_var + 2;        // $str_var은 이제 정수형이다.(2)
	$str_var = $str_var + 1.3;      // $str_var은 이제 실수형이다.(3.3)
	$str_var = $str_var + "10km";  // $str_var은 이제 실수형이다.(13.3)
	echo "$str_var ( ".gettype($str_var)." )<br>";
?>
	</body>
</html>