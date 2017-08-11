<?
	$no = $_POST["no"];
	$str = $_POST["str"];

	echo "<b>문자열 출력하기</b>: <p>";
	$i = 0;
	while ($i < $no) {
		echo "$str<br>";
		$i++;
	}
	echo "[완료]<br>";
?>