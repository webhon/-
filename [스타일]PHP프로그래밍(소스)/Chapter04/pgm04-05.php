<html>
	<head><title>프로그램 4-5</title></head>
	<body>
<?
	$deptname = "컴퓨터공학";
	switch ($deptname) {
		case "컴퓨터공학" : $deptcode = 1;
		case "전자공학" : $deptcode = 2;
		case "생명공학" : $deptcode = 3;
		default : $deptcode = 0;
	}

	echo "\$deptcode = $deptcode<br>";
?>
	</body>
</html>