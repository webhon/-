<?
	$no1 = $_POST["no1"];
	$no2 = $_POST["no2"];
	$no3 = $_POST["no3"];
	$no4 = $_POST["no4"];
	$no5 = $_POST["no5"];
	$no6 = $_POST["no6"];
	$no7 = $_POST["no7"];

	$numbers = array($no1, $no2, $no3, $no4, $no5, $no6, $no7);
	print_r($numbers);
	echo "<p>";

	$sum = 0;
	for ($i = 0; $i < sizeof($numbers); $i++) {
		if ($numbers[$i] >= 0) $sum += $numbers[$i];
	}

	echo "총 합계는 <b> [$sum] </b> 입니다.";
?>