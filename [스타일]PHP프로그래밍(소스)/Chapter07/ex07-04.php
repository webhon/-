<html>
	<head><title>종합문제 7-1</title></head>
	<body>
<?
	$emails = array("kildong@phpschool.ac.kr", 
					  "lee@phpschool.ac.kr", 
					  "sch@phpschool.ac.kr");

	echo "<table border=1 cellpadding=5>";
	echo "<tr><th>아이디</th><th>도메인 주소</th></tr>\n";
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