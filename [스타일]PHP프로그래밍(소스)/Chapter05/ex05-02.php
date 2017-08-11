<?
	function calculation( $a, $b, $op ) 
	{
		if ($op == "+") $result = $a + $b;
		else if ($op == "*") $result = $a * $b;

		return $result;
	}

	echo calculation(3, 5, "+");
?>

