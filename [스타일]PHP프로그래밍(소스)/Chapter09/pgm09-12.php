<?
	$dbconnect = mysql_connect("localhost", "wellbook", "password");
	if (!$dbconnect) die("[연결안됨]".mysql_error());
	if (!mysql_select_db("wellbookdb")) die("[선택실패]".mysql_error());

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
	if (!$result) die("[SQL 오류]".mysql_error());
	echo("[테이블 [RENTAL] 생성 완료]");
	mysql_close($dbconnect);
?>