<html>
	<head><title>평가문제 6-3</title></head>
	<body>
<?
	$dirname = "C:/APM_Setup/htdocs";
	$files = scandir($dirname, 1);
	foreach ($files as $file) {
		echo "[<b>$file</b>]<br>";
	}
?>
	</body>
</html>