<html>
	<head><title>���α׷� 6-7</title></head>
	<body>
<?
	$fp = fopen("output.txt", "w");
	fputs($fp, "�ȳ��ϼ���.\r\n");
	fclose($fp);
	$fp = fopen("output.txt", "w");
	fputs($fp, "�ݰ����ϴ�.\r\n");
	fclose($fp);
	echo "����� �Ϸ�Ǿ����ϴ�.";
?> 
	</body>
</html>