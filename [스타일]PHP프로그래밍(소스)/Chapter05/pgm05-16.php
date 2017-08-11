<html>
	<head><title>프로그램 5-16</title></head>
	<body>
<?
	echo "<p>내일 : ".date('Y 년 n월 d일', mktime (0,0,0,date("m"), date("d")+1, date("Y")));
	echo "<p>지난달 : ".date('Y 년 n월 d일', mktime (0,0,0,date("m")-1, date("d"), date("Y")));
	echo "<p>내년 : ".date('Y 년 n월 d일', mktime (0,0,0,date("m"), date("d"), date("Y")+1));
?>
	</body>
</html>