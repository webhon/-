<?
	$tablename = $_POST["tablename"];
	$op = $_POST["op"]; 

	switch ($op) {
	case 1: /* ���� */
		insert_data($tablename); break;
	case 2: /* ���� */
		update_data($tablename); break;
	case 3: /* ���� */
		delete_data($tablename); break;
	case 4: /* �˻� */
		select_data($tablename); break;
	}

function insert_data($tn) {
	$dbconnect = mysql_connect("localhost", "wellbook", "password");
	if (!$dbconnect) die("[����ȵ�]".mysql_error());
	if (!mysql_select_db("wellbookdb")) die("[���ý���]".mysql_error());

	echo "<center><b>������ ����</b></center>";
	echo "<p>\n";
	$query = "select * from ".$tn;
	$result = mysql_query($query);
	if (!$result) die("[SQL ����]".mysql_error());
	mysql_close($dbconnect);

	$Nofields = mysql_num_fields($result);
	echo("<table border=1 cellpadding=3 align=\"center\">\n");
	echo("<tr bgcolor=\"#cccccc\">");
	for($i=0; $i < $Nofields; $i++) {
		$field_name = mysql_field_name($result, $i);
		echo("<th>$field_name</th>\n");
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
	echo "<form action=\"mult20ins.php?tn=$tn\" method=\"POST\">";
	echo "<tr>\n";
	for  ($i = 0; $i < $Nofields; $i++) {
		echo "<td align=\"center\">";
		echo "<input type=\"text\" name=\"newrow[$i]\" size=10>";
		echo "</td>\n";
	}
	echo "</tr>\n<tr>";
	echo "<td align=\"center\" colspan=$Nofields>\n";
	echo "<input type=\"submit\" value=\"����\">"; 
	echo "</td>\n";
	echo "</tr>\n";
	echo "</form>\n";
	echo("</table>\n");
}

function update_data($tn) {
	$dbconnect = mysql_connect("localhost", "wellbook", "password");
	if (!$dbconnect) die("[����ȵ�]".mysql_error());
	if (!mysql_select_db("wellbookdb")) die("[���ý���]".mysql_error());

	echo "<center><b>������ ����</b></center>";
	echo "<p>\n";
	$query = "select * from ".$tn;
	$result = mysql_query($query);
	if (!$result) die("[SQL ����]".mysql_error());
	mysql_close($dbconnect);

	$Nofields = mysql_num_fields($result);
	echo("<table border=1 cellpadding=3 align=\"center\">\n");
	echo("<tr bgcolor=\"#cccccc\">");
	for($i=0; $i < $Nofields; $i++) {
		$field_name = mysql_field_name($result, $i);
		echo("<th>$field_name</th>\n");
	}
	echo "<th>����</th>";
	echo("</tr>\n");

	$j=0;
	while($row = mysql_fetch_array($result)) {
		echo("<tr>\n");
		for ($i = 0; $i < $Nofields; $i++) {
			$field_name = mysql_field_name($result, $i);
			echo("<td align=\"center\">$row[$field_name]</td>\n");
		}
		echo "<td align=\"center\">";
		echo "<a href=\"mult20upd.php?no=$j&tn=$tn\">����</a>";
		echo "</td>\n";
		echo("</tr>\n");

		$j++;
	}
	echo("</table>\n");
}
?>