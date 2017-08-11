<html>
	<head><title>프로그램 6-3</title></head>
	<body>
<?
	$filename = "C:\APM_Setup\htdocs\info.txt";
	if (file_exists($filename)) {
		echo " [$filename] 파일은 존재합니다. ";
	}
	else {
		echo " [$filename] 파일은 존재하지 않습니다. ";
	}
?>
	</body>
</html>