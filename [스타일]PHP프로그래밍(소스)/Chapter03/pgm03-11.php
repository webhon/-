<html>
	<head><title>프로그램 3-11</title></head>
	<body>
<?
	$a = 4 * 3 % 5; // (4 * 3) % 5 = 2
	echo "\$a = ".$a."<br>"; 
	$a = TRUE ? 0 : FALSE ? 3 : 5; // (TRUE ? 0 : TRUE) ? 3 : 5 = 5
	echo "\$a = ".$a."<br>";
	$b = 1;
	$a = $b += 3; // $a = ($b += 3) -> $a = 4, $b = 4
	echo "\$a = ".$a."<br>";
?> 
	</body>
</html>