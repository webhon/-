<html>
	<head><title>나의 정보 출력</title></head>
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

	echo "이름 : $name<br>";
	echo "주소 : $addr<br>";
	echo "학교 : $school<br>";
	echo "취미 : $hobby1 $hobby2 $hobby3<br>";
	echo "학년 : $year<br>";
	echo "장래희망 : $hope<br>";
	echo "나의 소개 : $myself<br>";
?>
	</body>
</html>