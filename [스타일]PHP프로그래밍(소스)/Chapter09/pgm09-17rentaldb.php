<?
	$id = $_POST["id"];
	$no = $_POST["no"];
	$sname = $_POST["sname"];
	$choice = $_POST["choice"];
	$title = $_POST["title"];
 
	if ($choice == 1) {
		$dbconnect = mysql_connect("localhost", "wellbook", "password");
		if (!$dbconnect) die("[����ȵ�]".mysql_error());
		if (!mysql_select_db("wellbookdb")) die("[���ý���]".mysql_error());
		$bdate = date('Y-m-d');
		$prdate = date('Y-m-d', mktime(0, 0, 0, date("m"), date("d")+7, date("Y")));
		$query = "insert into RENTAL(id, no, bdate, prdate, rdate, delay)
 		          values ('$id', no, '$bdate', '$prdate', NULL, 0)";
		$result = mysql_query($query);
		if (!$result) die("[SQL ����]".mysql_error());
		echo "[$sname]�� �뿩������ ��ϵǾ����ϴ�.<br>";
 
		$query = "update BOOK set r_flag = 1 where no = $no";
		$result = mysql_query($query);
		if (!$result) die("[SQL ����]".mysql_error());
		echo "����[$title]�� �뿩���Դϴ�.<br>";
		mysql_close($dbconnect);
		echo "<a href=\"pgm09-15list.php?id=$id&sname=$sname\">���� ��� ����</a>";
	}
	else {
		echo "�뿩�� ��ҵǾ����ϴ�.";
		echo"<metahttp-equiv=\"refresh\" content=\"3;url=pgm09-15list.php?id=$id&sname=$sname\">";
	}
?>