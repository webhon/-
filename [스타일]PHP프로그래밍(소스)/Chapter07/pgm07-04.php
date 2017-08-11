<html>
	<head><title>프로그램 7-4</title></head>
	<body>
<?
	$numbers = "apple banana 2 grape melon";
	echo "originally :: $numbers<br>";
	echo "changed :: ".ereg_replace("([[:alpha:]]+) ([[:alpha:]]+) [[:digit:]]", "\\2 \\1", $numbers);
?>
	</body>
</html>