<html>
	<head><title>���չ��� 5-2</title></head>
	<body>
		<h3>����</h3>
		<table border=1>
		<tr bgcolor="#cccccc"> 
			<th>���̵�</th>
			<th>�̸����ּ�</th>
			<th>Ȩ�������ּ�</th>
		</tr>
<?
	$lines = file("webinfo.txt");

	foreach ($lines as $line) {
		$info = split("\*", $line);
		echo "<tr>";
		for ($i=0; $i<sizeof($info); $i++) echo "<td align=\"center\">".$info[$i]."</td>";
		echo "</tr>";
	}
	echo "</table>";
?>
	</body>
</html>