<?
	$dbconnect = mysql_connect("localhost", "wellbook", "password");
	if (!$dbconnect) die("[����ȵ�]".mysql_error());
	if (!mysql_select_db("wellbookdb")) die("[���ý���]".mysql_error());

	$query = "create table USER (
		id			char(10) not null, 
		passwd	char(80),
		sname	varchar(20),
		sno		char(11),
		dept		varchar(20), 
		year		int,
		email		varchar(40),
		primary key (id)
	) ";

	$result = mysql_query($query);
	if (!$result) die("[SQL ����]".mysql_error());
	echo("[���̺� [USER] ���� �Ϸ�]");
	mysql_close($dbconnect);
?>