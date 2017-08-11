<?
	$tablename = $_GET["tn"];
	$no = $_GET["no"];

	echo "<b>튜플 갱신하기</b><p>";
	$query = "select * from $tablename";
	$dbconnect = mysql_connect("localhost", "wellbook", "password");
	if (!$dbconnect) die("[연결안됨]".mysql_error());
	if (!mysql_select_db("wellbookdb")) die("[선택실패]".mysql_error());

	$result = mysql_query($query);
	if (!$result) die("[SQL 오류]".mysql_error());
	mysql_close($dbconnect);

	$j=0;
	while($j <= $no) {
		$row = mysql_fetch_array($result);
		$j++;
	}
	$Nofields = mysql_num_fields($result);
	echo "<form action=\"mult20updex.php?tn=$tablename\" method=\"POST\">\n";
	echo "<table border=1 cellpadding=3>\n";
	echo "<tr><th>항목</th><th>내용</th></tr>\n";
	for ($i = 0; $i < $Nofields; $i++) {
		$field_name = mysql_field_name($result, $i);
		echo "<tr>";
		echo "<td align=\"center\">";
		echo $field_name;
		echo "</td>\n";
		echo "<td align=\"center\">";
		echo "<input type=\"text\" name=\"newrow[$i]\"value=$row[$field_name]>"; 
		echo "</td>\n";
		echo "</tr>\n";
	}
	echo "<tr><td align=\"center\" colspan=2>";
	echo "<input type=\"submit\" value=\"갱신\">";
	echo "</td></tr>\n";
	echo "</table>";
	echo "</form>";
?>