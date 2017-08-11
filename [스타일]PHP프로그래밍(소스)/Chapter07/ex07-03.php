<html>
	<head><title>평가문제 7-3</title></head>
	<body>
<?
	$ssnumber = "090101-2999999";
	if (ereg("[0-9]{2,2}[01][0-9][03][0-9]-[12][0-9]{6,6}", $ssnumber, $n)) {
		echo $n[0].":: correct! <br>";
	}
	else echo "Incorrect! <br>";

	$ssnumber = "092031-2999999";
	if (ereg("[0-9]{2,2}[01][0-9][03][0-9]-[12][0-9]{6,6}", $ssnumber, $n)) {
		echo $n[0].":: correct! <br>";
	}
	else echo "Incorrect! <br>";

	$ssnumber = "090101-3999999";
	if (ereg("[0-9]{2,2}[01][0-9][03][0-9]-[12][0-9]{6,6}", $ssnumber, $n)) {
		echo $n[0].":: correct! <br>";
	}
	else echo "Incorrect! <br>";
?>
	</body>
</html>