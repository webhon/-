<html>
	<head><title>��ǥ���� 6-1</title></head>
	<body>
<?
	$filename = ".\input.txt";
	if (file_exists($filename)) {
		if ($fp = fopen($filename, "r")) {
			echo "���� [$filename]�� �����Ͽ����ϴ�."; 
			fclose($fp);
		}
		else {
			echo "[$filename] ������ �������� �ʽ��ϴ�.";
		}
	}
	else {
		echo "[$filename] ������ �������� �ʽ��ϴ�.";
	}
?>
	</body>
</html>