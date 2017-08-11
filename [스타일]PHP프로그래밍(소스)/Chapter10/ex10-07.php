<?
	session_start();
	$tname = $_POST["tname"];
	$attrname = $_POST["attrname"];
	$op = $_POST["op"];
	$attrval = $_POST["attrval"];
	$tno = $_SESSION["tno"];
	$no = $_SESSION["no"];

	$dbconnect = mysql_connect("localhost", "wellbook", "password");
	if (!$dbconnect) die("[연결안됨]".mysql_error());
	if (!mysql_select_db("wellbookdb")) die("[선택실패]".mysql_error());

	$query = "select * from " . $tname[0] ;
	for ($i=1; $i<$tno; $i++) {
		$query .= " , $tname[$i] ";
	}
	$query .= ( " where " . $attrname[0] . $op[0] . $attrval[0] ) ;
	for ($i=1; $i<$no; $i++) {
		$query .= ( " and " . $attrname[$i] . $op[$i] . $attrval[$i] ) ;
	}

	$query = str_replace("\\", "", $query);
	
	echo "QUERY: " . $query . "<br>\n";

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
			echo("<td align=\"center\">$row[$i]</td>\n");
		}
		echo("</tr>\n");
	}
	echo("</table>");
	mysql_close($dbconnect);
?>