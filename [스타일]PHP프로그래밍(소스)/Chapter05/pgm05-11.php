<html>
	<head><title>프로그램 5-11</title></head>
	<body>
<?
	define(NOSTUDENT, 4);
	$students = array( array("홍길동", "컴퓨터", 3, "아라동"),
			   array("이몽룡", "물리", 2, "노형동"),
			   array("성춘향", "생물", 1, "오라동"),
			   array("김홍도", "컴퓨터", 3, "이도동"));

	print_array();

	function print_array() {
		GLOBAL $students;
		echo "총 학생의 수 = ".NOSTUDENT;

		echo "<table border=1> 
			<tr bgcolor=\"#cccccc\">
				<th>이름</th>
				<th>주소</th>
			</tr>\n";
		for ($i=0; $i < NOSTUDENT; $i++) {
			echo "<tr>";
			echo "<td align=\"center\">".$students[$i][0]."</td>";
			echo "<td align=\"center\">".$students[$i][3]."</td>";
			echo "</tr>\n";
		}
		echo "</table>\n";
	}
?>
	</body>
</html>