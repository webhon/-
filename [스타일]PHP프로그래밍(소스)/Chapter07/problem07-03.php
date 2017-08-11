<html>
	<head><title>문제 7-3</title></head>
	<body>
<?
	$email = "lee@phpschool.ac.kr";

	if (ereg("([_a-zA-Z][_a-zA-Z0-9]*)@(([a-zA-Z0-9_\-]*\.){1,2}[a-zA-Z0-9_\-]*)", $email, $matchdata)) {
		echo "아이디 : $matchdata[1] <br>";
		echo "도메인 이름 : $matchdata[2] <br>";
	}
	else echo "찾는 패턴이 없습니다. ";
?>
	</body>
</html>