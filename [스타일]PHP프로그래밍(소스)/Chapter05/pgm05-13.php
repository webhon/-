<html>
	<head><title>프로그램 5-13</title></head>
	<body>
<?
	function add_numbers($no)
	{
		static $sum = 0; 
		$sum += $no;
		return $sum;
	}

	$numbers = array(1, 2, 3, 4, 5);

	for ($i=0; $i < sizeof($numbers); $i++) 
		echo "Values = ".add_numbers($numbers[$i])."<br>";
?>
	</body>
</html>