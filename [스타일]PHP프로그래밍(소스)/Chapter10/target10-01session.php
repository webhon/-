<html>
	<head><title>���α׷� B</title></head>
	<body>
<?
	session_start();
	echo "���� ���̵� : ".session_id();
	$_SESSION["id"] = $_POST["id"];
	$_SESSION["passwd"] = $_POST["passwd"];
?>
	<p>
	<a href="target10-01print.php">���̵�� ��й�ȣ Ȯ���Ϸ� ����(target10-01print.php)</a>
	</body>
</html>