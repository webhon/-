<?
	$op = $_POST["op"];
	$a = $_POST["a"];
	$b = $_POST["b"];

	switch ($op) {
		case "+" : $value = $a + $b; break;
		case "-" : $value = $a - $b; break;
		case "*" : $value = $a * $b; break;
		case "/" : $value = $a / $b; break;
		case "%" : $value = $a % $b; break;
	}

	echo "<b>�����</b> : <br> &nbsp; &nbsp; $a $op $b = $value <br>";
?>