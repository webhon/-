<html>
	<head><title>���α׷� 6-9</title></head>
	<body>
<?
	$dirname = "C:/APM_Setup/htdocs/newdir";
	if (is_dir($dirname)) {
		rmdir($dirname);
		echo "���͸� [$dirname]�� �����Ͽ����ϴ�.";
	}   
	else 
		echo "���͸� [$dirname]�� �������� �ʽ��ϴ�.";
?>
	</body>
</html>