<html>
	<head><title>��ǥ���� 6-2</title></head>
	<body>
<?
	$lines = file("webinfo.txt");
	$fp = fopen("webinfo.html", "w");
	fputs($fp, "<table border=1 cellpadding=5>\r\n");
	fputs($fp, "<tr bgcolor=\"#cccccc\">\r\n");
	fputs($fp, "<th>���̵�</th>\r\n");
	fputs($fp, "<th>�̸���</th>\r\n");
	fputs($fp, "<th>Ȩ�������ּ�</th>\r\n");

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
	webinfo.html ������ �����Ǿ����ϴ�. Ȯ���Ͻ÷��� 
	<a href="webinfo.html">���Ϻ���</a>�� Ŭ���ϼ���.
	</body>
</html>