<html>
	<head><title>���α׷� 5-5</title></head>
	<body>
<?
	function call_by_value($x) {
		$x += 3;
		echo "&nbsp; &nbsp; =>[�Լ� ��������] \$x = $x<br>"; 
	}

	$x = 10;
	echo "[����] \$x = $x<br>"; 
	echo "�Լ��� ȣ��<br>";
	call_by_value($x);
	echo "�Լ��κ����� ����<br>";
	echo "[�Լ� �ۿ�����] \$x = $x<br>"; 
?>
	</body>
</html>