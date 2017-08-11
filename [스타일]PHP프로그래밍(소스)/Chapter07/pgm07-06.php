<html>
	<head><title>프로그램 7-6</title></head>
	<body>
<?
	$vowels = array("a", "e", "i", "o", "u");
	$cvowels = array("A", "E", "I", "O", "U");
	$input = "This is a wonderful world.";

	echo str_replace($vowels, $cvowels, $input);
?>
	</body>
</html>