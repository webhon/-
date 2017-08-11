<html>
	<head><title>프로그램 5-3</title></head>
	<body>
<?
	inner_function(4);
	outer_function(1, 2);
	inner_function(5);

	function outer_function ($x, $y) {

		function inner_function ($z) {
			echo "\$z = $z<br>";
		}

		$v = $x + $y;
		inner_function($v);
	}
?>
	</body>
</html>