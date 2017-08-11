<html>
	<head><title>프로그램 7-5</title></head>
	<body>
<?
	$vowels = array("a", "e", "i", "o", "u");
	$input = "This is a wonderful world.";

	echo str_replace($vowels, "*", $input);
?>
	</body>
</html>