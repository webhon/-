<html>
	<head><title>프로그램 5-18</title></head>
	<body>
<?
	$x = 10; 
	$y = 12.3;
	$s = "Jeju Island";

	printf("\$x = [%d], \$y = [%f]<br>\n", $x, $y);
	printf("\$x = [%5d], \$y = [%5.2f]<br>\n", $x, $y);
	printf("\$x = [%-5d], \$y = [%-5.2f]<br>\n", $x, $y);
	printf("\$x = [%o]<br>\n", $x);
	printf("\$x = [%X]<br>\n", $x);
	printf("\$y = [%5.2e]<br>\n", $y);
	printf("\$s = [%s]<br>\n", $s);
	printf("\$s = [%15s]<br>\n", $s);
	printf("\$s = [%-15s]<br>\n", $s);
	printf("\$s = [%-10.10s]<br>\n", $s);
?>
	</body>
</html>