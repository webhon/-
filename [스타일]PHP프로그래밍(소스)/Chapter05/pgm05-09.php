<html>
	<head><title>프로그램 5-9</title></head>
	<body>
<?
	define(MAX, 7); 
	function print_msg($msg, $size = 3) {
		$notab = MAX - $size;
		echo "<p>";
		for ($i=0; $i<$notab; $i++) echo("&nbsp; ");
		echo "<font size=$size> $msg</font>";
	}

	print_msg("1. 서론", 5);
	print_msg("1.1 연구 배경");
	print_msg("1.1.1 PHP 정의", 1);
?>
	</body>
</html>