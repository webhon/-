<html>
	<head><title>프로그램 5-5</title></head>
	<body>
<?
	function call_by_value($x) {
		$x += 3;
		echo "&nbsp; &nbsp; =>[함수 내에서의] \$x = $x<br>"; 
	}

	$x = 10;
	echo "[원래] \$x = $x<br>"; 
	echo "함수의 호출<br>";
	call_by_value($x);
	echo "함수로부터의 복귀<br>";
	echo "[함수 밖에서의] \$x = $x<br>"; 
?>
	</body>
</html>