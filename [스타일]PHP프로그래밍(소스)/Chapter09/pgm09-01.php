<?
	$dbconnect = mysql_connect("localhost", "wellbook", "password");
	if (!$dbconnect) {
		die("[연결안됨]".mysql_error());
	}
	echo "[연결됨]";
	mysql_close($dbconnect);
?>