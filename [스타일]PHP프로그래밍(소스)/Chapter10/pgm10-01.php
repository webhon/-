<?
	function A()
	{
		global $n;

		$n = 10;
		$m = 10;

		echo "In function A() : \$n = $n, \$m = $m<br>\n";
	}
	$n = 0; $m = 0;
	echo "�Լ� ȣ�� �� : \$n = $n, \$m = $m<br>\n";
	A();
	echo "�Լ� ȣ�� �� : \$n = $n, \$m = $m<br>\n";
?>