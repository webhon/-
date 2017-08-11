<html>
	<head><title>프로그램 7-3</title></head>
	<body>
<?
	$string = "Everything was okay.";
	$nstring = str_replace("was", "is", $string);
	echo "str_replace:: $nstring<br>";

	$nstring = ereg_replace("( )was", "\\1is", $string);
	echo "ereg_replace:: $nstring<br>";

	$string = "i have 2 siblings.";
	$number = digit2string($string);

	echo "<p>originally :: $string<br>";
	$nstring = ereg_replace("( )[0-9]", "\\1$number", $string);
	echo "changed :: $nstring<br>";

	$string = "i have 7 friends.";
	$number = digit2string($string);

	echo "<p>originally :: $string<br>";
	$nstring = ereg_replace("( )[0-9]", "\\1$number", $string);
	echo "changed :: $nstring<br>";

	function digit2string($string) {
 
		if (ereg("([0-9]+)", $string, $ma)) {
			switch ($ma[1]) {
			case 0 :
				$number = "zero"; break;
			case 1 :
				$number = "one"; break;
			case 2 :
				$number = "two"; break;
			case 3 :
				$number = "three"; break;
			case 4 :
				$number = "four"; break;
			case 5 :
				$number = "five"; break;
			default :
				$number = "many"; break;
			}
			return $number;
		}
	}
?>
	</body>
</html>