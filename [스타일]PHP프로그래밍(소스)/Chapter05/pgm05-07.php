<?
	$X = $_POST["x"];
	$Y = $_POST["y"];

	echo "[��ȯ���� ��] :: \$X = $X, \$Y = $Y <br>";
	swap_value($X, $Y);
	echo "[��ȯ���� ��] :: \$X = $X, \$Y = $Y <br>";

	function swap_value(&$x, &$y) {
		$temp = $x;
		$x = $y;
		$y = $temp;
	}
?>