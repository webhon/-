<?
	$a = $_POST["a"];
	$b = $_POST["b"];

	$max = $a;
	if ($a < $b) $max = $b;

	echo "($a, $b) �� �� �߿��� ū ���� : $max <br>";
?>