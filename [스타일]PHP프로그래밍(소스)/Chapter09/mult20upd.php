<?
	$tablename = $_GET["tn"];
	$no = $_GET["no"];

	echo "<b>Ʃ�� �����ϱ�</b><p>";
	$query = "select * from $tablename";
	$dbconnect = mysql_connect("localhost", "wellbook", "password");
	if (!$dbconnect) die("[����ȵ�]".mysql_error());
	if (!mysql_select_db("wellbookdb")) die("[���ý���]".mysql_error());

	$result = mysql_query($query);
	if (!$result) die("[SQL ����]".mysql_error());
	mysql_close($dbconnect);

	$j=0;
	while($j <= $no) {
		$row = mysql_fetch_array($result);
		$j++;
	}
	$Nofields = mysql_num_fields($result);
	echo "<form action=\"mult20updex.php?tn=$tablename\" method=\"POST\">\n";
	echo "<table border=1 cellpadding=3>\n";
	echo "<tr><th>�׸�</th><th>����</th></tr>\n";
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
	echo "<input type=\"submit\" value=\"����\">";
	echo "</td></tr>\n";
	echo "</table>";
	echo "</form>";
?>