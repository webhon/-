<html><head><title>���չ��� 9-2(�������)</title></head><body>
<?
	$sname = $_GET["sname"];
	$dbconnect = mysql_connect("localhost", "wellbook", "password");
	if (!$dbconnect) die("[����ȵ�]".mysql_error());
	if (!mysql_select_db("wellbookdb")) die("[���ý���]".mysql_error());

	$query = "select * from BOOK";
	$result = mysql_query($query);
	if (!$result) die("[SQL ����]".mysql_error());
	echo "[<b>$sname</b>]�� ȯ���մϴ�.";
	echo "&nbsp; &nbsp;<a href=\"pgm09-13.html\">�α׾ƿ�</a><br>";
	echo "<p><h3><center>�������</center></h3>";
	echo "<table border=1 cellpadding=3 align=\"center\">\n";
	echo "<tr bgcolor=\"#cccccc\">";
	echo "<th>��ȣ</th><th>����</th><th>����</th><th>���ǻ�</th><th>����</th><th>�뿩����</th><th>��û</th>";
	echo "</tr>\n";
	while($row = mysql_fetch_row($result)) {
		echo "<tr>\n";
		echo "<td align=\"center\">$row[0]</td>\n";
		echo "<td align=\"center\">$row[1]</td>\n";
		echo "<td align=\"center\">$row[2]</td>\n";
		echo "<td align=\"center\">$row[3]</td>\n";
		echo "<td align=\"center\">$row[6]</td>\n";
		if ($row[7] == 0) {
			echo "<td align=\"center\">�뿩����</td>\n";
			echo "<td align=center>
				  <a href=\"pgm09-16rental.php?no=$row[0]&sname=$sname\">��û</a></td>\n";
		}
		else {
			echo "<td align=\"center\">�뿩��</td>\n";
			echo "<td align=center > &nbsp; </td>\n";
		}
				echo("</tr>\n");
	}
	echo("</table></body></html>");
	mysql_close($dbconnect);
?>