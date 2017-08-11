<?
	$k1=$_POST["k1"]; $k2=$_POST["k2"];
	$k3=$_POST["k3"]; $k4=$_POST["k4"];
	$k5=$_POST["k5"];   

	$no1=$_POST["no1"]; $no2=$_POST["no2"];
	$no3=$_POST["no3"]; $no4=$_POST["no4"];
	$no5=$_POST["no5"]; 

	$grades = array($k1=>$no1, $k2=>$no2, $k3=>$no3, $k4=>$no4, $k5=>$no5); 
	echo "<b>배열 원소들의 값: </b> <br>"; 
	print_r($grades);
	echo "<hr>";
	echo "<b>키에 의한 정렬</b> <br>";
	ksort($grades);
	foreach ($grades as $key => $value) {
		echo "[$key] :: ".number_format($value)." <br>";
	}
	echo "<hr>";
	echo "<b>값에 의한 정렬</b> <br>";
	asort($grades);
	foreach ($grades as $key => $value) {
		echo "[$key] :: ".number_format($value)." <br>";
	}
?>