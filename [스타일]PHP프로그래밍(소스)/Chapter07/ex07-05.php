<html>
	<head><title>종합문제 7-2</title></head>
	<body>
<?
	$url="www.phpschool.ac.kr"; 
	echo "[Originally] :: $url <br>";
	$pattern ="([a-zA-Z0-9\-_][0-9a-zA-Z./@~?&=_]*)"; 
	$addedurl =ereg_replace($pattern, "http://\\1", $url); 
	echo ("[Added] :: $addedurl <br>"); 
?>
	</body>
</html>