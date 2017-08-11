<html>
	<head><title>다양한 프로그램 예제 16</title>
	</head>
<body>
<?
	$string = "http://3-CE.cheju.ac.kr";
	if (ereg("^http://[a-zA-Z0-9\-]*(\.[a-zA-Z0-9-]*){2,3}",$string,$value)) 
		echo "$value[0] 찾았습니다. <br>";   
?>
	</body>
</html>