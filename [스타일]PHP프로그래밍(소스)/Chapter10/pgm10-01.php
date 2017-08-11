<?
	function A()
	{
		global $n;

		$n = 10;
		$m = 10;

		echo "In function A() : \$n = $n, \$m = $m<br>\n";
	}
	$n = 0; $m = 0;
	echo "함수 호출 전 : \$n = $n, \$m = $m<br>\n";
	A();
	echo "함수 호출 후 : \$n = $n, \$m = $m<br>\n";
?>