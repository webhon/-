<html>
	<head><title>��ǥ���� 5-1</title></head>
	<body>
<?
	function boldstring( &$msg ) {
		$msg = sprintf("<b>%s</b>", $msg);
	}

	$msg = "�ȳ��ϼ���!";
	echo "[Before] :: $msg<br>";

	boldstring ($msg);

	echo "[After] :: $msg<br>";
?>
	</body>
</html>