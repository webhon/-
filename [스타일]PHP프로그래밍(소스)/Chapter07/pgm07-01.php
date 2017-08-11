<html>
	<head><title>프로그램 7-1</title></head>
	<body>
<?	
	$string = "Heeeeeeeeello";

	if ($r=strchr($string, "ello")) echo "$r 찾았습니다.<br>";

	if ($r=strchr($string, "eello")) echo "$r 찾았습니다.<br>";

	if ($r=strchr($string, "eeello")) echo "$r 찾았습니다.<br>";

	if (ereg("e+llo", $string, $value)) echo "$value[0] 찾았습니다.<br>";
?>
	</body>
</html>