<html>
	<head><title>���α׷� 5-6</title></head>
	<body>
<?
	function call_by_reference(&$x) {
		$x += 3;
		echo "&nbsp; &nbsp; =>[�Լ� ��������] \$x = $x<br>"; 
	}

	$x = 10;
	echo "[����] \$x = $x<br>"; 
	echo "�Լ��� ȣ��<br>";
	call_by_reference($x);
	echo "�Լ��κ����� ����<br>";
	echo "[�Լ� �ۿ�����] \$x = $x<br>"; 
?>
	</body>
</html>