<?
	session_start();
	echo "<html><head><title>���չ��� 10-2(�뿩���� ���)</title></head><body>\n";

	$choice = $_POST["choice"];
	$sname = $_SESSION["sname"];
	$no = $_SESSION["no"];
	$id = $_SESSION["id"];
 
	if ($choice == 1) {
		$dbconnect = mysql_connect("localhost", "wellbook", "password");
		if (!$dbconnect) die("[����ȵ�]".mysql_error());
		if (!mysql_select_db("wellbookdb")) die("[���ý���]".mysql_error());
		$bdate = date('Y-m-d');
		$prdate = date('Y-m-d', mktime(0, 0, 0, date("m"), date("d")+7, date("Y")));
		$query = "insert into RENTAL(id, no, bdate, prdate, rdate, delay)
 		          values ('$id', $no, '$bdate', '$prdate', NULL, 0)";
		$result = mysql_query($query);
		if (!$result) die("[SQL ����]".mysql_error());
		echo "[$sname]�� �뿩������ ��ϵǾ����ϴ�.<br>";
 
		$query = "update BOOK set r_flag = 1 where no = $no";
		$result = mysql_query($query);
		if (!$result) die("[SQL ����]".mysql_error());
		echo "����[$title]�� �뿩���Դϴ�.<br>";
		mysql_close($dbconnect);
		echo "<a href=\"ex10-05list.php\">���� ��� ����</a>";
	}
	else {
		echo "�뿩�� ��ҵǾ����ϴ�.";
		echo"<metahttp-equiv=\"refresh\" content=\"3;url=ex10-05list.php\">";
	}
?>
</body></html>