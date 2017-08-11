<?
	session_start();

	if (isset($_POST["tablename"])) {
		$tablename = $_SESSION["tablename"] = $_POST["tablename"];
	}
	else $tablename = $_SESSION["tablename"];

	$query = "select * from $tablename";

	$dbconnect = mysql_connect("localhost", "wellbook", "password");
	if (!$dbconnect) die("[연결안됨]".mysql_error());
	if (!mysql_select_db("wellbookdb")) die("[선택실패]".mysql_error());

	$result = mysql_query($query);
	if (!$result) die("[SQL 오류]".mysql_error());
	mysql_close($dbconnect);
	echo "<p><b><center>튜플 삭제하기</center></b><p>";	
	$Nofields = mysql_num_fields($result)."<br>";
	echo "<table border=1 cellpadding=3 align=\"center\">\n";
	echo "<tr bgcolor=\"#cccccc\">";
	for($i=0; $i < $Nofields; $i++) {
		$field_name = mysql_field_name($result, $i);
		echo "<th>$field_name</th>\n";
	}
	echo "<th>삭제</th>";
	echo "</tr>\n";

	$j=0;
	while($row = mysql_fetch_row($result)) {
		echo "<tr>\n";
		for ($i = 0; $i < $Nofields; $i++) {
			echo "<td align=\"center\">$row[$i]</td>\n";
		}
		echo "<td align=\"center\">
		<a href=\"problem10-01del.php?no=$j\">선택</a></td>\n";
		echo "</tr>\n";
		$j++;
	}
	echo "</table>";
?>