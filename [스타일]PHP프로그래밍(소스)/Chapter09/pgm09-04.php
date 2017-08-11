<?
	$dbconnect = mysql_connect("localhost", "wellbook", "password");
	if (!$dbconnect) die("[연결안됨]" . mysql_error());
	echo "[연결됨]<BR>";
 
	if (!mysql_select_db("wellbookdb")) die("[선택실패]".mysql_error());
	else echo "데이터베이스 [wellbookdb]이 선택됨<br>";
 
	$query = "select * from STUDENT";
 
	$result = mysql_query($query);
	if (!$result) die("[SQL 오류]".mysql_error());
 	
	$Nofields = mysql_num_fields($result);
	for($i=0; $i < $Nofields; $i++) {
		$field_name = mysql_field_name($result, $i);
		echo ($i+1)."번째 속성 : ".$field_name."<br>";
	}
	mysql_close($dbconnect);
?>