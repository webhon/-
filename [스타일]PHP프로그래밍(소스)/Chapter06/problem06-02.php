<html>
	<head><title>���� 6-2</title></head>
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

	echo "[$student[1]] �л��� ������ ����Ǿ����ϴ�.<br>";
	echo "<p><a href=\"problem06-02.html\">�л����� �Է�</a>";
?>
	</body>
</html>