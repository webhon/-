<?
	$a = $_POST["a"];
	$b = $_POST["b"];

	if ($a < $b) echo "절대값은 [".($b - $a) . "] 이다.";
	else echo "절대값은 [".($a - $b)."] 이다.";
?>