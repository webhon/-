<html>
	<head><title>���α׷� 5-9</title></head>
	<body>
<?
	define(MAX, 7); 
	function print_msg($msg, $size = 3) {
		$notab = MAX - $size;
		echo "<p>";
		for ($i=0; $i<$notab; $i++) echo("&nbsp; ");
		echo "<font size=$size> $msg</font>";
	}

	print_msg("1. ����", 5);
	print_msg("1.1 ���� ���");
	print_msg("1.1.1 PHP ����", 1);
?>
	</body>
</html>