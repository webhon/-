<html>
	<head><title>���α׷� 6-10</title></head>
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
		echo "[$dirname] ���͸��� �������� �ʽ��ϴ�.";
	}
?>
	<body>
</html>