<html>
	<head><title>프로그램 4-14</title></head>
	<body>
<?
	$students = array(
	"길동" => array("동아리" => "수영", "학년" => 1, "학과" => "컴퓨터"),
	"몽룡" => array("동아리" => "수영", "학년" => 2, "학과" => "물리"),
	"춘향" => array("동아리" => "테니스", "학년" => 2, "학과" => "컴퓨터"),
	"홍도" => array("동아리" => "낚시", "학년" => 3, "학과" => "화학"),
	"윤복" => array("동아리" => "테니스", "학년" => 3, "학과" => "물리"),
	"장금" => array("동아리" => "낚시", "학년" => 2, "학과" => "생물"),
	"준영" => array("동아리" => "등산", "학년" => 4, "학과" => "물리"),
	"영실" => array("동아리" => "테니스", "학년" => 3, "학과" => "컴퓨터"),
	"준표" => array("동아리" => "등산", "학년" => 2, "학과" => "화학"));

	echo "<h3>테니스 동아리 학생들</h3>";
	foreach ($students as $name => $values) {
		$value = each($values);
		if ($value[value] != "테니스") continue;
			echo "[<b>$name</b>] :: <br>";
			while (list($k, $v) = each($values)) {
				echo "$k -> $v ";
			}
		echo "<br>";
		echo "<hr>";
	}
?> 
	</body>
</html>