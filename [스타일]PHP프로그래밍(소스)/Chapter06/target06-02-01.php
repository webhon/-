<html>
	<head><title>��ǥ���� 6-2</title></head>
	<body>
		<table border=1 cellpadding=5>
			<tr bgcolor="#cccccc">
				<th>���̵�</th>
				<th>�̸���</th>
				<th>Ȩ�������ּ�</th>
<?
	$lines = file("webinfo.txt");

	foreach ($lines as $line) {
		echo "<tr>\n";
		$infoarray = split("\*", $line);
		for ($i=0; $i < sizeof($infoarray); $i++) {
			echo "<td align=\"center\"> $infoarray[$i] </td>\n";
		}
		echo "</tr>\n";

	}
	echo "</table>\n";
?>
	</body>
</html>