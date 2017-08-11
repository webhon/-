<html>
	<head><title>목표문제 7-1</title></head>
	<body>
<?
	$string = "Today is (2009-02-12).";
	$month = digit2string($string);

	echo "<p>originally :: $string<br>";
	$nstring = ereg_replace("([[:digit:]]{4})-([0-9]{2})-([0-9]{2})", "\\3/$month/\\1", $string);
	echo "changed :: $nstring<br>";
   
	function digit2string($string) {
		$month = array("", "January", "February", "March", "April", "May", "June", "July",
                         "August", "September", "October", "November", "December");
		if (ereg("[0-9]{4}-([0-9]{2})-[0-9]{2}", $string, $ma)) {
			$no = (int)$ma[1];
			return $month[$no];
		}
	}
?>
	</body>
</html>