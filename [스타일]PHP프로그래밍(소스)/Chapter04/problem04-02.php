<?
	$collage = $_POST["collage"];
	$dept = $_POST["dept"];

	$code;
	switch ($collage) {
		case "인문" :
			$code .= 1;
				switch ($dept) {
					case "국문" : $code .= 1;
						break;
					case "영문" : $code .= 2;
						break;
					case "사회" : $code .= 3;
						break;
				}
			break;
		case "법정" :
			$code .= 2;
				switch ($dept) {
					case "법" : $code .= 1;
						break;
					case "행정" : $code .= 2;
						break;
					case "언론홍보" : $code .= 3;
						break;
				}
			break;
		case "사범" :
			$code .= 3;
				switch ($dept) {
					case "국어" : $code .= 1;
						break;
					case "수학" : $code .= 2;
						break;
					case "컴퓨터" : $code .= 3;
						break;
				}
			break;
	}

	echo "당신은 $collage 대학, $dept 학과 입니다. <br>
	따라서, 코드는 [$code] 입니다. <br>";
?>