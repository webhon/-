<?
	$a = $_POST["a"];
	$b = $_POST["b"];

	echo "\$a = $a <br>";
	echo "\$b = $b <br>";

	if ($a == $b) echo "\$a == \$b : TRUE <br>"; 
	else echo "\$a == \$b : FALSE <br>";

	if ($a === $b) echo "\$a === \$b : TRUE <br>"; 
	else echo "\$a === \$b : FALSE <br>";

	if ($a != $b) echo "\$a != \$b : TRUE <br>"; 
	else echo "\$a != \$b : FALSE <br>";

	if ($a <> $b) echo "\$a <> \$b : TRUE <br>"; 
	else echo "\$a <> \$b : FALSE <br>";

	if ($a !== $b) echo "\$a !== \$b : TRUE <br>"; 
	else echo "\$a !== \$b : FALSE <br>";

	if ($a < $b) echo "\$a < \$b : TRUE <br>"; 
	else echo "\$a < \$b : FALSE <br>";

	if ($a > $b) echo "\$a > \$b : TRUE <br>"; 
	else echo "\$a > \$b : FALSE <br>";

	if ($a <= $b) echo "\$a <= \$b : TRUE <br>"; 
	else echo "\$a <= \$b : FALSE <br>";

	if ($a >= $b) echo "\$a >= \$b : TRUE <br>"; 
	else echo "\$a >= \$b : FALSE <br>";
?>