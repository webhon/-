<?
	$year = $_POST["year"];
	$no = (int)$_POST["no"];

	switch ($year) {
		case 1 : $floor = 3; break;
		case 2 : $floor = 4; break;
		case 3 :
		case 4 : 
			$floor = 5;
			break;
		default : $floor = 0;
	}

	$no %= 2;

	if ($floor == 0) {
		echo "당신은 학년을 잘못 입력하셨습니다. 다시 입력하십시오.";
	}
	else {
		switch ($no) {
			case 0 :
				echo "당신은 선착순으로 $floor 층의 짝수 호실을 사용할 수 있습니다.";
				break;
			case 1 :
				echo "당신은 선착순으로 $floor 층의 홀수 호실을 사용할 수 있습니다.";
				break;
		}
	}
?>