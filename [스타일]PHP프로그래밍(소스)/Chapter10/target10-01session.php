<html>
	<head><title>프로그램 B</title></head>
	<body>
<?
	session_start();
	echo "세션 아이디 : ".session_id();
	$_SESSION["id"] = $_POST["id"];
	$_SESSION["passwd"] = $_POST["passwd"];
?>
	<p>
	<a href="target10-01print.php">아이디와 비밀번호 확인하러 가기(target10-01print.php)</a>
	</body>
</html>