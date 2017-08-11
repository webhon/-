<?
	$X = $_POST["x"];
	$Y = $_POST["y"];

	echo "[교환전의 값] :: \$X = $X, \$Y = $Y <br>";
	swap_value($X, $Y);
	echo "[교환후의 값] :: \$X = $X, \$Y = $Y <br>";

	function swap_value(&$x, &$y) {
		$temp = $x;
		$x = $y;
		$y = $temp;
	}
?>