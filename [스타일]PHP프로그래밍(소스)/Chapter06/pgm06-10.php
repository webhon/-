<html>
	<head><title>프로그램 6-10</title></head>
	<body>
<?
	$dirname = "C:/APM_Setup/htdocs";
	if (is_dir($dirname)) {
		if ($dh = opendir($dirname)) { 	
			while (FALSE !== ($afile = readdir($dh))) {
				echo "filename: <b>[$afile]</b><br>"; 
			}
			closedir($dh);
		}
	}
	else {
		echo "[$dirname] 디렉터리가 존재하지 않습니다.";
	}
?>
	<body>
</html>