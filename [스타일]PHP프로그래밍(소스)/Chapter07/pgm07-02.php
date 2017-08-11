<html>
	<head><title>프로그램 7-2</title></head>
	<body>
<?
	$msg = "오늘은 2009년 2월 12일 입니다.";
	if (ereg ("([0-9]{4})년 ([0-9]{1,2})월 ([0-9]{1,2})일",$msg,$matchdata))
		print_r($matchdata);
	else
		echo "해당 패턴이 존재하지 않습니다.";
?>
	</body>
</html>