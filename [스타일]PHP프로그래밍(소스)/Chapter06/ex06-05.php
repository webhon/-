<html>
	<head><title>���չ��� 6-2</title></head>
	<body>
<?
	include("pgm06-12.inc");

	echo "<h2>����</h2>"; 

	$no = 1;
	if (file_exists($guestbook)) {
		echo "<table border=1 cellpadding=5 width=670>\n";
		echo "<tr><th>��ȣ</th><th>�ۼ����̸�</th>\n";
		echo "<th width=300>�޽���</th><th>����</th><th>����</th></tr>\n";

		$lines = file($guestbook);
		foreach ($lines as $line) {
			$data = split(":", $line);
			list($name, $msg, $passwd) = $data;
			echo "<tr>\n";
			echo "<td align=center> $no </td>";
			echo "<td align=center> $name </td>";
			echo "<td> $msg </td>";
			echo "<td align=center>
				<a href=\"pgm06-14.php?no=".($no-1)."\">����</a> </td>";
			echo "<td align=center> 
				<a href=\"ex06-05updateform.php?no=".($no-1)."\">����</a>
				</td>";
			echo "</tr>\n";

			$no++;
		}
		echo "</table>\n";
	}
	else {
		echo "<p>������ ��� �ֽ��ϴ�.";
	}

?>
	<p><a href="pgm06-13.php">���� �Է�</a>
	</body>
</html>

