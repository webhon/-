<html>
	<head><title>���α׷� 4-5</title></head>
	<body>
<?
	$deptname = "��ǻ�Ͱ���";
	switch ($deptname) {
		case "��ǻ�Ͱ���" : $deptcode = 1;
		case "���ڰ���" : $deptcode = 2;
		case "�������" : $deptcode = 3;
		default : $deptcode = 0;
	}

	echo "\$deptcode = $deptcode<br>";
?>
	</body>
</html>