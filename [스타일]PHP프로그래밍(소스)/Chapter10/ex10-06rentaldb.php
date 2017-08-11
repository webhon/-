<?
	session_start();
	echo "<html><head><title>종합문제 10-2(대여정보 기록)</title></head><body>\n";

	$choice = $_POST["choice"];
	$sname = $_SESSION["sname"];
	$no = $_SESSION["no"];
	$id = $_SESSION["id"];
 
	if ($choice == 1) {
		$dbconnect = mysql_connect("localhost", "wellbook", "password");
		if (!$dbconnect) die("[연결안됨]".mysql_error());
		if (!mysql_select_db("wellbookdb")) die("[선택실패]".mysql_error());
		$bdate = date('Y-m-d');
		$prdate = date('Y-m-d', mktime(0, 0, 0, date("m"), date("d")+7, date("Y")));
		$query = "insert into RENTAL(id, no, bdate, prdate, rdate, delay)
 		          values ('$id', $no, '$bdate', '$prdate', NULL, 0)";
		$result = mysql_query($query);
		if (!$result) die("[SQL 오류]".mysql_error());
		echo "[$sname]님 대여정보가 등록되었습니다.<br>";
 
		$query = "update BOOK set r_flag = 1 where no = $no";
		$result = mysql_query($query);
		if (!$result) die("[SQL 오류]".mysql_error());
		echo "도서[$title]가 대여중입니다.<br>";
		mysql_close($dbconnect);
		echo "<a href=\"ex10-05list.php\">도서 목록 보기</a>";
	}
	else {
		echo "대여가 취소되었습니다.";
		echo"<metahttp-equiv=\"refresh\" content=\"3;url=ex10-05list.php\">";
	}
?>
</body></html>