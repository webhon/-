<html>
	<head><title>���� ���� ���</title></head>
	<body>
<?
	$name = $_POST["name"];
	$addr = $_POST["addr"];
	$school = $_POST["school"];
	$hobby1 = $_POST["hobby1"];
	$hobby2 = $_POST["hobby2"];
	$hobby3 = $_POST["hobby3"];
	$year = $_POST["year"];
	$hope = $_POST["hope"];
	$myself = $_POST["myself"];

	echo "�̸� : $name<br>";
	echo "�ּ� : $addr<br>";
	echo "�б� : $school<br>";
	echo "��� : $hobby1 $hobby2 $hobby3<br>";
	echo "�г� : $year<br>";
	echo "�巡��� : $hope<br>";
	echo "���� �Ұ� : $myself<br>";
?>
	</body>
</html>