<?
	$dbconnect = mysql_connect("localhost", "wellbook", "password");
	if (!$dbconnect) die("[����ȵ�]".mysql_error());
	if (!mysql_select_db("wellbookdb")) die("[���ý���]".mysql_error());

	$query = "create table RENTAL (
		rno		int not null auto_increment,
		id		char(10) not null, 
		no		int not null,
		bdate		date,
		prdate		date,
		rdate		date,
		delay		int,
		primary key (rno))";

	$result = mysql_query($query);
	if (!$result) die("[SQL ����]".mysql_error());
	echo("[���̺� [RENTAL] ���� �Ϸ�]");
	mysql_close($dbconnect);
?>