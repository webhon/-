<html>
	<head><title>���α׷� 7-2</title></head>
	<body>
<?
	$msg = "������ 2009�� 2�� 12�� �Դϴ�.";
	if (ereg ("([0-9]{4})�� ([0-9]{1,2})�� ([0-9]{1,2})��",$msg,$matchdata))
		print_r($matchdata);
	else
		echo "�ش� ������ �������� �ʽ��ϴ�.";
?>
	</body>
</html>