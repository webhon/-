<?
	$dbconnect = mysql_connect("localhost", "wellbook", "password");
	if (!$dbconnect) {
		die("[����ȵ�]".mysql_error());
	}
	echo "[�����]";
	mysql_close($dbconnect);
?>