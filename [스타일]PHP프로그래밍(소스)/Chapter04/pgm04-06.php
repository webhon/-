<?
	$no = $_POST["no"];
	$str = $_POST["str"];

	echo "<b>���ڿ� ����ϱ�</b>: <p>";
	$i = 0;
	while ($i < $no) {
		echo "$str<br>";
		$i++;
	}
	echo "[�Ϸ�]<br>";
?>