<html>
	<head><title>종합문제 5-2</title></head>
	<body>
		<h3>정보</h3>
		<table border=1>
		<tr bgcolor="#cccccc"> 
			<th>아이디</th>
			<th>이메일주소</th>
			<th>홈페이지주소</th>
		</tr>
<?
	$lines = file("webinfo.txt");

	foreach ($lines as $line) {
		$info = split("\*", $line);
		echo "<tr>";
		for ($i=0; $i<sizeof($info); $i++) echo "<td align=\"center\">".$info[$i]."</td>";
		echo "</tr>";
	}
	echo "</table>";
?>
	</body>
</html>