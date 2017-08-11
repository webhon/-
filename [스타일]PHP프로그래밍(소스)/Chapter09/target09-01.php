<?
	$dbconnect = mysql_connect("localhost", "wellbook", "password");
	if (!$dbconnect) die("[연결안됨]".mysql_error());
	if (!mysql_select_db("wellbookdb")) die("[선택실패]".mysql_error());

	$query = "select avg(mid) Midterm, avg(final) Final
	          from ENROLL E, COURSE C
	          where E.courseno = C.courseno and C.coursename = '고전 I'";
	$result = mysql_query($query);
	if (!$result) die("[SQL 오류]".mysql_error());
	
	$Nofields = mysql_num_fields($result)."<br>";
	echo("<table border=1 cellpadding=3 align=\"center\">\n");
	echo("<tr bgcolor=\"#cccccc\">");
	for($i=0; $i < $Nofields; $i++) {
		$field_name = mysql_field_name($result, $i);
		echo("<th>$field_name</th>\n");
	}
	echo("</tr>\n");

	while($row = mysql_fetch_row($result)) {
		echo("<tr>\n");
		for ($i = 0; $i < $Nofields; $i++) {
			$value=number_format($row[$i], 2, '.', ' ');
			echo("<td align=\"center\">$row[$i]</td>\n");
		}
		echo("</tr>\n");
	}
	echo("</table>");
	mysql_close($dbconnect);
?>