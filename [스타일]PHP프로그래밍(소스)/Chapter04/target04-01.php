<?
	$age = $_POST["age"];
	$donation = $_POST["donation"];

	if ($age >= 65) {
		$milage = $donation * 0.1;		
	}
	else {
		if ($donation >= 100000) $milage = $donation * 0.07;
		else $milage = $donation * 0.05;
	}

	$donation = number_format($donation);
	$milage = number_format($milage);

	echo "당신은 현재 $age 세이고 기부금액은 $donation 원입니다. <br>
	따라서, 새로 누적될 마일리지는 [$milage] 입니다. <br>";
?>