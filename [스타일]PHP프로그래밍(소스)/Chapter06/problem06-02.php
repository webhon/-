<html>
	<head><title>문제 6-2</title></head>
	<body>
<?
	$student = array($_POST["id"],
		$_POST["name"],
		$_POST["dept"], 
		$_POST["year"], 
		$_POST["addr"], 
		$_POST["li"]);

	$line = join(":", $student)."\r\n";
	$fp = fopen("student.txt", "a"); 
	fputs($fp, $line); 
	fclose($fp);

	echo "[$student[1]] 학생의 정보가 저장되었습니다.<br>";
	echo "<p><a href=\"problem06-02.html\">학생정보 입력</a>";
?>
	</body>
</html>