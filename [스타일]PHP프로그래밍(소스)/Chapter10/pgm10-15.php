<?
	session_start();
	$dbconnect = mysql_connect("localhost", "wellbook", "password");
	if (!$dbconnect) die("[����ȵ�]".mysql_error());
	if (!mysql_select_db("wellbookdb")) die("[���ý���]".mysql_error());

	$query = "select * from BOOK";
	$result = mysql_query($query);
	if (!$result) die("[SQL ����]".mysql_error());
	
	echo "[<b>$sname</b>]�� ȯ���մϴ�.";
	echo "&nbsp; &nbsp;<a href=\"pgm10-13.php\">�α׾ƿ�</a><br>";
	echo "<p><h3><center>�������</center></h3>";
	echo "<table border=1 cellpadding=3 align=\"center\">\n";
	echo "<tr bgcolor=\"#cccccc\">";
	echo "<th>��ȣ</th><th>����</th><th>����</th><th>���ǻ�</th><th>����</th><th>��û</th>";
	echo "</tr>\n";

	while($row = mysql_fetch_row($result)) {
		echo "<tr>\n";
		echo "<td align=\"center\">$row[0]</td>\n";
		echo "<td align=\"center\">$row[1]</td>\n";
		echo "<td align=\"center\">$row[2]</td>\n";
		echo "<td align=\"center\">$row[3]</td>\n";
		echo "<td align=\"center\">$row[6]</td>\n";
		echo "<td align=\"center\"><a href=\"pgm10-15rent.php?no=$row[0]\">�뿩</a></td>\n";
		echo("</tr>\n");
		}
	echo("</table>");
	mysql_close($dbconnect);
?>