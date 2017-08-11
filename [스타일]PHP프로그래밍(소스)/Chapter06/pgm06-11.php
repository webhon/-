<html>
	<head><title>프로그램 6-11</title></head>
	<body>
<?
	$dirname = "C:/APM_Setup/htdocs";
	$darray = scandir($dirname);
	$rdarray = scandir($dirname, 1);
	foreach ($darray as $afile) echo "[$afile]<br>";
	echo "<hr>";
	foreach ($rdarray as $afile) echo "[$afile]<br>";
	echo "<hr>";
?>
	</body>
</html> 