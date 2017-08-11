<?
	$tablename = $_GET["tn"];
	$newrow = $_POST["newrow"];

	$query = "select * from $tablename";
	$dbconnect = mysql_connect("localhost", "wellbook", "password");
	if (!$dbconnect) die("[연결안됨]".mysql_error());
	if (!mysql_select_db("wellbookdb")) die("[선택실패]".mysql_error());

	$query = "select * from $tablename";
	$result = mysql_query($query);
	if (!$result) die("[SQL 오류]".mysql_error());
	mysql_close($dbconnect);

	$query = "update $tablename SET ";

	$Nofields = mysql_num_fields($result);
	$fn = mysql_field_name($result, 0);
	$query .= ( $fn."= '". $newrow[0]."'" );
	for ($i = 1; $i < $Nofields; $i++) {
		$query .= ", ";
		$field_name = mysql_field_name($result, $i);
		$query .= ( $field_name."= '". $newrow[$i]. "'" );
	}
	$query .= ( " where  $fn = '".$newrow[0]."' " );
	echo " [ $query ] ";

	$dbconnect = mysql_connect("localhost", "wellbook", "password");
	if (!$dbconnect) die("[연결안됨]".mysql_error());
	if (!mysql_select_db("wellbookdb")) die("[선택실패]".mysql_error());

	$result = mysql_query($query);
	if (!$result) die("[SQL 오류]".mysql_error());
	echo "<p>갱신이 되었습니다.<p>";
	mysql_close($dbconnect);
?>
<p>
<a href="mult20.html">데이터 조작어 메뉴로 돌아가기</a>