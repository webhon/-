<html>
	<head><title>목표문제 5-1</title></head>
	<body>
<?
	function boldstring( &$msg ) {
		$msg = sprintf("<b>%s</b>", $msg);
	}

	$msg = "안녕하세요!";
	echo "[Before] :: $msg<br>";

	boldstring ($msg);

	echo "[After] :: $msg<br>";
?>
	</body>
</html>