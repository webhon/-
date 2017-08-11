<?
	$dbconnect = mysql_connect("localhost", "wellbook", "password");
	if (!$dbconnect) die("[연결안됨]".mysql_error());
	if (!mysql_select_db("wellbookdb")) die("[선택실패]".mysql_error());

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
	if (!$result) die("[SQL 오류]".mysql_error());
	echo("[테이블 [USER] 생성 완료]");
	mysql_close($dbconnect);
?>