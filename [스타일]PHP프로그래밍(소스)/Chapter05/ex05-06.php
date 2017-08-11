<html>
	<head><title>Á¾ÇÕ¹®Á¦ 5-3</title></head>
	<body>
<?
	function odd_or_even($no)
	{
		return $no % 2;
		}

	$numbers = array();
  
	for ($i=0; $i<10; $i++) {
		$no = rand() % 100;
		$o_e = odd_or_even($no) ? "È¦¼ö" : "Â¦¼ö";
		$one_element = array($no, $o_e);
		array_push($numbers, $one_element);
	}

	for ($i=0; $i<10; $i++) {
		echo "\$numbers[".$i."] : (";
		printf("%2d, %s) <br>", $numbers[$i][0], $numbers[$i][1]); 
	}
?>
	</body>
</html>