<html>
	<head><title>���չ��� 7-1</title></head>
	<body>
<?
	$emails = array("kildong@phpschool.ac.kr", 
					  "lee@phpschool.ac.kr", 
					  "sch@phpschool.ac.kr");

	echo "<table border=1 cellpadding=5>";
	echo "<tr><th>���̵�</th><th>������ �ּ�</th></tr>\n";
	foreach ($emails as $email) {
		if (ereg("([_a-zA-Z][_a-zA-Z0-9]*)@(([a-zA-Z0-9_\-]*\.){1,2}[a-zA-Z0-9_\-]*)", $email, $matchdata)) {
			echo "<tr>";
			echo "<td align=\"center\">$matchdata[1]</td>";
			echo "<td align=\"center\">$matchdata[2]</td>";
			echo "</tr>";
		}
	}
	echo "</table>\n";
?>
	</body>
</html>