<?
	$id = $_GET["id"];
	$no = $_GET["no"];
	$sname = $_GET["sname"];

	$dbconnect = mysql_connect("localhost", "wellbook", "password");
	if (!$dbconnect) die("[����ȵ�]".mysql_error());
	if (!mysql_select_db("wellbookdb")) die("[���ý���]".mysql_error());

	$query = "select * from BOOK where no = '$no'";
	$result = mysql_query($query);
	if (!$result) die("[SQL ����]".mysql_error());
	$row = mysql_fetch_row($result);
	list($no, $author, $title, $publisher, $price, $pdate, $area, $r_flag) = $row;
	mysql_close($dbconnect);
	
	if ($r_flag == 0) {
	echo "[$sname]��, ���� ����[$title]�� �뿩�� �����մϴ�.<br>\n"; 
	echo "<p>"; 
	echo "<table border=1 cellpadding=3>\n";
	echo "<tr bgcolor=\"#cccccc\"><th>�׸�</th><th>��</th></tr>\n";
	echo "<tr><td align=\"center\">����</td>
	<td align=\"center\">$author</td></tr>\n";
	echo "<tr><td align=\"center\">������</td>
	<td align=\"center\">$title</td></tr>\n";
	echo "<tr><td align=\"center\">���ǻ�</td>
	<td align=\"center\">$publisher</td></tr>\n";
	echo "<tr><td align=\"center\">����</td>
	<td align=\"center\">$price</td></tr>\n";
	echo "<tr><td align=\"center\">������</td>
	<td align=\"center\">$pdate</td></tr>\n";
	echo "<tr><td align=\"center\">����</td>
	<td align=\"center\">$area</td></tr>\n";
	echo "</table>\n";
	echo "<form action=\"pgm09-17rentaldb.php\" method=\"POST\">\n";
	echo "* �뿩�Ͻðڽ��ϱ�? &nbsp; &nbsp; ";
	echo "<input type=\"radio\" name=\"choice\" value=1>��"; 
	echo "<input type=\"radio\" name=\"choice\" value=0>�ƴϿ�"; 
	echo "<input type=\"hidden\" name=\"no\" value=$no>";
	echo "<input type=\"hidden\" name=\"id\" value=$id>";
	echo "<input type=\"hidden\" name=\"sname\" value=$sname>";
	echo "<input type=\"hidden\" name=\"title\" value=$title>";
	echo "&nbsp; &nbsp;<input type=\"submit\" value=\"����\">";
	echo "</form>\n";
	}
	else {
	echo "[$sname]��, ����[$title]�� �뿩���Դϴ�. ������ �ٽ� ��û�� �ּ���.<br>"; 
	echo "<a href=\"pgm09-15list.php?id=$id&sname=$sname\">���� ��� ����</a>";
	}
?>