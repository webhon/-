<?
	$dbconnect = mysql_connect("localhost", "wellbook", "password");
	if (!$dbconnect) die("[����ȵ�]".mysql_error());
	echo "[�����]<br>";

	if (!mysql_select_db("wellbookdb")) die("[���ý���]".mysql_error());
	else echo "�����ͺ��̽� [wellbookdb]�� ���õ�<br>";

	$query = "select * from STUDENT";

	$result = mysql_query($query);
	if (!$result) die("[SQL ����]".mysql_error());
	
	$Nofields = mysql_num_fields($result)."<br>";
	echo("<table border=1 cellpadding=3 align=\"center\">\n");
	echo("<tr bgcolor=\"#cccccc\">");
	for($i=0; $i < $Nofields; $i++) {
		$field_name = mysql_field_name($result, $i);
		echo("<th align=\"center\">$field_name</th>\n");
	}
	echo("</tr>\n");

	while($row = mysql_fetch_array($result)) {
		echo("<tr>\n");
		for ($i = 0; $i < $Nofields; $i++) {
			$field_name = mysql_field_name($result, $i);
			echo("<td align=\"center\">$row[$field_name]</td>\n");
		}
		echo("</tr>\n");
	}
	echo("</table>");
	mysql_close($dbconnect);
?>