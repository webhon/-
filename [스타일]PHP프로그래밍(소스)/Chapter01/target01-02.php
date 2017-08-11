<?
	echo "<b>사용자 정보 출력</b>\n<br>";
	$no = $_POST["no"];
	$name = $_POST["name"];
	$year = $_POST["year"];
	$h1 = $_POST["h1"];
	$h2 = $_POST["h2"];
	$h3 = $_POST["h3"];

	echo "학번 : $no <br>\n";
	echo "이름 : $name <br>\n";
	echo "학년 : $year <br>\n";
	echo "취미 : $h1 $h2 $h3 <br>\n";
?>