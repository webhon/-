<html>
	<head><title>���α׷� 7-1</title></head>
	<body>
<?	
	$string = "Heeeeeeeeello";

	if ($r=strchr($string, "ello")) echo "$r ã�ҽ��ϴ�.<br>";

	if ($r=strchr($string, "eello")) echo "$r ã�ҽ��ϴ�.<br>";

	if ($r=strchr($string, "eeello")) echo "$r ã�ҽ��ϴ�.<br>";

	if (ereg("e+llo", $string, $value)) echo "$value[0] ã�ҽ��ϴ�.<br>";
?>
	</body>
</html>