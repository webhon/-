<html>
	<head><title>프로그램 4-11</title></head>
	<body>
<?
	$subjects = array("국어", "수학", "영어", "정보", "과학", "사회");
	$one_item = each($subjects);

	echo "<hr>";
	echo "현재의 원소 : <br>";
	print_r($one_item);
	echo "<hr>";
?>
	</body>
</html>