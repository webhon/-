<?
	$dan = $_POST["dan"];

	if ($dan >= 2 && $dan <= 9) {
		echo "<table border=1 cellpadding=5 align=\"center\">\n"; 
		echo "<tr bgcolor=\"#cccccc\">";
		echo "<th>��ȣ</th>"; 
		echo "<th> $dan ��</th>"; 
		echo "</tr>\n";
		for ($i=1; $i<10; $i++) {
			$value = $dan * $i;
			echo "<tr>\n";
			echo "<td align=\"center\"> $i</td>";
			echo "<td align=\"center\"> $value</td></tr>\n";
		}
		echo "</table>\n"; 
	}
	else {
		echo "0 ~ 9 ������ ���� �Է��Ͻʽÿ�.<br>";
	}
?>