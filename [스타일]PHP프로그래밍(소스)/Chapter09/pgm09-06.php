<?
	$dbconnect = mysql_connect("localhost", "wellbook", "password");
	if (!$dbconnect) die("[연결안됨]".mysql_error());

	if (!mysql_select_db("wellbookdb")) die("[선택실패]".mysql_error());

	$query = "select distinct C.courseno, C.coursename 
	           from STUDENT S, COURSE C, ENROLL E
		        where S.sno = E.sno and C.courseno = E.courseno 
          	  and S.deptname = '수학교육'";

	$result = mysql_query($query);
	if (!$result) die("[SQL 오류]".mysql_error());
	
	$Nofields = mysql_num_fields($result)."<br>";
	$Notuples = mysql_num_rows($result)."<br>";

	echo("<table border=1 cellpadding=3 align=\"center\">\n");
	echo("<tr bgcolor=\"#cccccc\">");
	for($i=0; $i < $Nofields; $i++) {
		$field_name = mysql_field_name($result, $i);
		echo("<th>$field_name</th>\n");
	}
	echo("</tr>\n");

	for ($i=0; $i<$Notuples; $i++) {
		echo("<tr>\n");
		for ($j = 0; $j < $Nofields; $j++) {
			$value = mysql_result($result, $i, $j);
			echo("<td align=\"center\">$value</td>\n");
		}
		echo("</tr>\n");
	}
	echo("</table>");
	mysql_close($dbconnect);
?>