<?
	session_start();
	if (isset($_POST["sno"])) {
		$sno = $_SESSION["sno"] = $_POST["sno"];
	}
	$dbconnect = mysql_connect("localhost", "wellbook", "password");
	if (!$dbconnect) die("[����ȵ�]".mysql_error());
	if (!mysql_select_db("wellbookdb")) die("[���ý���]".mysql_error());
	$query = "select * from STUDENT where sno = '$sno'";
	$result = mysql_query($query);
	if (!$result) die("[SQL ����]".mysql_error());
	$row = mysql_fetch_object($result);

	echo "<hr>����� ������ ������ �����ϴ�.<hr>";
	echo "�й� : ".$row->sno." <br>";
	echo "�̸� : ".$row->name." <br>";
	echo "�а� : ".$row->deptname." <br>";
	echo "�г� : ".$row->year." <br>";
	echo "�ּ� : ".$row->addr." <br>";
	echo "��ȭ : ".$row->telno." <br>";
	echo "������ : ".$row->tcredits." <br>";
	echo "���� : ".$row->gpa." <br>";
	echo "<hr>";
	mysql_close($dbconnect);
	$_SESSION["sinfo"] = serialize($row);

	$dbconnect = mysql_connect("localhost", "wellbook", "password");
	if (!$dbconnect) die("[����ȵ�]".mysql_error());
	if (!mysql_select_db("wellbookdb")) die("[���ý���]".mysql_error());

	$query = "select * from COURSE";
	$result = mysql_query($query);
	if (!$result) die("[SQL ����]".mysql_error());
	echo "<p><h3><b>������û����</b></h3><br>";
	echo "<form action=\"pgm11-09.php\" method=\"POST\">\n";
	echo "<table border=1 cellpadding=3>\n";
	echo "<tr bgcolor=\"#cccccc\">
	 	<th>�����ȣ</th><th>�����</th><th>�����а�</th>
		<th>�ü�</th><th>����</th></tr>\n";
	while ($row = mysql_fetch_object($result)) {
		echo "<tr>\n";
		echo "<td align=\"center\">$row->courseno</td>\n"; 
		echo "<td align=\"center\">$row->coursename</td>\n"; 
		echo "<td align=\"center\">$row->deptname</td>\n"; 
		echo "<td align=\"center\">$row->credit</td>\n"; 
		echo "<td align=\"center\">
			<input type=\"checkbox\" name=\"courseno[]\" 
			value=".$row->courseno."></td>\n";
		echo "</tr>\n";
	}
	echo "<tr><td colspan=5 align=\"right\">
		<input type=\"submit\" value=\"����\"></td></tr>\n";
	echo "</table>\n";
	echo "</form>";

	mysql_close($dbconnect);
?>