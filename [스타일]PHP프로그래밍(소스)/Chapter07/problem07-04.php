<html>
	<head><title>¹®Á¦ 7-4</title></head>
	<body>
<?
	$string = "This tea smells good.";
	echo "Original string : $string <br>";
	echo ereg_replace("good", "great", $string)."<br>";
	echo ereg_replace("(g[[:alpha:]]+)", "very \\1", $string)."<br>";
	echo ereg_replace("(g[[:alpha:]]+)(\.)", "\\1 \\2 \\2 \\2", $string)."<br>";
?>
	</body>
</html>