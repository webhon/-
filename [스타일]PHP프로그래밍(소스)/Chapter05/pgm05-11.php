<html>
	<head><title>���α׷� 5-11</title></head>
	<body>
<?
	define(NOSTUDENT, 4);
	$students = array( array("ȫ�浿", "��ǻ��", 3, "�ƶ�"),
			   array("�̸���", "����", 2, "������"),
			   array("������", "����", 1, "����"),
			   array("��ȫ��", "��ǻ��", 3, "�̵���"));

	print_array();

	function print_array() {
		GLOBAL $students;
		echo "�� �л��� �� = ".NOSTUDENT;

		echo "<table border=1> 
			<tr bgcolor=\"#cccccc\">
				<th>�̸�</th>
				<th>�ּ�</th>
			</tr>\n";
		for ($i=0; $i < NOSTUDENT; $i++) {
			echo "<tr>";
			echo "<td align=\"center\">".$students[$i][0]."</td>";
			echo "<td align=\"center\">".$students[$i][3]."</td>";
			echo "</tr>\n";
		}
		echo "</table>\n";
	}
?>
	</body>
</html>