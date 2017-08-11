<?
	$dbconnect = mysql_connect("localhost", "wellbook", "password");
	if (!$dbconnect) die("[연결안됨]".mysql_error());
	if (!mysql_select_db("wellbookdb")) die("[선택실패]".mysql_error());

	$query = "create table BOOK (
				no		int not null auto_increment,
				author		varchar(20),
				title		varchar(40),
				publisher	varchar(20),
				price		int,
				pdate		date,
				area		char(10),
				r_flag		bool default 0,
				primary key (no)
	) ";

	$result = mysql_query($query);
	if (!$result) die("[SQL 오류]".mysql_error());
	echo("[테이블 [BOOK] 생성 완료]");
	mysql_close($dbconnect);
?>