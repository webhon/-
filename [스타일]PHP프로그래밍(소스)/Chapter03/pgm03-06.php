<html>
	<head><title>문제 3-6</title></head>
	<body>
<? 
	$a = 10;
	echo "\$a = $a <br>";
	echo "<h3>후(post) 증가 : \$a++</h3>";
	echo  $a++."<br>";
	echo  $a."<br>";

	$a = 10;
	echo "<h3>선(pre) 증가 : ++\$a</h3>";
	echo ++$a."<br>";
	echo $a."<br>";

	$a = 10;
	echo"<h3>후(post) 감소 : \$a--</h3>";
	echo $a--."<br>";
	echo $a."<br>";

	$a = 10;
	echo "<h3>선(pre) 감소 : --\$a</h3>";
	echo --$a."<br>";
	echo $a."<br>";
?> 
	</body>
</html>