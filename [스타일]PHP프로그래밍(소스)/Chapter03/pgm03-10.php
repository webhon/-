<?
	$a = (int)$_POST["a"];
	$b = (int)$_POST["b"];

	echo "\$a = $a <br>";
	echo "\$b = $b <br>";
	echo "<hr>";

	$result = $a & $b;
	echo " and ���� : " . $result . "<br>";

	$result = $a | $b;
	echo " or ���� : " . $result . "<br>";

	$result = $a ^ $b;
	echo " xor ���� : " . $result . "<br>";

	$result = ~$a;
	echo " ~ ���� : " . $result . "<br>";
   
	$result = $a << $b;
	echo " left shift ���� : " . $result . "<br>";

	$result = $a >> $b;
	echo " right shift ���� : " . $result . "<br>";
?>