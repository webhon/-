<?
	$dbconnect = mysql_connect("localhost", "wellbook", "password");
	if (!$dbconnect) die("[연결안됨]".mysql_error());

	if (!mysql_select_db("wellbookdb")) die("[선택실패]".mysql_error());

	$query = "select * from STUDENT";

	$result = mysql_query($query);
	if (!$result) die("[SQL 오류]".mysql_error());
	
	$value = mysql_fetch_field($result, 0);
	echo "name : $value->name <br>";
	echo "table : $value->table <br>";
	echo "def : $value->def <br>";
	echo "max_length : $value->max_length <br>";
	echo "not_null : $value->not_null <br>";
	echo "primary_key : $value->primary_key <br>";
	echo "numeric : $value->numeric <br>";
	echo "blob : $value->blob <br>";
	echo "type : $value->type <br>";
	echo "unsigned : $value->unsigned <br>";

	mysql_close($dbconnect);
?>