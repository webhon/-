<?
	$a = 1;
	$b = 2;

	$c = $a++ * $b - 5 / $a;
	echo "\$a = $a, \$b = $b, \$c = $c <br>";

	$c *= ++$b + 3;
	echo "\$a = $a, \$b = $b, \$c = $c <br>";

	$c = $a++ < $b ? $a+5 : $b-7;
	echo "\$a = $a, \$b = $b, \$c = $c <br>";
?>