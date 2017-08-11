<html>
	<head><title>다양한 프로그램 예제 17</title></head>
	<body>
<?
	$input = "(02)754-2114";
	if (ereg("^(\(0(2|[3-6][1-5])\))?[1-9][0-9]{2,3}-[0-9]{4}", $input)) 
		echo "$input :: Correct!<br>";
	else echo "$input :: Incorrect!<br>";

	$input = "754-2114";
	if (ereg("^(\(0(2|[3-6][1-5])\))?[1-9][0-9]{2,3}-[0-9]{4}", $input)) 
		echo "$input :: Correct!<br>";
	else echo "$input :: Incorrect!<br>";

	$input = "(022)754-2114";
	if (ereg("^(\(0(2|[3-6][1-5])\))?[1-9][0-9]{2,3}-[0-9]{4}", $input))
		echo "$input :: Correct!<br>";
	else echo "$input :: Incorrect!<br>";

	$input = "(065)754-2114";
	if (ereg("^(\(0(2|[3-6][1-5])\))?[1-9][0-9]{2,3}-[0-9]{4}", $input))
		echo "$input :: Correct!<br>";
	else echo "$input :: Incorrect!<br>";

	$input = "(02)54-2114";
	if (ereg("^(\(0(2|[3-6][1-5])\))?[1-9][0-9]{2,3}-[0-9]{4}", $input))
		echo "$input :: Correct!<br>";
	else echo "$input :: Incorrect!<br>";

	$input = "(02)754-214";
	if (ereg("^(\(0(2|[3-6][1-5])\))?[1-9][0-9]{2,3}-[0-9]{4}", $input))
		echo "$input :: Correct!<br>";
	else echo "$input :: Incorrect!<br>";

	$input = "(065)754-2114";
	if (ereg("^(\(0(2|[34][1-3]|5[1-5]|6[1-4])\))?[1-9][0-9]{2,3}-[0-9]{4}$", $input)) 
		echo "$input :: Correct!<br>";
	else echo "$input :: Incorrect!<br>";
?>
	</body>
</html>