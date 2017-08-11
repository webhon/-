<?
	$contents = array(array(no => 1, au => "드보노", ti => "창의력사전", pu => "21세기북스"),
				  array(no => 2, au => "다중지능", ti => "하워드가드너", pu => "웅진"),
				  array(no => 3, au => "제프모지", ti => "창의력주식회사", pu => "푸른숲")
	);
?>
<html>
	<head><title>종합문제 2-2</title></head>
	<body>
		<table border = 1 cellpadding=5>
			<tr bgcolor="#cccccc">
				<th>번호</th>
				<th>저자</th>
				<th>제목</th>
				<th>출판사</th>
			</tr>
<?
		echo "<tr>\n";
		echo "<td align=\"center\">".$contents[0][no]."</td>";
		echo "<td align=\"center\">".$contents[0][au]."</td>";
		echo "<td align=\"center\">".$contents[0][ti]."</td>";
		echo "<td align=\"center\">".$contents[0][pu]."</td>";
		echo "</tr>\n";

		echo "<tr>\n";
		echo "<td align=\"center\">".$contents[1][no]."</td>";
		echo "<td align=\"center\">".$contents[1][au]."</td>";
		echo "<td align=\"center\">".$contents[1][ti]."</td>";
		echo "<td align=\"center\">".$contents[1][pu]."</td>";
		echo "</tr>\n";

		echo "<tr>\n";
		echo "<td align=\"center\">".$contents[2][no]."</td>";
		echo "<td align=\"center\">".$contents[2][au]."</td>";
		echo "<td align=\"center\">".$contents[2][ti]."</td>";
		echo "<td align=\"center\">".$contents[2][pu]."</td>";
		echo "</tr>\n";

?>
		</table>
	</body>
</html>