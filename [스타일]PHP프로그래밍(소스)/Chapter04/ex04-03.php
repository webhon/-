<html>
	<head><title>종합문제 4-1</title></head>
	<body>
<?
	$member = array("영아" => array("age"=>22, "dept"=> "컴퓨터", year => 2),
                     "현수" => array("age"=>23, "dept"=> "컴퓨터", year => 4),
                     "완철" => array("age"=>25, "dept"=> "수학", year => 3));
?>

		<table border=1>
			<tr bgcolor="#cccccc">
				<th colspan=3>이름</th>
			</tr>
			<tr bgcolor="#cccccc">
				<th>나이</th>
				<th>소속학과</th> <th>학년</th>
			</tr>
<?
	foreach ($member as $key => $values) {
		echo "<tr>\n"; 
		echo "<td colspan=3 align=\"center\"> $key </tr>\n";
		echo "</tr>\n";

		echo "<tr>\n";
		foreach ($values as $k => $v) {
			echo "<td align=\"center\"> $v </td>"; 
		}
		echo "</tr>\n";
	}
?>
		</table>
	</body>
</html>