<?
	function A()
	{
		global $n;

		$n = 10;
	}
	$n = 0;
	echo "함수 호출 전 : \$n = $n<br>\n";
	A();
	echo "함수 호출 후 : \$n = $n<br>\n";
	echo "<a href=pgm10-03.php>프로그램 10-3</a>\n";
?>