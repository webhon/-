<?
	$dbconnect = mysql_connect("localhost", "wellbook", "password");
	if (!$dbconnect) {
		die("[����ȵ�]" . mysql_error());
	}
	echo "[�����]<br>";
	$flag = mysql_select_db("wellbookdb");
	if (!$flag) die("[���ý���]".mysql_error());
	else echo "�����ͺ��̽� [wellbookdb]�� ���õ�<br>";
	mysql_close($dbconnect);
?>