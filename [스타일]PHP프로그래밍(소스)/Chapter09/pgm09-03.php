<?
	$dbconnect = mysql_connect("localhost", "wellbook", "password");
	if (!$dbconnect) die("[����ȵ�]" . mysql_error());
	echo "[�����]<br>";

	if (!mysql_select_db("wellbookdb")) die("[���ý���]" . mysql_error());
	else echo "�����ͺ��̽� [wellbookdb]�� ���õ�<br>";

	$query = "select * from STUDENT";

	$result = mysql_query($query);
	if (!$result) die("[SQL ����]".mysql_error());
	echo "��� ����.<br>";
	
	echo "�Ӽ��� ���� : ".mysql_num_fields($result)."<br>";
	echo "Ʃ���� ���� : ".mysql_num_rows($result)."<br>";

	mysql_close($dbconnect);
?>