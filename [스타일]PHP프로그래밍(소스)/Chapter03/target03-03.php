<?
	$a = $_POST["a"];
	$b = $_POST["b"];
	$c = $_POST["c"];

	echo "<b>¾çÀÇ Â¦¼ö</b> : <br>";
	if ($a >= 0 && $a % 2 == 0) echo "$a <br>";
	if ($b >= 0 && $b % 2 == 0) echo "$b <br>";
	if ($c >= 0 && $c % 2 == 0) echo "$c <br>";
?>