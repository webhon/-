<? session_start(); ?>
<html>
	<head><title>���� �뿩 ��ٱ��� ���α׷�</title></head>
	<body>
		<b><h3><center>�������</center></h3></b>

		<?
		echo "<p align=\"center\"><a href=\"pgm10-17.php\">��ٱ��� ����</a>";
		if (isset($_POST["f_books"])) {
			if (!empty($_SESSION["books"])) {
				$books = array_unique(
				array_merge(unserialize($_SESSION["books"]), $_POST["f_books"]));
				$_SESSION["books"] = serialize($books);
			}
			else 
				$_SESSION["books"] = serialize($_POST["f_books"]);
	  
			echo "<p align=\"center\">��ٱ��Ͽ� ����Ǿ����ϴ�!</p>";
		}
		$dbconnect = mysql_connect("localhost", "wellbook", "password");
		if (!$dbconnect) die("[����ȵ�]".mysql_error());
		if (!mysql_select_db("wellbookdb")) die("[���ý���]".mysql_error());
	   
		$query = "select no, author, title from BOOK";
		$result = mysql_query($query);
		if (!$result) die("[SQL ����]".mysql_error());

		echo "<form action=\"pgm10-16.php\" method=\"POST\">\n";
		echo "<table border=1 cellpadding=3 align=\"center\">\n";
		echo "<tr bgcolor=\"#cccccc\">";
		echo "<th>������ȣ</th><th>������</th><th>����</th><th>�뿩</th>";
		echo "</tr>\n";
		while($row = mysql_fetch_row($result)) {
			echo "<tr>\n";
			echo "<td align=\"center\">$row[0]</td>\n";
			echo "<td align=\"center\">$row[2]</td>\n";
			echo "<td align=\"center\">$row[1]</td>\n";
			echo "<td align=\"center\">
				<input type=\"checkbox\" name=\"f_books[]\" value=\"$row[2]\"></td>\n";
			echo("</tr>\n");
		}
		echo "<tr>\n";
		echo "<td align=\"right\" colspan=4><input type=\"submit\" value=\"����\"></td>";
		echo "</tr>\n";
		echo("</table>");
		echo "</form>\n";
		mysql_close($dbconnect);
		?>
		</body>
</html>