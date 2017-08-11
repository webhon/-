<?
	session_start();

	$key = $_POST["key"];

	echo "숫자들 : ";
	print_r($numbers);
	echo "<br>";

	$flag = 0;
	for ($i=0; $i < sizeof($numbers); $i++) {
		if ($key == $numbers[$i]) {
			$flag = 1;
			break;
		}
	}	
	if ($flag) 
		echo "FOUND!!! [$key] 는 ". ($i+1)." 번째 원소 값입니다.<br>";
	else  echo "NOT FOUND!!! [$key]<br>";
?>