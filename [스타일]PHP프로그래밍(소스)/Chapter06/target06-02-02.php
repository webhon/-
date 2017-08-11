<html>
	<head><title>목표문제 6-2</title></head>
	<body>
<?
	$lines = file("webinfo.txt");
	$fp = fopen("webinfo.html", "w");
	fputs($fp, "<table border=1 cellpadding=5>\r\n");
	fputs($fp, "<tr bgcolor=\"#cccccc\">\r\n");
	fputs($fp, "<th>아이디</th>\r\n");
	fputs($fp, "<th>이메일</th>\r\n");
	fputs($fp, "<th>홈페이지주소</th>\r\n");

	foreach ($lines as $line) {
		fputs($fp, "<tr>\r\n");
		$infoarray = split("\*", $line);
		for ($i=0; $i < sizeof($infoarray); $i++) {
			fputs($fp,"<td align=\"center\"> $infoarray[$i] </td>\r\n");
		}
		fputs($fp, "</tr>\r\n");
	}
	fputs($fp, "</table>\r\n");
	fclose($fp);
?>
	webinfo.html 파일이 생성되었습니다. 확인하시려면 
	<a href="webinfo.html">파일보기</a>를 클릭하세요.
	</body>
</html>