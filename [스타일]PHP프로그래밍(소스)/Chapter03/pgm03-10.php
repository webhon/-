<?
	$a = (int)$_POST["a"];
	$b = (int)$_POST["b"];

	echo "\$a = $a <br>";
	echo "\$b = $b <br>";
	echo "<hr>";

	$result = $a & $b;
	echo " and 연산 : " . $result . "<br>";

	$result = $a | $b;
	echo " or 연산 : " . $result . "<br>";

	$result = $a ^ $b;
	echo " xor 연산 : " . $result . "<br>";

	$result = ~$a;
	echo " ~ 연산 : " . $result . "<br>";
   
	$result = $a << $b;
	echo " left shift 연산 : " . $result . "<br>";

	$result = $a >> $b;
	echo " right shift 연산 : " . $result . "<br>";
?>