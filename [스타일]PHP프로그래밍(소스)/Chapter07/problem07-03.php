<html>
	<head><title>���� 7-3</title></head>
	<body>
<?
	$email = "lee@phpschool.ac.kr";

	if (ereg("([_a-zA-Z][_a-zA-Z0-9]*)@(([a-zA-Z0-9_\-]*\.){1,2}[a-zA-Z0-9_\-]*)", $email, $matchdata)) {
		echo "���̵� : $matchdata[1] <br>";
		echo "������ �̸� : $matchdata[2] <br>";
	}
	else echo "ã�� ������ �����ϴ�. ";
?>
	</body>
</html>