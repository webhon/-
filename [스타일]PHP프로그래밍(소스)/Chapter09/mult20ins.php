<?
	$tablename = $_GET["tn"]; 
	$newrow = $_POST["newrow"];
	$query = "insert into $tablename values (";

	if (gettype($newrow[0]) == string) {
		$query .= ( "'".$newrow[0]."'");
	}
	else 	$query .=  $newrow[0];
	
	for	($i=1; $i < sizeof($newrow); $i++) {
		$query .= ", ";
		if (gettype($newrow[$i]) == string) {
			$query .= ( "'".$newrow[$i]."'");
		}
		else if ($newrow[$i] == NULL)
			$query .= "NULL";
		else
			$query .=  $newrow[$i];
	}
	$query .= ")";

	$dbconnect = mysql_connect("localhost", "wellbook", "password");
	if (!$dbconnect) die("[연결안됨]".mysql_error());
	if (!mysql_select_db("wellbookdb")) die("[선택실패]".mysql_error());

	echo "<p> [ $query ]";
	$result = mysql_query($query);
	if (!$result) die("[SQL 오류]".mysql_error());
	echo "<p>테이블 [<b>$tablename</b>]에 삽입되었습니다.";
	mysql_close($dbconnect);
?>
<p>
<a href="mult20.html">데이터 조작어 메뉴로 돌아가기</a>