<html>
	<head><title>프로그램 6-4</title></head>
	<body>
<?
	$dataarray = file("http://www.php.net"); 
	$contents = join(" ", $dataarray);
	echo htmlspecialchars($contents);
?>
	</body>
</html>