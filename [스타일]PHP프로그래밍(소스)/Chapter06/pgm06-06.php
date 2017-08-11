<html>
	<head><title>프로그램 6-6</title></head>
	<body>
<?
	$fp = fopen("output.txt", "w");
	fputs($fp, "안녕하세요.\r\n");
	fputs($fp, "반갑습니다.\r\n");
	fclose($fp);
	echo "기록이 완료되었습니다.";
?> 
	</body>
</html>