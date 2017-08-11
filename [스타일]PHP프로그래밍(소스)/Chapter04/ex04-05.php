<?
	$k1 = $_POST["k1"]; 
	$k2 = $_POST["k2"]; 
	$k3 = $_POST["k3"]; 

	$e1 = $_POST["e1"]; 
	$e2 = $_POST["e2"]; 
	$e3 = $_POST["e3"]; 

	$c1 = $_POST["c1"]; 
	$c2 = $_POST["c2"]; 
	$c3 = $_POST["c3"]; 

	$grades = array (array("±æµ¿", $k1, $e1, $c1),
               array("¸ù·æ", $k2, $e2, $c2),
               array("ÃáÇâ", $k3, $e3, $c3));

	for ($i=0; $i<3; $i++) {
		$sum[$i] = 0;
		for ($j=1; $j<4; $j++) $sum[$i] += $grades[$i][$j];
	}

	$result = array_combine($sum, $grades);
	krsort($result);

	$i=1;
	foreach($result as $key => $value) {
		echo "[".$i."µî] : $value[0] : $key Á¡ <br>";
	$i++;
	}

?>