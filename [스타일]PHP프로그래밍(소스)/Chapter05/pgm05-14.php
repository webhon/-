<html>
	<head><title>���α׷� 5-14</title></head>
	<body>
<?
   $s = $_POST["s"];
   $no = $_POST["no"];

	if (!$no) {
		echo "<table border=1>\n";
		echo "<tr><th>��ȣ</th><th>�Էµ� ����</th></tr>\n"; 
		echo "<tr><td align=\"center\">�հ�</td>";
		echo "<td align=\"center\">0</td></tr>\n";
		echo "</table>";
	}
	else {
		$s += $no;
		echo "<table border=1>\n";
		echo "<tr><th>��ȣ</th><th>�Էµ� ����</th></tr>\n"; 
		echo "<tr><td align=\"center\">�հ�</td>"; 
		echo "<td align=\"center\">".$s."</td></tr>"; 
		echo "</table>";
	}
?>

		<p>���� �Է��ϱ�<br>
		<form action="pgm05-14.php" method="POST">
			<input type="text" name="no" size=5> &nbsp;
			<input type="hidden" name="s" value= <?= $s ?>>
			<input type="submit" value="�����ϱ�">
		</form>
	</body>
</html>