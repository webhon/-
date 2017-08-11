<?
	$a = $_POST["a"];
	$b = $_POST["b"];

	$max = $a;
	if ($a < $b) $max = $b;

	echo "($a, $b) 두 수 중에서 큰 수는 : $max <br>";
?>