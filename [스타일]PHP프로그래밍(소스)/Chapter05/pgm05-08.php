<html>
	<head><title>프로그램 5-8</title></head>
	<body>
<?
	$infoarray = array( array(10, 20, 30, 40, 50),
                array("국어", "영어", "수학", "정보"),
                array(95.5, 48.5, 72.4, 88.2, 59.0, 62.0));
  
	table_display($infoarray[0]);
	table_display($infoarray[1]);
	table_display($infoarray[2]);

	function table_display($a) {
		echo "<table border=1 cellpadding=5>
			<tr bgcolor=\"#cccccc\">
				<th>번호</th>
				<th>값</th>
			</tr>";
		for ($i=0; $i < sizeof($a); $i++) {
			echo "<tr>";
			echo "<td align=\"center\">".($i+1)."</td>";
			echo "<td align=\"center\">".$a[$i]."</td>";
			echo "</tr>";
		}
		echo "</table>";
	}
?>
	</body>
</html>